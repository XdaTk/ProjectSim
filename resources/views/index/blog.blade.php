@extends('index.template')

@section('title')
    <title>主页</title>
@stop
@section('top')
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-slidenav-position" data-uk-slideshow="">
                <ul class="uk-slideshow uk-overlay-active" style="height: 411px;">
                    <li aria-hidden="true" style="height: 411px;">
                        <div class="uk-cover-background uk-position-cover"
                             style="background-image: url(http://getuikit.com/docs/images/placeholder_800x400_2.jpg);"></div>
                        <img src="http://getuikit.com/docs/images/placeholder_800x400_2.jpg" width="800" height="400"
                             alt="" style="width: 100%; height: auto;">

                        <div class="uk-overlay-panel uk-overlay-background uk-overlay-fade uk-flex uk-flex-center uk-flex-middle uk-text-center">
                            <div>
                                <h3>Overlay</h3>

                                <p>Lorem <a href="#">ipsum dolor</a> sit amet, consetetur sadipscing elitr,<br>sed diam
                                    nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam.</p>
                                <button class="uk-button uk-button-primary">Button</button>
                            </div>
                        </div>
                    </li>
                    <li aria-hidden="true" style="height: 411px;">
                        <div class="uk-cover-background uk-position-cover"
                             style="background-image: url(http://getuikit.com/docs/images/placeholder_800x400_1.jpg);"></div>
                        <img src="http://getuikit.com/docs/images/placeholder_800x400_2.jpg" width="800" height="400"
                             alt="" style="width: 100%; height: auto;">

                        <div class="uk-overlay-panel uk-overlay-background uk-overlay-fade uk-flex uk-flex-center uk-flex-middle uk-text-center">
                            <div>
                                <h3>Overlay</h3>

                                <p>Lorem <a href="#">ipsum dolor</a> sit amet, consetetur sadipscing elitr,<br>sed diam
                                    nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam.</p>
                                <button class="uk-button uk-button-primary">Button</button>
                            </div>
                        </div>
                    </li>
                </ul>
                <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous"
                   data-uk-slideshow-item="previous" style="color: rgba(255,255,255,0.4)"></a>
                <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"
                   style="color: rgba(255,255,255,0.4)"></a>
            </div>
        </div>
    </div>
@stop
@section('blog')
    <div class="uk-width-medium-3-4">
        @foreach($blogs as $blog)
            <article class="uk-article">
                <h1 class="uk-article-title">
                    <a href="/blog/{{$blog->id}}">{{$blog->title}}</a>
                </h1>

                <p class="uk-article-meta"><a href="#">创建人：{{$blog->users->name}} &nbsp</a>创建于：{{$blog->created_at}}</p>

                <p>
                    <a href="/blog/{{$blog->id}}"><img width="900" height="300" src="{{$blog->url}}" alt=""></a>
                </p>

                <p>
                    {{$blog->article}}
                </p>
                <a class="uk-button uk-button-danger" href="#" onclick=""><i
                            class="uk-icon-star"></i>&nbsp;点赞({{$blog->reads}})</a>
                <a class="uk-button uk-button-primary" href="/blog/{{$blog->id}}"><i class="uk-icon-tag"></i>&nbsp;继续阅读</a>
            </article>
        @endforeach
        <ul class="uk-pagination">
            <li class=""><a href="{{$pages['prev_page_url']}}"><span><i
                                class="uk-icon-angle-double-left"></i></span></a></li>
            @if($pages['current_page']>3)
                @if($pages['current_page']!=1)
                    <li><a href="/?page=1">第一页</a></li>
                @endif
                <li><a href="/?page={{$pages['current_page']-2}}">{{$pages['current_page']-2}}</a></li>
                <li><a href="/?page={{$pages['current_page']-1}}">{{$pages['current_page']-1}}</a></li>
            @endif
            <li class="uk-active"><span>{{$pages['current_page']}}</span></li>
            @if($pages['current_page']+2<$pages['last_page'])
                <li><a href="/?page={{$pages['current_page']+1}}">{{$pages['current_page']+1}}</a></li>
                <li><a href="/?page={{$pages['current_page']+2}}">{{$pages['current_page']+2}}</a></li>
            @endif
            @if($pages['current_page']+2<$pages['last_page']&&$pages['last_page']>5)
                <li><span>...</span></li>
                <li><a href="/?page={{$pages['last_page']-2}}">{{$pages['last_page']-2}}</a></li>
                <li><a href="/?page={{$pages['last_page']-1}}">{{$pages['last_page']-1}}</a></li>
            @endif
            @if($pages['current_page']!=$pages['last_page'])
                <li><a href="/?page={{$pages['last_page']}}">最后一页</a></li>
            @endif
            <li><a href="{{$pages['next_page_url']}}#"><i class="uk-icon-angle-double-right"></i></a></li>
        </ul>
    </div>
@stop
