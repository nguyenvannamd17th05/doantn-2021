<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class CartController extends FrontendController
{
    public function addProduct(Request $request,$id){
        $product=Product::select('pro_name','pro_price','id','pro_image','pro_sale')->find($id);
        $price=$product->pro_price;
        if($product->pro_sale){
            $price= $price * (100-$product->pro_sale)/100;
        }
        \Cart::add([
            'id'=>$id,
            'name'=>$product->pro_name,
            'qty'=>1,
            'price'=>$price,
            'options'=>[
                'image'=>$product->pro_image,
                'sale'=>$product->pro_sale,
                'price_old'=>$product->pro_price,
            ],
        ]);
        return redirect()->back();
    }
    public function deleteProduct($key){
        \Cart::remove($key);
        return redirect()->back();
    }
    public function getListCart(){
        $products=\Cart::content();
        return view('cart.index',compact('products'));
    }
    public function saveInfoShip(Request $request){
        $totalMoney= Str::replace(',','', \Cart::subtotal(0));
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
        \Cart::destroy();
        return redirect('/');
    }
    public function getPay(){
        $products=\Cart::content();
        return view('cart.pay',compact('products'));
    }
}
