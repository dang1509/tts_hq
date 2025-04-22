<?php

namespace App\Interfaces\Http\Controllers\Admin\Auth;

use App\Infrastructure\Persistence\Models\User;
use App\Interfaces\Http\Controllers\Controller;
use App\Interfaces\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use App\Models\User;
use Carbon\Carbon;

class ResetPasswordController extends Controller
{
    public function showResetForm()
    {
        $email = session('otp_user_email');
        return view('admin.auth.passwords.reset', ['email' => $email]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ]);
        $email = $request->email;
        $password = Hash::make($request->password);
        $user = User::where("email", $email)->first();
        $user->password = $password;
        $user->save();
        return redirect()->route('admin.login')->with('status', 'Mật khẩu đã được đặt lại!');
    }
}