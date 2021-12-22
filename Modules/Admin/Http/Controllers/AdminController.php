<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Contact;
use App\Models\Rating;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class AdminController extends Controller
{

    public function index()
    {
        $ratings=Rating::latest()->limit(5)->get();
        $contacts=Contact::latest()->limit(5)->get();
        $moneyByDay=Transaction::whereDay('updated_at',date('d'))->where('tr_status',Transaction::STATUS_DONE)->sum('tr_total');
        $moneyByMonth=Transaction::whereMonth('updated_at',date('m'))->where('tr_status',Transaction::STATUS_DONE)->sum('tr_total');
        $transactionByDay=Transaction::whereDay('created_at',date('d'))->count();
        $userByMonth=User::whereMonth('updated_at',date('m'))->count();
        $transactionNews=Transaction::limit(5)->orderByDesc('id')->get();
        return view('admin::index',compact('contacts','ratings','moneyByDay','moneyByMonth','transactionByDay','userByMonth','transactionNews'));
    }
    public function getLogin(){
        return view('admin::auth.login');
    }
    public function postLogin(Request $request){
        $data=$request->only('email','password');
        if(Auth::guard('admins')->attempt($data)){
            if(Auth::guard('admins')->user()->active==0) {
                Auth::guard('admins')->logout();
                $error = new MessageBag(['error' => 'Tài khoản đang bị khóa vui lòng liên hệ lại Admin']);
                return redirect()->route('admin.login')->withErrors($error);
            }
            return redirect()->route('admin.index');
        }
        else {
            $error=new MessageBag(['error'=>'Tên tài khoản hoặc mật khẩu không chính xác!']);
            return redirect()->back()->withErrors($error);
        }
    }
    public function logout(){
        Auth::guard('admins')->logout();
        return redirect()->route('admin.login');
    }
    public function info(){
        return view('admin::auth.info');
    }

}
