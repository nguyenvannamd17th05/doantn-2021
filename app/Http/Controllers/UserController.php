<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestPassword;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $listTransaction=Transaction::where('user_id',get_data_user('web'));
        $totalTransaction=$listTransaction->count();
        $totalTransactionDone=$listTransaction->where('tr_status',Transaction::STATUS_DONE)->count();
        $transactions=$listTransaction->paginate(5);
        return view('user.index',compact('totalTransaction','totalTransactionDone','transactions'));
    }
    public function getInfo(){
        $user=User::find(get_data_user('web'));
        return view('user.info',compact('user'));
    }
    public function postInfo(Request $request){
        $user=User::where('id',get_data_user('web'))->update($request->except('_token'));
        return redirect()->back()->with('success','Cập nhập thông tin thành công');
    }
    public function getPassword(){
        return view('user.password');
    }
    public function postPassword(RequestPassword  $requestPassword){
        if(Hash::check($requestPassword->password_old,get_data_user('web','password'))){
            $user=User::find(get_data_user('web'));
            $user->password=bcrypt($requestPassword->password);
            $user->save();
            return redirect()->back()->with('success','Đổi mật khẩu thành công!');
        }
        return redirect()->back()->with('danger','Mật khẩu cũ không đúng!');
    }
}
