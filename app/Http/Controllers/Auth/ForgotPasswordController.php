<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPassRequest;
use App\Http\Requests\RequestPassword;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;
    public function getResetPassword(){
        return view('auth.passwords.email');
    }
    public function postResetPassword(Request $request){
        $email=$request->email;
        $checkUser=User::where('email',$email)->first();
        if(!$checkUser){
            return redirect()->back()->with('danger','Email không tồn tại');
        }
        $code=bcrypt(md5(time().$email));
        $checkUser->code=$code;
        $checkUser->time_code=Carbon::now();
        $checkUser->save();
        $url = route('get.link.reset.password',['code' => $checkUser->code,'email' => $email]);
        $data = [
            'route' => $url
        ];

        Mail::send('email.reset_password',$data,function ($message) use($email){
            $message->to($email,'Reset Password')->subject('Lấy lại mật khẩu');
        });
        return redirect()->back()->with('success','Email lấy lại mật khẩu đã được gửi. Vui lòng kiểm tra lại email!');
    }
    public function resetPassword(Request $request){
        $code=$request->code;
        $email=$request->email;
        $checkUser=User::where([
            'code'=>$code,
            'email'=>$email
        ])->first();
        if(!$checkUser)
        {
            return redirect(route('home.index'))->with('danger','Link lấy lại mật khẩu không chính xác, vui lòng thử lại! ');
        }
        return view('auth.passwords.reset');
    }
    public function saveResetPassword(ForgotPassRequest $requestPassword){
        if($requestPassword->password){
            $code=$requestPassword->code;
            $email=$requestPassword->email;
            $checkUser=User::where([
                'code'=>$code,
                'email'=>$email
            ])->first();
            if(!$checkUser)
            {
                return redirect(route('home.index'))->with('danger','Link lấy lại mật khẩu không chính xác, vui lòng thử lại! ');
            }
            $checkUser->password=bcrypt($requestPassword->password);
            $checkUser->save();
            return redirect()->route('get.login')->with('success','Mật khẩu đã được đổi thành công! Mời bạn đăng nhập');
        }
    }
}
