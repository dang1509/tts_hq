@extends('user.auth.layouts.app')
@section('content')

<h1>Nhập mã OTP</h1>
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <form method="POST" action="{{ route('user.otp.reset') }}">
        @csrf
        <div>
            <label for="otp">Mã OTP:</label>
            <input type="text" name="otp" required>
            @error('otp') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        <button type="submit">Xác minh</button>
    </form>

@endsection