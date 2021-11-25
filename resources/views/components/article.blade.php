@if (isset($articles))
    @foreach($articles as $article)
        <div class="article" style="padding-bottom: 10px;margin-bottom: 10px;border-bottom: 1px solid #f2f2f2;display: flex">
            <div class="article_avatar">
                <a href="{{ route('article.detail',[$article->a_slug,$article->id]) }}">
                    <img src="{{ asset(pare_url_file($article->a_avatar,'article') )}}" style="width: 200px;height: 120px" alt="">
                </a>
            </div>
            <div class="article_info" style="width: 80%;margin-left: 20px">
                <h2 style="font-size: 14px"><a href="{{ route('article.detail',[$article->a_slug,$article->id]) }}">{{ $article->a_name }}</a></h2>
                <p style="font-size: 13px">{{ $article->a_desc }}</p>
                <p>Đăng bởi: {{isset($article->admin->name)?$article->admin->name:'admin'}}<br> <span>{{ time_elapsed_string($article->created_at) }}</span></p>
            </div>
        </div>
    @endforeach
    {!! $articles->links() !!}
@endif
