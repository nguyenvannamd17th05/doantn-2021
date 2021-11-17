<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestCategory;
use App\Models\Category;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class CategoryController extends Controller
{

    public function index()
    {
        $categories=Category::select('id','c_name','c_active','c_title_seo')->get();
        return view('admin::category.index',compact('categories'));
    }
    public function create(){
        return view('admin::category.create');
    }
    public function store(RequestCategory $requestCategory){

        $this->insertOrUpdate($requestCategory);
        return redirect(route('admin.cate.index'));
    }
    public function edit($id){
        $category=Category::find($id);
        return view('admin::category.update',compact('category'));
    }
    public function update(RequestCategory $requestCategory,$id){
        $this->insertOrUpdate($requestCategory,$id);
        return redirect(route('admin.cate.index'));
    }
    public function insertOrUpdate($requestCategory,$id=''){
        $code=1;
        try{
                $category=new Category();

            if($id){
                $category=Category::find($id);
            }
            $category->c_name=$requestCategory->name;
            $category->c_slug=Str::slug($requestCategory->name);
            $category->c_icon=$requestCategory->icon;
            $category->c_title_seo=$requestCategory->c_title_seo ? $requestCategory->c_title_seo : $requestCategory->name;
            $category->c_desc_seo=$requestCategory->c_desc_seo;
            $category->save();
        }catch (\Exception $exception){
            $code=0;
            Log::error("[Error inserorUpdate Categories]".$exception->getMessage());

        }
        return $code;
    }
    public function action($action,$id){
        if($action){
            $category=Category::find($id);
            switch ($action)
            {
                case 'delete':
                    $category->delete();
                    break;
                case 'active':
                    $category->c_active=!($category->c_active) ;
                    $category->save();
                    break;
            }
        }
        return redirect()->back();
    }

}
