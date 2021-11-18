<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TransactionController extends Controller
{

    public function index()
    {
        $transactions=Transaction::paginate(10);
        return view('admin::transaction.index',compact('transactions'));
    }


    public function viewOrder(Request $request,$id)
    {
        if($request->ajax())
        {
            $orders=Order::where('transaction_id',$id)->get();
            $html=view('admin::layouts.order',compact('orders'))->render();
            return \response()->json($html);
        }
    }

    public function action(Request $request, $id)
    {
        //
    }

}
