@extends('layout.app')
@section('content')
<style>
    .article_content h2 { font-size: 24px !important;}
    .article_content h3 { font-size: 20px !important;}
    .article_content h4 { font-size: 18px !important;}
    /*.article_content h2 { font-size: 1.4rem}*/
    /*.article_content h1 { font-size: 18px !important;line-height: 24px}*/
    .article_content  { font-family:  Roboto, sans-serif;}
    .main-contact-area { margin-top: 20px}
    .article_detail{
        overflow: hidden;
    }
    .article_detail img {
        margin: 0 auto;
        text-align: center;
        max-width: 100%;
        display: block;
    }
</style>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container-inner">
                    <ul>
                        <li class="home">
                            <a href="">Home</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="home">
                            <a href="{{ route('article.listArticle') }}" title="Bài viết">Bài viết</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category3"><span>{{ $articleDetail->a_name }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-contact-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="article_content" style="margin-bottom: 20px ">
                    <h1>{{ $articleDetail->a_name }}</h1>
                    <div class="userdetail" style="display: block;overflow: hidden;margin: 0 10px 0 0; padding: 15px 0;">
                        <a href="" style="display: inline-block;font-size: 12px;font-weight: 600;color: #288ad6;vertical-align: middle;overflow: hidden; margin: 0;">
                            {{isset($articleDetail->admin->name)?$articleDetail->admin->name:'[N\A]'}}
                        </a>
                        <span style="display: inline-block;font-size: 12px;color: #999;vertical-align: middle;margin: -2px 5px 0;cursor: pointer;">{{time_elapsed_string($articleDetail->created_at)}}</span>
                    </div>
                    <p style="font-weight: 500;color: #333">{{ $articleDetail->a_desc}}</p>
                    <div class="article_detail" style="text-align: justify">
                        {!! $articleDetail->a_content !!}
                    </div>
                </div>
                <h4>Bài viết khác</h4>
                @include('components.article')
            </div>
            <div class="col-sm-3">
                <h5>Bài viết nổi bật</h5>
                <div class="list_article_hot">
                    @include('components.article_hot')
                </div>
            </div>
        </div>
    </div>
</div>
@stop
