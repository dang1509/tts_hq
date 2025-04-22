<?php 

namespace App\Interfaces\Http\Controllers\User\Auth;

use App\Infrastructure\Persistence\Models\User;
use App\Interfaces\Http\Controllers\Controller;

class CustomerController extends Controller{
    public function index(){
        $user =  User::where('id', '!=', auth()->id())->get();
        return view('admin.user.user',compact('user'));
    }
    public function show($id){
        $user = User::find($id);
        return view('admin.user.detail',compact('user'));
    }
    public function toggleStatus($id)
{
    $user = User::findOrFail($id);

    // Không cho thao tác với chính mình
    if ($user->id == auth()->id()) {
        return back()->with('error', 'Bạn không thể thay đổi trạng thái tài khoản của chính mình.');
    }

    // Toggle status: nếu đang là 1 thì thành 2, nếu đang là 2 thì thành 1
    $user->status = $user->status == 1 ? 2 : 1;
    $user->save();

    return back()->with('success', 'Trạng thái tài khoản đã được cập nhật.');
}
}