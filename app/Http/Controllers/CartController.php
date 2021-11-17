<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;

class CartController extends FrontendController
{
    public function addProduct(Request $request,$id){
        $product=Product::select('pro_name','pro_price','id','pro_image','pro_sale')->find($id);
        \Cart::add([
            'id'=>$id,
            'name'=>$product->pro_name,
            'qty'=>1,
            'price'=>$product->pro_price,
            'options'=>['image'=>$product->pro_image],
        ]);
        return redirect()->back();
    }
    public function getListCart(){
        $products=\Cart::content();
        return view('cart.index',compact('products'));
    }
}
