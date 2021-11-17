<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function listProduct(Request $request){
        $url=$request->segment(2);
        $url=preg_split('/(-)/i',$url);
        if($id=array_pop($url)){
            $products=Product::where([
                'cate_id'=>$id,
                'pro_active'=>Product::STATUS_PUBLIC
            ])->orderBy('id','DESC')->paginate(10);
            $cateProduct=Category::find($id);
            return view('product.index',compact('products','cateProduct'));
        }
        return redirect('/');
    }
}
