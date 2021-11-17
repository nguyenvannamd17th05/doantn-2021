<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function detailProduct(Request $request){
        $url=$request->segment(2);
        $url=preg_split('/(-)/i',$url);
        if($id=array_pop($url)){
            $productDetail=Product::where('pro_active',Product::STATUS_PUBLIC)->find($id);
        }
        return view('product.detail',compact('productDetail'));
    }
}
