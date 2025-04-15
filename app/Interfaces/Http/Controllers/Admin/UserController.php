<?php

namespace App\Interfaces\Http\Controllers\Admin;
use App\Interfaces\Http\Controllers\Controller;
use App\Core\Application\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {

        $this->userService->createUser(1111, 'email@gmail.com', 1111);
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = $this->userService->getUserById($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->userService->updateUser($id, $request->name, $request->email, $request->password);
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $this->userService->deleteUser($id);
        return redirect()->route('users.index');
    }
}
