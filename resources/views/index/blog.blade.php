@extends('index.template')

@section('title')
    <title>主页</title>
@stop
@section('top')
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-slidenav-position" data-uk-slideshow="">
                <ul class="uk-slideshow uk-overlay-active" style="height: 411px;">
                    @foreach($lovesTops as $lovesTop)
                        <li aria-hidden="true" style="height: 411px;">
                            <div class="uk-cover-background uk-position-cover"
                                 style="background-image: url({{$lovesTop->url}});"></div>
                            <img src="{{$lovesTop->url}}" width="800"
                                 height="400"
                                 alt="" style="width: 100%; height: auto;">

                            <div class="uk-overlay-panel uk-overlay-background uk-overlay-fade uk-flex uk-flex-center uk-flex-middle uk-text-center">
                                <div>
                                    <h3>{{$lovesTop->title}}</h3>

                                    <p>{{$lovesTop->brief}}</p>
                                    <a href="/blog/{{$lovesTop->id}}" class="uk-button uk-button-primary">查看更多</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous"
                   data-uk-slideshow-item="previous" style="color: rgba(13, 23, 255, 0.40)"></a>
                <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"
                   style="color:  rgba(13, 23, 255, 0.40)"></a>
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

                <p class="uk-article-meta"><a href="#">创建人：{{$blog->users->name}} &nbsp</a> <a
                            href="#">分类信息：{{$blog->Classify->name}}</a> 创建于：{{$blog->created_at}}</p>

                <p>
                    <a href="/blog/{{$blog->id}}"><img width="900" height="300" src="{{$blog->url}}" alt=""></a>
                </p>

                <p>
                    {{$blog->brief}}
                </p>
                <a class="uk-button uk-button-danger" href="#" onclick=""><i
                            class="uk-icon-star"></i>&nbsp;阅读数量({{$blog->reads}})</a>
                <a class="uk-button uk-button-danger" id="lover{{$blog->id}}" href="#lover{{$blog->id}}" onclick="addLoverCount({{$blog->id}})"><i
                            class="uk-icon-star"></i>&nbsp;喜欢({{$blog->loves}})</a>
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
