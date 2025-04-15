<?php

namespace App\Interfaces\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassword2Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'old_password'=>'required',
            'password'=>'required',
            'password_confirmation' => 'required|same:password',
        ];
    }
    public function messages() : array 
    {
        return [
            'old_password.required' => 'Vui lòng nhập mật khẩu cấp 2 cũ',
            'password.required' => 'Vui lòng nhập mật khẩu cấp 2 mới',
            'password_confirmation.required' => 'Vui lòng nhập mật khẩu xác nhận',
            'password_confirmation.same' => 'Mật khẩu cấp 2 xác nhận không đúng.',
        ];
    }
}
