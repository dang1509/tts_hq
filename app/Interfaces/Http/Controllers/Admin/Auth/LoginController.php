<?php

namespace App\Interfaces\Http\Controllers\Admin\Auth;

use App\Interfaces\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Interfaces\Http\Requests\Auth\LoginRequest;
use App\Core\Domain\Entities\UserEntity;
use App\Core\Application\Services\AuthService;
use App\Core\Application\Services\ActivityLogService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Library\Helpers;
use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected AuthService $authService;

    protected $redirectAfterLogout ="";

    protected $maxAttempts=5;

    protected $decayMinutes=3;

    protected ActivityLogService $activity_log_service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
            AuthService $authService,
            ActivityLogService $activity_log_service
        )
    {
        $this->middleware('guest')->except('logout');
        $this->authService = $authService;
        $this->redirectTo = route('admin.dashboard');
        $this->redirectAfterLogout = route('admin.login');
        $this->activity_log_service = $activity_log_service;
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    public function login(LoginRequest $request){

        $data = new UserEntity($request->validated());

        $username = $data->username;

        $password = $data->password;

        $result = $this->authService->login($username,$password);

        if ($result->success === false) {
            return redirect()->back()->withErrors($result->message);
        }
        $user = $result->data;

        Auth::loginUsingId($user->id);

        $this->activity_log_service->add('Đăng nhập ADMIN thành công');

        return redirect()->intended($this->redirectPath());
        
    }
    public function logout(Request $request){

        $this->activity_log_service->add('Đăng xuất tài khoản ADMIN thành công');

        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()? new JsonResponse([], 204) : redirect($this->redirectAfterLogout);
    }
    public function loginGmail(Request $request){
        $url = config('services.google.return_url');
        if(empty($url)){
            return redirect()->to(route('admin.login'))->with('error_login_gmail', 'Google OAuth 2.0 chưa được cấu hình.Vui lòng liên hệ QTV để kịp thời xử lý');
        }
        $url = $url.'/'.str_replace(".","_",$request->getHost());
        return redirect()->to($url);
    }
    public function callbackLoginGmail(Request $request,$token){
        if(!$token){
            abort(403);
        }
        $result = $this->authService->login_with_google($token);

        if ($result->success === false) {
            if($result->code == 403 ){
                abort(403);
            }
            if($result->code == 404){
                abort(404);
            }
            return redirect()->to(route('admin.login'))->with('error_login_gmail',$result->message);
        }

        Auth::loginUsingId($result->data->id);

        $this->activity_log_service->add('Đăng nhập ADMIN thành công');

        return redirect()->intended($this->redirectPath());
    }
}
