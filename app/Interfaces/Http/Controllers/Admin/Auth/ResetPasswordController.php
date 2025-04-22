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
    public function showResetForm(Request $request)
    {
        $email = $request->query('email');
        $token = $request->query('token');

        return view('user.auth.passwords.reset', compact('email', 'token'));
    }

    public function reset(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);


        $user = User::where("email", $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Không tìm thấy người dùng với email này.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.login')->with('status', 'Mật khẩu đã được đặt lại!');
    }
}