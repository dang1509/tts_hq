<?php 

namespace App\Interfaces\Http\Controllers\Admin\Auth;

use App\Core\Application\Services\ActivityLogService;
use App\Core\Application\Services\ProfileService;
use App\Infrastructure\Persistence\Models\User;
use App\Interfaces\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller{
    protected $profile_service;
    protected $activity_log_service;
    public function __construct(
        ProfileService $profile_service, 
        ActivityLogService $activity_log_service
    )
{
    $this->profile_service = $profile_service;
    $this->activity_log_service = $activity_log_service;
    
}
    public function index(){
        $user =  User::where('id', '!=', auth()->id())->get();
        return view('admin.user.user',compact('user'));
    }
    public function show($id){
        $user = User::find($id);
        return view('admin.user.detail',compact('user'));
    }
   public function update(Request $request){

    
    $this->activity_log_service->add('Chỉnh sửa trang thông tin profile');
    $request->validate([
        'fullname' => 'required|string|max:255',
        'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $user = User::findOrFail($request->id);

    // Cập nhật tên
    $user->fullname = $request->fullname;

    // Cập nhật ảnh
    if ($request->hasFile('avatar')) {
        $file = $request->file('avatar');
    
        // Xóa ảnh cũ nếu có
        if ($user->avatar && file_exists(public_path($user->avatar))) {
            unlink(public_path($user->avatar));
        }
    
        // Tạo tên file mới
        $filename = time() . '_' . $file->getClientOriginalName();
    
        // Di chuyển ảnh vào thư mục public/uploads
        $file->move(public_path('uploads'), $filename);
    
        // Lưu đường dẫn vào DB (để dùng asset() khi hiển thị)
        $user->avatar = 'uploads/' . $filename;
    }

    $user->save();

    return back()->with('success', 'Cập nhật thông tin cá nhân thành công!');
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