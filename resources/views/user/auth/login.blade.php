@extends('user.auth.layouts.app')
@section('content')
@if ($errors->any())
<div class="mb-4">
    <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>
    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <form method="POST" action="{{ route('user.login') }}"> 
        @csrf
        <div>
            <label class="block font-medium text-sm text-gray-700" for="email">
                {{ __('Username / E-Mail Address') }}
            </label>
            <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                   id="username" type="text" name="username" value="{{ old('username') }}" required="required"  autofocus="autofocus">
        </div>

        <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700" for="password">
                Password
            </label>
            <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="password" type="password" name="password" required="required" autocomplete="current-password">
        </div>
        <div class="form-group">
            <label for="captcha">Mã xác thực:</label>
            <div>
                <span>{!! captcha_img('flat') !!}</span>
                <button type="button" class="btn btn-sm btn-secondary" onclick="refreshCaptcha()">Đổi mã</button>
            </div>
            <input type="text" name="captcha" class="form-control mt-2" required>
            @error('captcha') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <script>
            function refreshCaptcha() {
                fetch('/captcha/refresh')
                    .then(res => res.json())
                    .then(data => {
                        document.querySelector('span').innerHTML = data.captcha;
                    });
            }
        </script>

        <div class="block mt-4">
            <label for="remember_me" class="flex items-center">
                <input type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="remember_me" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <span class="ml-2 text-sm text-gray-600">{{ __('Nhớ tài khoản') }}</span>
            </label>
        </div>
         
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-500 hover:text-gray-900" href="{{route('user.forgot.password.form')}}">
                {{ __('Quên mật khẩu') }}
            </a> 
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">
                Đăng nhập
            </button>
          
        </div>
    </form>

@endsection



