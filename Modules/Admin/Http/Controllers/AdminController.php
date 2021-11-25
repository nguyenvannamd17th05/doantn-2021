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
            return redirect()->route('admin.index');
        }
        return redirect()->back();
    }


}
