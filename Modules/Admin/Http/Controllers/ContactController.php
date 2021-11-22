<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Contact;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ContactController extends Controller
{

    public function index()
    {
        $contacts=Contact::paginate(10);
        return view('admin::contact.index',compact('contacts'));
    }
    public function action($action,$id){
        if($action){
            $contact = Contact::find($id);
            switch ($action)
            {
                case  'update':
                    $contact->c_status = $contact->c_status == 1 ? 0 : 1;
                    $contact->save();
                    break;
            }

            return redirect()->back();
        }
    }

}
