@extends('admin.auth.layouts.app')
@section('content')

<h1>Nhập mã OTP</h1>
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <form method="POST" action="{{ route('admin.otp.verify') }}">
        @csrf
        <div>
            <label for="otp">Mã OTP:</label>
            <input type="text" name="otp" required>
            @error('otp') <span style="color: red;">{{ $message }}</span> @enderror
            
        </div>
        <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4" type="submit">Xác minh</button>
    </form>

@endsection