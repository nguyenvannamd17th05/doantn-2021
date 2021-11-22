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
            ]);
            if($request->price){
                $price=$request->price;
                switch ($price)
                {
                    case '1':
                        $products->where('pro_price','<',2000000);
                        break;
                    case '2':
                        $products->whereBetWeen('pro_price',[2000000,4000000]);
                        break;
                    case '3':
                        $products->whereBetWeen('pro_price',[4000000,7000000]);
                        break;
                    case '4':
                        $products->whereBetWeen('pro_price',[7000000,13000000]);
                        break;
                    case '5':
                        $products->whereBetWeen('pro_price',[13000000,20000000]);
                        break;
                    case '6':
                        $products->where('pro_price','>',20000000);
                        break;
                }
            }
            if($request->orderby){
                $orderby= $request->orderby;
                switch ($orderby){
                    case 'desc':
                        $products->orderby('id','desc');
                        break;
                    case 'sell':
                        $products->orderby('pro_sell','desc');
                        break;
                    case 'price':
                        $products->orderby('pro_price','asc');
                        break;
                    case 'price-desc':
                        $products->orderby('pro_price','desc');
                        break;
                    default:
                        $products->orderby('id','desc');
                }
            }
            $products=$products->paginate(9);
            $cateProduct=Category::find($id);
            return view('product.index',compact('products','cateProduct'));
        }
        return redirect('/');
    }
}
