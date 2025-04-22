<?php 

namespace App\Interfaces\Http\Controllers\User\Auth;

use App\Core\Domain\Usecase\VerifyUserUsecase;
use App\Interfaces\Http\Controllers\Controller;

class VerifyAccountController extends Controller{
    public function verify(string $token, VerifyUserUsecase $useCase)
{
    $success = $useCase->execute($token);

    return $success
        ? redirect()->route('admin.login')->with('status', 'Tài khoản đã được xác minh.')
        : redirect()->route('admin.login')->withErrors(['token' => 'Token không hợp lệ']);
}
}