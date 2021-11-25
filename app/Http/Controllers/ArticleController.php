<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listArticle(){
        $articles=Article::where('a_active',Article::STATUS_PUBLIC)->orderBy("id","DESC")->paginate(5);
        $articleHot = Article::where([
            'a_hot'=>Article::HOT,
            'a_active'=>Article::STATUS_PUBLIC
            ])->get();

        return view('article.index',compact('articles','articleHot'));
    }
    public function detailArticle(Request $request)
    {
        $arrayUrl = (preg_split("/(-)/i",$request->segment(2)));

        $id = array_pop($arrayUrl);

        if ($id)
        {
            $articleDetail = Article::find($id);
            $articles = Article::where('a_active',Article::STATUS_PUBLIC)->whereNotIn('id', [$id])->orderBy("id","DESC")->paginate(3);
            $articleHot = Article::where([
                'a_hot'=>Article::HOT,
                'a_active'=>Article::STATUS_PUBLIC
            ])->get();
            $viewData = [
                'articles' => $articles,
                'articleDetail' => $articleDetail,
                'articleHot' => $articleHot
            ];

            return view('article.detail',$viewData);
        }

        return redirect('/');
    }
}
