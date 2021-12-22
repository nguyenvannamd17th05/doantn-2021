<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $roles=Role::with('permission')->paginate(10);
        return view('admin::role.index',compact('roles'));
    }
    public function create(){
        $permissions=Permission::all();
        return view('admin::role.create',compact('permissions'));
    }
    public function store(Request  $request){
        $this->save($request);
        return redirect()->back()->with('success','Thêm mới thành công');
    }
    public function edit($id){
        $role=Role::find($id);
        $permissions=Permission::all();
        $role_per=$role->permission()->get();
        return view('admin::role.edit',compact('role','permissions','role_per'));
    }
    public function update(Request $request,$id){
        $this->save($request,$id);
        return redirect()->back()->with('success','Cập nhật thàn công');
    }
    public function save($request,$id=''){
        $role = new Role();
        if($id) $role=Role::find($id);
        try {
            DB::beginTransaction();
            $role->r_name = $request->r_name;
            $role->r_display_name= $request->r_display_name;
            $role->save();
            $permissionIds= $request->permission_id;
            if($id) $role->permission()->sync($permissionIds);
            else{
                $role->permission()->attach($permissionIds);

            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            Log::error('message' . $e->getMessage() . '---Line' .$e->getLine());
        }
    }




}
