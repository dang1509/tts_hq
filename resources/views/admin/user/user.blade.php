@extends('admin._layouts.master')

@section('content')
    <table class="table">
        <thead>
            <th>STT</th>
            <th>Tên tài khoản</th>
            <th>Email</th>
            <th>Vai trò</th>
            <th>Thao tác</th>
        </thead>
        <tbody>
            @foreach ($user as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->username }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->account_type == 1 ? 'Admin' : 'Khách hàng' }}</td>
                    <td>
                        <a href="{{ route('admin.customers.show', ['id' => $value->id]) }}" class="btn btn-info">Xem chi
                            tiết</a>
                            @if ($value->id !== auth()->id())
                            <form action="{{ route('admin.customers.toggle-status', $value->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                @if ($value->status == 1)
                                    <button type="submit" class="btn btn-danger">Khóa</button>
                                @else
                                    <button type="submit" class="btn btn-success">Mở khóa</button>
                                @endif
                            </form>
                        @endif
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
