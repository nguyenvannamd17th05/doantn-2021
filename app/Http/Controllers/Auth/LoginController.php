<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function getLogin(){
        return view('auth.login');
    }
    public function postLogin(Request $request){
        $data=$request->only('email','password');
        if(Auth::guard('web')->attempt($data)){
            if(Auth::guard('web')->user()->active==0) {
                Auth::guard('web')->logout();
                $error = new MessageBag(['error' => 'Tài khoản đang bị khóa vui lòng liên hệ lại Admin']);
                return redirect()->route('get.login')->withErrors($error);
            }
            return redirect()->route('home.index');
        }
        else{
            $error=new MessageBag(['error'=>'Tên tài khoản hoặc mật khẩu không chính xác!']);
            return redirect()->back()->withErrors($error);
        }
    }
    public function getLogout(){
        Auth::guard('web')->logout();
        return redirect()->route('home.index');
    }

}
