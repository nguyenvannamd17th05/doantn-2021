<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
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
        $ratings = Rating::with('user:id,name')
            ->where('pro_id',$id)
            ->orderBy('id',"DESC")
            ->paginate(3);
        return view('product.detail',compact('productDetail','ratings'));
    }
}
