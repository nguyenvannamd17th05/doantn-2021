<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $products=Product::with('Category:c_name');
        if($request->name)
            $products->where('pro_name','like','%'.$request->name.'%');
        if($request->cate)
            $products->where('cate_id',$request->cate);
        $products=$products->orderByDesc('id')->paginate(5);

        $categories=$this->getCategory();
        return view('admin::product.index',compact('products','categories'));
    }


    public function create()
    {

        $categories=$this->getCategory();
        return view('admin::product.create',compact('categories'));

    }


    public function store(RequestProduct $requestProduct)
    {
        $this->insertOrUpdate($requestProduct);
        return redirect(route('admin.product.index'))->with('success','Thêm mới thành công');
    }
    public function getCategory(){
        return Category::all();
    }
    public function insertOrUpdate($requestProduct,$id=''){
        $product=new Product();
        if($id) $product=Product::find($id);
        $product->pro_name        =$requestProduct->pro_name;
        $product->pro_slug        =Str::slug($requestProduct->pro_name);
        $product->cate_id         =$requestProduct->cate_id;
        $product->pro_price       =$requestProduct->pro_price;
        $product->pro_sale        =$requestProduct->pro_sale;
        $product->pro_number        =$requestProduct->pro_number;
        $product->pro_desc        =$requestProduct->pro_desc;
        $product->pro_content     =$requestProduct->pro_content;
        $product->pro_title_seo   =$requestProduct->pro_title_seo ? $requestProduct->pro_title_seo : $requestProduct->pro_name;
        $product->pro_desc_seo    =$requestProduct->pro_desc_seo ? $requestProduct->pro_desc_seo : $requestProduct->pro_name;
        if($requestProduct->hasFile('pro_image')){
            $file=upload_image('pro_image','product');
            if(isset($file['name'])){
                $product->pro_image=$file['name'];
            }
        }
        $product->save();
    }

    public function edit($id)
    {
        $product=Product::find($id);
        $categories= $this->getCategory();
        return view('admin::product.update',compact('product','categories'));
    }


    public function update(RequestProduct $requestProduct, $id)
    {
        $this->insertOrUpdate($requestProduct,$id);
        return redirect()->back()->with('success','Cập nhật thành công');
    }
    public function action($action,$id){
        if($action){
            $product=Product::find($id);
            switch ($action)
            {
                case 'delete':
                    $product->delete();
                    break;
                case 'active':
                    $product->pro_active=!($product->pro_active) ;
                    $product->save();
                    break;
                case 'hot':
                    $product->pro_hot =!($product->pro_hot) ;
                    $product->save();
                    break;
            }
        }
        return redirect()->back();
    }

}
