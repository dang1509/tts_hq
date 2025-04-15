@foreach ($users as $user)
    <p>{{ $user['username'] }} - <a href="{{ route('users.edit', $user['id']) }}">Edit</a> | 
       <form action="{{ route('users.destroy', $user['id']) }}" method="POST">
           @csrf @method('DELETE')
           <button type="submit">Delete</button>
       </form>
    </p>
@endforeach
<h2>Thêm người dùng mới</h2>

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <label for="username">Tên:</label>
    <input type="text" name="username" required>
    
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    
    <button type="submit">Lưu</button>
</form>

<a href="{{ route('users.index') }}">Quay lại</a>
