<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestArticle;
use App\Models\Article;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class   AdminArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles=Article::whereRaw(1);
        if($request->name)
            $articles->where('a_name','like','%'.$request->name.'%');
        $articles=$articles->paginate(10);
        return view('admin::article.index',compact('articles'));
    }
    public function create()
    {
        return view('admin::article.create');
    }
    public function store(RequestArticle $requestArticle)
    {
        $this->insertOrUpdate($requestArticle);
        return redirect(route('admin.article.index'));
    }
    public function edit($id)
    {
        $article=Article::find($id);
        return view('admin::article.update',compact('article'));
    }

    public function update(RequestArticle $requestArticle, $id)
    {
        $this->insertOrUpdate($requestArticle,$id);
        return redirect()->back();
    }
    public function insertOrUpdate($requestArticle,$id=''){

        $code=1;
        try{
            $article=new Article();
            if($id) $article=Article::find($id);
            $article->a_name=$requestArticle->a_name;
            $article->a_slug=Str::slug($requestArticle->a_name);
            $article->a_desc=$requestArticle->a_desc;
            $article->a_content=$requestArticle->a_content;
            $article->a_title_seo=$requestArticle->a_title_seo ? $requestArticle->a_title_seo : $requestArticle->a_name;
            $article->a_desc_seo=$requestArticle->a_desc_seo?$requestArticle->a_desc_seo:$requestArticle->a_desc;
            if($requestArticle->hasFile('a_avatar')){
                $file=upload_image('a_avatar','article');
                if(isset($file['name'])){
                    $article->a_avatar=$file['name'];
                }
            }
            $article->save();
        }catch (\Exception $exception){
            $code=0;
            Log::error("[Error insertOrUpdate Articles]".$exception->getMessage());

        }
        return $code;
    }
    public function action($action,$id){
        if($action){
            $article=Article::find($id);
            switch ($action)
            {
                case 'delete':
                    $article->delete();
                    break;
                case 'active':
                    $article->a_active=!($article->a_active) ;
                    $article->save();
                    break;
            }
        }
        return redirect()->back();
    }


}
