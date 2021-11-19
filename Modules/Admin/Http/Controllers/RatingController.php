<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Rating;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RatingController extends Controller
{

    public function index()
    {
        $ratings=Rating::paginate(10);
        return view('admin::rating.index',compact('ratings'));
    }


}
