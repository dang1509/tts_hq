<?php

namespace App\Infrastructure\Repositories;

use App\Core\Domain\Repositories\ProfileRepositoryInterface;
use App\Core\Domain\Entities\UserEntity;
use App\Infrastructure\Persistence\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Core\Domain\Exceptions\BaseException;
use App\Core\Domain\DTO\BaseResponse;
use DB;
use Log;

class ProfileRepositories implements ProfileRepositoryInterface
{
    public function changePassword($data) : BaseResponse
    {
        DB::beginTransaction();
        try {
            $user = User::where('username', $data['username'])
            ->where('status', 1)
            ->where(function ($query){
                $query->orWhere('account_type', 1);
                $query->orWhere('account_type',3);
            })
            ->first();
            if(!$user){
                return BaseResponse::error("Người dùng không tồn tại hoặc đã bị tạm khóa", 401);
            }
    
            if(!Hash::check($data['old_password'],$user->password)){
                return BaseResponse::error("Mật khẩu cũ không đúng", 400);
            }
            $user->password=Hash::make($data['password']);
            $user->save();
            DB::commit();
            $result = new UserEntity($user->toArray());
            return BaseResponse::success($result,'Thay đổi mật khẩu thành công.',200);
        }catch(\Exception $e){
            DB::rollBack();
            Log::error($e);
            return BaseResponse::error("Lỗi hệ thống, vui lòng thông báo QTV để xử lý ! ".$e->getMessage(), 500);
        }
    }
    public function changePassword2($data) : BaseResponse
    {
        DB::beginTransaction();
        try {
            $user = User::where('username', $data['username'])
            ->where('status', 1)
            ->where(function ($query){
                $query->orWhere('account_type', 1);
                $query->orWhere('account_type',3);
            })
            ->first();
            if(!$user){
                return BaseResponse::error("Người dùng không tồn tại hoặc đã bị tạm khóa", 401);
            }
            if(!Hash::check($data['old_password'],$user->password2)){
                return BaseResponse::error("Mật khẩu cấp 2 cũ không đúng", 400);
            }
            $user->password2=Hash::make($data['password']);
            $user->save();
            DB::commit();
            $result = new UserEntity($user->toArray());
            return BaseResponse::success($result,'Thay đổi mật khẩu cấp 2 thành công.',200);
        }
        catch(\Exception $e){
            DB::rollBack();
            Log::error($e);
            return BaseResponse::error("Lỗi hệ thống, vui lòng thông báo QTV để xử lý ! ".$e->getMessage(), 500);
        }
    }
/**
 * Generates a QR code for Google 2FA setup for a user.
 *
 * This function checks if the user has already enabled Google 2FA. If not, it generates a new secret key,
 * saves it to the user's profile, and creates a QR code for the user to scan in their Google Authenticator app.
 *
 * @param $data User data
 * 
 * @return BaseResponse Returns a success response with the QR code URL if successful, or an error response otherwise.
 */

    public function getQr2Fa($data) : BaseResponse
    {
        DB::beginTransaction();
        try {
            $data = User::findOrFail(Auth::user()->id);
            if($data->google2fa_enable == 1){
                return BaseResponse::error("Tài khoản đã được cấu hình GG2FA", 400);
            }
            $google2fa = app('pragmarx.google2fa');
            // secret_key cho từng user
            $google2fa_secret = $google2fa->generateSecretKey();
            if($google2fa_secret){
                $data->google2fa_secret=$google2fa_secret;
                $data->save();
            }
            // lấy QR ảnh để lấy thông tin và quét mã lưu tài khoản vào app GG2FA
            $google2fa_url = $google2fa->getQRCodeInline(
                \Request::getHttpHost(),
                $data->username."-".$data->email,
                $data->google2fa_secret
            );
            DB::commit();
            return BaseResponse::success($google2fa_url,'Truy xuất QR Google2FA thành công .',200);
        }
        catch(\Exception $e){
            DB::rollBack();
            Log::error($e);
            return BaseResponse::error("Lỗi hệ thống, vui lòng thông báo QTV để xử lý ! ".$e->getMessage(), 500);
        }
    }
    /**
     * Kích hoạt bảo mật GG2FA
     *
     * @param $data user
     * @param $code mã code GG2FA
     * @param $two_factor_recovery_codes mã code khôi phục GG2FA
     * 
     * @return BaseResponse
     */
    public function enable2fa($data,$code,$two_factor_recovery_codes) : BaseResponse
    {
        DB::beginTransaction();
        try {
            $google2fa = app('pragmarx.google2fa');
            $result = $google2fa->verifyKey($data->google2fa_secret, $code);
            if($result === false){
                return BaseResponse::error("Mã code không đúng, vui lòng nhập lại", 400);
            }
            $data->google2fa_enable = 1;
            $data->two_factor_recovery_codes = md5($two_factor_recovery_codes);
            $data->save();
            DB::commit();
            return BaseResponse::success($data,'Kích hoạt bảo mật thành công .',200);
           
        }
        catch(\Exception $e){
            DB::rollBack();
            Log::error($e);
            return BaseResponse::error("Lỗi hệ thống, vui lòng thông báo QTV để xử lý ! ".$e->getMessage(), 500);
        }
    }

    public function disable2fa($data,$code) : BaseResponse
    {
        DB::beginTransaction();
        try {
            $google2fa = app('pragmarx.google2fa');
            $result = $google2fa->verifyKey($data->google2fa_secret, $code);
            if($result === false){
                return BaseResponse::error("Mã bảo mật GG2FA không đúng", 400);
            }
            $data->google2fa_enable = 0;
            $data->google2fa_secret = null;
            $data->save();
            DB::commit();
            return BaseResponse::success($data,'Bảo mật GG2FA đã được tắt',200);
        }
        catch(\Exception $e){
            DB::rollBack();
            Log::error($e);
            return BaseResponse::error("Lỗi hệ thống, vui lòng thông báo QTV để xử lý ! ".$e->getMessage(), 500);
        }
    }
    public function very_2fa($data,$code) : BaseResponse
    {
        try {
            $google2fa = app('pragmarx.google2fa');
            $result = $google2fa->verifyKey($data->google2fa_secret, $code);
            if($result === false){
                return BaseResponse::error("Mã bảo mật GG2FA không đúng", 400);
            }
            return BaseResponse::success($data,'Very bảo mật google2fa khi đăng nhập thành công',200);
        }
        catch(\Exception $e){
            DB::rollBack();
            Log::error($e);
            return BaseResponse::error("Lỗi hệ thống, vui lòng thông báo QTV để xử lý ! ".$e->getMessage(), 500);
        }
    }
}