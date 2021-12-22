<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    public function index()
    {
        $admins=Admin::paginate(10);
        return view('admin::employee.index  ',compact('admins'));
    }
    public function create(){
        $roles=$this->getRoles();
        return view('admin::employee.create',compact('roles'));
    }
    public function store(AdminRequest $request){
        $this->save($request);
        return redirect(route('admin.employee.index'))->with('success','Thêm mới thành công');
    }
    public function edit($id){
        $admin=Admin::find($id);
        $roles=$this->getRoles();
        return view('admin::employee.update',compact('admin','roles'));
    }
    public function update(AdminRequest $request,$id){
        $this->save($request,$id);
        return redirect(route('admin.employee.index'))->with('success','Cập nhật thành công');
    }
    public function save($request,$id=''){
        $admin= new Admin();
        if($id) $admin=Admin::find($id);
        $admin->name     = $request->name;
        $admin->email    = $request->email;
        $admin->phone    = $request->phone;
        $admin->password = Hash::make($request->password);
        $admin->role_id  = $request->role_id;
        $admin->save();
    }
    public function getRoles(){
        return Role::all();
    }
    public function action($action,$id){
        if ($action){
            $admin=Admin::find($id);
            switch ($action){
                case 'delete':
                    $admin->delete();
                    $msg='Xóa dữ liệu thành công!';
                    break;
                case 'active':
                    $admin->active=!($admin->active);
                    $msg='Kích hoạt thành công!';
                    $admin->save();
                    break;
            }
        }
        return redirect()->back()->with('success',$msg);;
    }

}
