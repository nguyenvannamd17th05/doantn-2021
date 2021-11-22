<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

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

    public function active($id)
    {
        $transaction=Transaction::find($id);
        $orders=Order::where('transaction_id',$id)->get();
        if($orders){
            foreach ($orders as $order) {
                $product=Product::find($order->pro_id);
                $product->pro_number=$product->pro_number-$order->or_qty;
                $product->pro_sell++;
                $product->save();
            }
        }
        DB::table('users')->where('id',$transaction->user_id)->increment('total_pay');
        $transaction->tr_status=Transaction::STATUS_DONE;
        $transaction->save();
        return redirect()->back()->with('success','Đã xác nhận đơn hàng');
    }

}
