<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminUserController extends Controller
{

    public function index()
    {
        $users=User::paginate(10);
        return view('admin::user.index',compact('users'));
    }
    public function action($mode,$id){
        $user=User::find($id);
        if($mode)
        {
            switch ($mode){
                case 'active':
                    $user->active=!$user->active;
                    $msg='Kích hoạt thành công!';
                    $user->save();
                    break;
                case 'delete':
                    $user->delete();
                    $msg='Xóa tài khoản thành công';
                    break;
            }
        }
        return redirect()->back()->with('success',$msg);;
    }


}
