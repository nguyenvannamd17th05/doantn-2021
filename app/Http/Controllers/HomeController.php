<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;

class HomeController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $productsHot=Product::where([
            'pro_hot'=>Product::HOT_ON,
            'pro_active'=>Product::STATUS_PUBLIC,
        ])->limit(5)->get();
        $articles=Article::where([
            'a_active'=>Article::STATUS_PUBLIC,
            ])->orderBy('id','DESC')->limit(3)->get();

        return view('home.index',compact('productsHot','articles'));
    }
}
