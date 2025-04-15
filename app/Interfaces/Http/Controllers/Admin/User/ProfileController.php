<?php

namespace App\Interfaces\Http\Controllers\Admin\User;

use App\Interfaces\Http\Controllers\Controller;
use App\Interfaces\Http\Requests\Profile\ChangePasswordRequest;
use App\Interfaces\Http\Requests\Profile\ChangePassword2Request;
use Illuminate\Http\Request;
use App\Core\Domain\Entities\UserEntity;
use App\Core\Application\Services\ProfileService;
use App\Core\Application\Services\ActivityLogService;
use Illuminate\Support\Facades\Auth; 
use App\Infrastructure\Persistence\Models\User;

class ProfileController extends Controller
{
    protected ProfileService $profile_service;

    protected ActivityLogService $activity_log_service;
    /**
     * ProfileController constructor.
     *
     * @param ProfileService $profile_service
     * @param ActivityLogService $activity_log_service
     */
    public function __construct(
            ProfileService $profile_service, 
            ActivityLogService $activity_log_service
        )
	{
        $this->profile_service = $profile_service;
        $this->activity_log_service = $activity_log_service;
        $this->module='security-2fa';
        $this->page_breadcrumbs[] = [
            'page' => route('admin.profile'),
            'title' => __("Thông tin cá nhân")
        ];
        $this->middleware('permission:security-2fa', ['only' => ['get_security_2fa']]);
	}
    public function getProfile(Request $request){
        $this->activity_log_service->add('Truy cập trang thông tin profile');
        return view('admin.profile.index')->with('page_breadcrumbs',$this->page_breadcrumbs);
    }
    /**
     * Thay doi mat khau
     *
     * @param ChangePasswordRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postChangePassword(ChangePasswordRequest $request){

        $data = $request->validated();

        $data['username'] = Auth::user()->username;

        $result = $this->profile_service->changePassword($data);

        if ($result->success === false) {
            return redirect()->back()->withErrors($result->message);
        }

        $user = $result->data;

        Auth::loginUsingId($user->id);

        $this->activity_log_service->add('Đổi mật khẩu thành công');

        return redirect()->back()->with('tab',1)->with('success', trans( 'Đổi mật khẩu thành công'));
    }

    /**
     * Thay doi mat khau cap 2
     *
     * @param ChangePassword2Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postChangePassword2(ChangePassword2Request $request){

        $data = $request->validated();

        $data['username'] = Auth::user()->username;

        $result = $this->profile_service->changePassword2($data);

        if ($result->success === false) {
            return redirect()->back()->withErrors($result->message);
        }

        $user = $result->data;

        $this->activity_log_service->add('Đổi mật khẩu cấp 2 thành công');

        return redirect()->back()->with('tab',1)->with('success', trans( 'Đổi mật khẩu cấp 2 thành công'));
    }

    /**
     * Hiển thị trang cấu hình bảo mật google 2FA
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function get_security_2fa(Request $request){
        $this->page_breadcrumbs[] =[
            'page' => '#',
            'title' => __("Bảo mật tải khoản")
        ];
        $this->activity_log_service->add('Truy cập trang cấu hình bảo mật google 2FA');

        $user = Auth::user();

        if($user->google2fa_enable == 1){
            $google2fa_enable = 1;
        }
        else{
            $google2fa_enable = 0;
        }

        return view('admin.profile.2fa.index')
        ->with('module', $this->module)
        ->with('user', $user)
        ->with('google2fa_enable', $google2fa_enable)
        ->with('page_breadcrumbs', $this->page_breadcrumbs);
    }

    /**
     * Displays the setup page for Google 2FA.
     *
     * This function retrieves the QR code for Google 2FA setup for the authenticated user
     * and displays the setup view. It logs the activity and updates breadcrumbs.
     * If the QR code generation fails, it redirects back with an error message.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */

    public function setup_google_2fa(Request $request){

        $this->page_breadcrumbs[] =[
            'page' => '#',
            'title' => __("Bảo mật tải khoản")
        ];

        $this->activity_log_service->add('Truy cập trang setup cấu hình bảo mật google 2FA');

        $user = User::findOrFail(Auth::user()->id);

        $result = $this->profile_service->getQr2Fa($user);

        if ($result->success === false) {
            return redirect()->back()->withErrors($result->message);
        }
        
        return view('admin.profile.2fa.setup')
        ->with('module', $this->module)
        ->with('user', $user)
        ->with('google2fa_url', $result->data)
        ->with('page_breadcrumbs', $this->page_breadcrumbs);
    }
    /**
     * Kích hoạt bảo mật google2fa
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable2fa(Request $request){
        $user = User::findOrFail(Auth::user()->id);

        $code = $request->get('code');

        if(!$code){
            return response()->json([
                'message' => 'Vui lòng nhập mã code',
                'status' => 0,
            ], 200);
        }
        $two_factor_recovery_codes = rand(10000000,99999999);
        $result = $this->profile_service->enable2fa($user, $code, $two_factor_recovery_codes);

        if ($result->success === false) {
            return response()->json([
                'message' => $result->message,
                'status' => 0,
            ], 200);
            return redirect()->back()->withErrors($result->message);
        }
        session()->put('security_2fa_web_'.md5($user->id),$user->id);

        $this->activity_log_service->add('Kích hoạt bảo mật google2fa thành công ');
        
        return response()->json([
            'message' => $result->message,
            'status' => 1,
            'two_factor_recovery_codes' => $two_factor_recovery_codes,
            'redirect' => route('admin.security-2fa.index')
        ], 200);
    }
    /**
     * Tắt bảo mật google2fa
     *
     * @param Request $request
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function disable2fa(Request $request){
        $status = $request->get('status');
        $code = $request->get('code');
        if($status != 0){
            return redirect()->back()->withErrors("Chức năng này chỉ để sử dụng để tắt bảo mật GG2FA");
        }
        $user = User::findOrFail(Auth::user()->id);

        $result = $this->profile_service->disable2fa($user,$code);

        if ($result->success === false) {
            return redirect()->back()->withErrors($result->message);
        }

        $this->activity_log_service->add('Tắt bảo mật google2fa thành công '.$this->module);

        return redirect()->back()->with('success',$result->message);
    }
    /**
     * Vào trang nhập mã bảo mật google2fa khi đăng nhập
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function getVery(Request $request){
        $user = User::findOrFail(Auth::user()->id);

        $this->activity_log_service->add('Vào trang nhập mã bảo mật google2fa khi đăng nhập');

        return view('admin.profile.2fa.very_security')
        ->with('module', $this->module)
        ->with('user', $user)
        ->with('page_breadcrumbs', $this->page_breadcrumbs);
    }

    public function postVery(Request $request){
        $code = $request->get('code'); 
        $user = User::findOrFail(Auth::user()->id);
        $google2fa = app('pragmarx.google2fa');
        $data = $google2fa->verifyKey($user->google2fa_secret, $code);
        if($data === true){
            $this->activity_log_service->add('Very bảo mật google2fa khi đăng nhập thành công');
            session()->put('security_2fa_web_'.md5($user->id),$user->id);
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->withErrors("Mã bảo mật GG2FA không đúng");
    }
}
