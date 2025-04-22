@extends('admin.auth.layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{route('admin.password.update')}}">
                            @csrf
                            
                            <input type="hidden" name="email" value="{{ $email }}">

                            <label>Mật khẩu mới:</label>
                            <input type="password" name="password" required>
                            <br>
                            <label>Xác nhận mật khẩu:</label>
                            <input type="password" name="password_confirmation" required>

                            <button type="submit">Đặt lại mật khẩu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
