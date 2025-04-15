<?php

namespace App\Infrastructure\Repositories;

use App\Core\Domain\Repositories\AuthRepositoryInterface;
use App\Core\Domain\Entities\UserEntity;
use App\Infrastructure\Persistence\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Core\Domain\Exceptions\BaseException;
use App\Core\Domain\DTO\BaseResponse;
use App\Library\Helpers;
use Carbon\Carbon;
use DB;
use Log;

class AuthRepositories implements AuthRepositoryInterface{

    public function register(UserEntity $data) : UserEntity {
        $result = User::create([
            'shop_id' => $data->shop_id,
            'username' => $data->username,
            'email' => $data->email,
            'account_type' => $data->account_type,
            'password' => Hash::make($data->password),
            'status' => 1,
            'balance' => 0,
        ]);
        return new UserEntity($result->toArray());
    }

    public function login($username, $password) {
        $user = User::where('username', $username)
        ->where('status', 1)
        ->where(function ($query){
            $query->orWhere('account_type', 1);
            $query->orWhere('account_type',3);
        })
        ->first();
        if (!$user) {
            return BaseResponse::error("Tài khoản hoặc mật khẩu không đúng", 401);
        }
        if($user->required_login_gmail == 1){
            return BaseResponse::error("Tài khoản của bạn đã được cấu hình đăng nhập với google. Vui lòng đăng nhập bằng tài khoản google để truy cập vào hệ thống", 400);
        }
        if(!\Hash::check($password, $user->password)){
            return BaseResponse::error("Tài khoản hoặc mật khẩu không đúng", 401);
        }
        $result = new UserEntity($user->toArray());
        return BaseResponse::success($result,'Đăng nhập thành công',200);
    }

    public function login_with_google(string $token) : BaseResponse
    {
        try {
            $key_config = 'A2X4oYbBGkECUa0Eeo5AVAzZZh4Rwz43';
            $encrypt = 'zK25hWfe94i9QeRWtcyfROQFvEl4PO5G';
            $data = Helpers::Decrypt($token,$encrypt);
            if(empty($data)){
                return BaseResponse::error("Thất bại", 403);
            }
            $data = explode('|',$data);
            if(empty($data)){
                return BaseResponse::error("Thất bại", 403);
            }
            $status = $data[0];
            $key = $data[1];
            $time = $data[2];
            $email = $data[3];
            $provider_id = $data[4];
            if(empty($key)){
                return BaseResponse::error("Thất bại", 403);
            }
            if($key !== $key_config){
                return BaseResponse::error("Thất bại", 403);
            }
            if (Carbon::now()->greaterThan(Carbon::createFromTimestamp($time))) {
                return BaseResponse::error("URL Hết hiệu lực", 404);
            }
            if($status != 1){
                return BaseResponse::error("Đăng nhập google không thành công.", 400);
            }
            if(!$email){
                return BaseResponse::error("Không lấy được thông tin email khi đăng nhập với google.", 400);
            }
            $user = User::where('email', $email)
            ->where('status', 1)
            ->where(function ($query){
                $query->orWhere('account_type', 1);
                $query->orWhere('account_type',3);
            })
            ->first();
            if(!$user){
                return BaseResponse::error("Tài khoản không tồn tại hoặc đã bị khóa.", 400);
            }
            if($user->required_login_gmail != 1){
                return BaseResponse::error("Tài khoản này không được phép login bằng google.", 400);
            }
            $user->update([
                'lastlogin_at'=>Carbon::now()
            ]);

            return BaseResponse::success($user,'Đăng nhập thành công',200);
        }
        catch(\Exception $e){
            DB::rollBack();
            Log::error($e);
            return BaseResponse::error("Lỗi hệ thống, vui lòng thông báo QTV để xử lý ! ".$e->getMessage(), 500);
        }
      
    }
}