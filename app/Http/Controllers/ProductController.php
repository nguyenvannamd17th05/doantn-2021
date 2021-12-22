<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $productImgs=ProductImage::where('pro_id',$id)->get();
        $ratings = Rating::with('user:id,name,total_pay')
            ->where('pro_id',$id)
            ->orderBy('id',"DESC")
            ->paginate(3);
        $ratingsTotal = Rating::groupBy('ra_number')->where('pro_id',$id)->select(DB::raw('count(ra_number) as total'),'ra_number')->get()->toArray();
        $arrayRatings=[];
        if(!empty($ratingsTotal)){
            for($i=1;$i<=5;$i++)
            {
                $arrayRatings[$i]=[
                    'total'=>0,
                    'ra_number'=>0,
                ];
                foreach ($ratingsTotal as $item)
                {
                    if($item['ra_number']==$i){
                        $arrayRatings[$i] = $item;
                        continue;
                    }
                }
            }
        }
        return view('product.detail',compact('productDetail','productImgs','ratings','arrayRatings'));
    }
}
