<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    public function __construct()
    {
        $categories=Category::all();
        $productsCart=\Cart::content();
        View::share(compact('categories','productsCart'));
    }
}
