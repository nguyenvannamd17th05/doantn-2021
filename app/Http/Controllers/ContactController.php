<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestContact;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class ContactController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getContact(){
        return view('contact');
    }
    public function saveContact(RequestContact $request){
        $data=$request->except('_token');
        Contact::create($data);
        return redirect()->back()->with('message','Cảm ơn vì đã liên hệ với chúng tôi. Chúng tôi sẽ phản hồi nhanh nhât có thể!');
    }
}
