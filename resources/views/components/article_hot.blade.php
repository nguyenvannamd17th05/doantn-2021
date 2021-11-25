@if (isset($articleHot))
    @foreach($articleHot as $arHot)
        <div class="article_hot_item">
            <div class="article_img">
                <a href="{{route('article.detail',[$arHot->a_slug,$arHot->id])}}">
                    <img src="{{asset(pare_url_file($arHot->a_avatar,'article'))}}" alt="" style="width: 200px;height: 120px">
                </a>
            </div>
            <div class="article_info">
                <h3 style="font-size: 16px;margin-top: 10px;margin-bottom: 10px;">{{ $arHot->a_name }}</h3>
                <p >{{ $arHot->a_desc }}</p>
            </div>
        </div>
    @endforeach
@endif
