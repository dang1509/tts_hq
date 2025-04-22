<?php

namespace App\Interfaces\Http\Controllers\Admin\Auth;


use App\Interfaces\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Interfaces\Http\Requests\Auth\LoginRequest;
use App\Core\Domain\Entities\UserEntity;
use App\Core\Application\Services\AuthService;
use App\Core\Application\Services\ActivityLogService;
use App\Core\Application\Services\OtpService;
use App\Infrastructure\Persistence\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;

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

    use ThrottlesLogins;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected AuthService $authService;

    protected $redirectAfterLogout = "";

    protected $maxAttempts = 5;

    protected $decayMinutes = 2;

    protected ActivityLogService $activity_log_service;

    protected OtpService $OtpService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        AuthService $authService,
        ActivityLogService $activity_log_service,
        OtpService $OtpService
    ) {
        $this->middleware('guest')->except('logout');
        $this->authService = $authService;
        $this->redirectTo = route('admin.dashboard');
        $this->redirectAfterLogout = route('admin.login');
        $this->activity_log_service = $activity_log_service;
        $this->OtpService = $OtpService;
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {

        // $usernameInput = $request->input($this->username());
        // $user = User::where($this->username(), $usernameInput)->first();

        // if ($user && $user->status == 2) {
        //     return redirect()->back()->withErrors([
        //         'username' => 'Tài khoản đã bị khóa. Vui lòng liên hệ quản trị viên.',
        //     ]);
        // }

        // // Nếu nhập sai quá số lần cho phép
        // if ($this->hasTooManyLoginAttempts($request)) {
        //     $this->fireLockoutEvent($request);

        //     if ($user) {
        //         $user->lockout_count += 1;
        //         if ($user->lockout_count >= 2) {
        //             $user->status = 2;
        //         }
        //         $user->save();
        //     }

        //     $seconds = $this->limiter()->availableIn($this->throttleKey($request));
        //     return redirect()->back()->withErrors([
        //         'username' => "Bạn đã nhập sai quá nhiều lần. Vui lòng thử lại sau $seconds giây.",
        //     ]);
        // }

        // $data = new UserEntity($request->validated());

        // $username = $data->username;

        // $password = $data->password;

        // $result = $this->authService->login($username, $password);

        // if ($result->success === false) {
        //     $this->incrementLoginAttempts($request);
        //     return redirect()->back()->withErrors($result->message);
        // }


        // $user = $result->data;
        // $this->clearLoginAttempts($request); // ✅ reset lại khi login thành công
        // $user->lockout_count = 0;


        // Auth::loginUsingId($user->id);

        // $status = "verifi login";
        // $this->OtpService->sendOtp($user->email, $status);
        // session(['otp_user_email' => $user->email]);
        // return redirect()->route('admin.otp.verify.login.form');
        // Kiểm tra nếu bị khóa vĩnh viễn
        $usernameInput = $request->input($this->username());
        $user = User::where($this->username(), $usernameInput)->first();
        

        if ($user && $user->status == 2) {
            return redirect()->back()->withErrors([
                'username' => 'Tài khoản đã bị khóa.',
            ]);
        }

        // Nếu nhập sai quá số lần cho phép
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            if ($user) {
                $user->lockout_count += 1;
                if ($user->lockout_count >= 2) {
                    $user->status = 2;
                }
                $user->save();
            }

            $seconds = $this->limiter()->availableIn($this->throttleKey($request));
            
            return redirect()->back()->withErrors([
                'username' => "Bạn đã nhập sai quá nhiều lần. Vui lòng thử lại sau $seconds giây.",
            ]);
        }

        // Login logic
        $data = new UserEntity($request->validated());
        $username = $data->username;
        $password = $data->password;

        $result = $this->authService->login($username, $password);

        if ($result->success === false) {
            $this->incrementLoginAttempts($request);
            return redirect()->back()->withErrors($result->message);
        }

        // Thành công
        $user = $result->data;
        $this->clearLoginAttempts($request); 
        $user->lockout_count = 0;

        Auth::loginUsingId($user->id);
        $status = "verifi login";
        $this->OtpService->sendOtp($user->email, $status);
        session(['otp_user_email' => $user->email]);
        return redirect()->route('admin.otp.verify.login.form');
    }
    public function logout(Request $request)
    {

        $this->activity_log_service->add('Đăng xuất tài khoản ADMIN thành công');

        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson() ? new JsonResponse([], 204) : redirect($this->redirectAfterLogout);
    }
    public function loginGmail(Request $request)
    {
        $url = config('services.google.return_url');
        if (empty($url)) {
            return redirect()->to(route('admin.login'))->with('error_login_gmail', 'Google OAuth 2.0 chưa được cấu hình.Vui lòng liên hệ QTV để kịp thời xử lý');
        }
        $url = $url . '/' . str_replace(".", "_", $request->getHost());
        return redirect()->to($url);
    }
    public function callbackLoginGmail(Request $request, $token)
    {
        if (!$token) {
            abort(403);
        }
        $result = $this->authService->login_with_google($token);

        if ($result->success === false) {
            if ($result->code == 403) {
                abort(403);
            }
            if ($result->code == 404) {
                abort(404);
            }
            return redirect()->to(route('admin.login'))->with('error_login_gmail', $result->message);
        }

        Auth::loginUsingId($result->data->id);

        $this->activity_log_service->add('Đăng nhập ADMIN thành công');

        return redirect()->intended($this->redirectPath());
    }
    public function username()
    {
        return 'username';
    }
}
