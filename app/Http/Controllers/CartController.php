<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CartController extends FrontendController
{
    public function addProduct(Request $request,$id){
        $product=Product::select('pro_name','pro_price','id','pro_image','pro_sale','pro_number')->find($id);
        if(!$product)
            return redirect()->route('home.index');

        $price=$product->pro_price;
        if($product->pro_sale){
            $price= $price * (100-$product->pro_sale)/100;
        }
        if($product->pro_number==0) {
            return redirect()->back()->with('warning', 'Sản phẩm đang tạm hết hàng!');
        }
        $qty=1;
        if($request->qty){
            if($request->qty>$product->pro_number)
            {
                $msg= 'Hiện chỉ còn ' . $product->pro_number. ' sản phẩm! Vui lòng chọn số lượng nhỏ hơn!';
                return redirect()->back()->with('warning',$msg);
            }
            else if($request->qty<1)
            {
                $msg= 'Số lượng sản phẩm không phù hợp';
                return redirect()->back()->with('warning',$msg);
            }
            $qty=$request->qty;
        }

        \Cart::add([
            'id'=>$id,
            'name'=>$product->pro_name,
            'qty'=>$qty,
            'price'=>$price,
            'options'=>[
                'image'=>$product->pro_image,
                'sale'=>$product->pro_sale,
                'price_old'=>$product->pro_price,
            ],
        ]);
        return redirect()->back()->with('success','Mua hàng thành công!');
    }
    public function deleteProduct($key){
        \Cart::remove($key);
        return redirect()->back()->with('success','Xóa sản phẩm thành công!');
    }
    public function getListCart(){
        $products=\Cart::content();
        return view('cart.index',compact('products'));
    }
    public function updateCart(Request $request,$id){
        \Cart::update($id, ['qty' => $request->qty]);
        return redirect()->back()->with('success','Cập nhật thành công');
    }
    public function saveInfoShip(Request $request){
        $totalMoney= Str::replace(',','', \Cart::subtotal(0));
        $email=get_data_user('web','email');
        $transactionId=Transaction::insertGetId([
            'user_id'     =>get_data_user('web'),
            'tr_total'    =>(int)$totalMoney,
            'tr_note'     =>$request->note,
            'tr_address'  =>$request->address,
            'tr_phone'    =>$request->phone,
            'created_at'  =>Carbon::now(),
            'updated_at'  =>Carbon::now(),
        ]);
        if($transactionId){
            $products=\Cart::content();
            foreach ($products as $product){
                Order::insert([
                    'transaction_id' =>$transactionId,
                    'pro_id'         =>$product->id,
                    'or_qty'         =>$product->qty,
                    'or_price'       =>$product->options->price_old,
                    'or_sale'        =>$product->options->sale,
                ]);
            }
        }
       $transacion=Transaction::where('id',$transactionId)->first();
        $data=[
            'transaction'=>$transacion,
            'products'=>$products,
        ];
        Mail::send('email.transaction',$data,function ($message) use($email){
            $message->to($email,'Invoice Recap')->subject('Hóa đơn mua hàng');
        });
        \Cart::destroy();
        return redirect('/')->with('success','Đặt hàng thành công! Vui lòng kiểm tra lại email');
    }
    public function getPay(){
        $products=\Cart::content();
        return view('cart.pay',compact('products'));
    }
    public function sendInvolve(){

    }
}
