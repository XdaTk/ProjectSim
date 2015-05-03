<!DOCTYPE html>
<html lang="zh_CN" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}"/>
    @yield('title')
    <link rel="stylesheet" href="{{asset('/res/uikit/css/uikit.almost-flat.min.css')}}">
    <link rel="stylesheet" href="{{asset('/res/uikit/css/components/search.almost-flat.min.css')}}">
    <link rel="stylesheet" href="{{asset('/res/uikit/css/components/notify.almost-flat.min.css')}}">
    <link rel="stylesheet" href="{{asset('/res/uikit/css/components/slideshow.almost-flat.min.css')}}">
    <link rel="stylesheet" href="{{asset('/res/uikit/css/components/slidenav.almost-flat.min.css')}}">
    <link rel="stylesheet" href="{{asset('/res/custom/css/main.css')}}">
    <script src="{{asset('/res/jquery.min.js')}}"></script>
    <script src="{{asset('/res/uikit/js/uikit.min.js')}}"></script>
    <script src="{{asset('/res/uikit/js/components/notify.min.js')}}"></script>
    <script src="{{asset('/res/uikit/js/components/search.min.js')}}"></script>
    <script src="{{asset('/res/uikit/js/components/slideshow.min.js')}}"></script>
    <script src="{{asset('/res/uikit/js/components/slideshow-fx.min.js')}}"></script>
    <script src="{{asset('/res/uikit/js/components/pagination.min.js')}}"></script>
    <script src="{{asset('/res/custom/js/main.js')}}"></script>
</head>
<body>
<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
    <nav class="uk-navbar uk-margin-large-bottom">
        <a class="uk-navbar-brand uk-hidden-small" href="/"><img src="{{asset('/res/custom/imgs/Sim.png')}}"/></a>
        <ul class="uk-navbar-nav uk-hidden-small">
            <li class="uk-active">
                <a href="/">首页</a>
            </li>
        </ul>
        <div class="uk-navbar-content uk-hidden-small  uk-navbar-flip">
            <form class="uk-form uk-margin-remove uk-display-inline-block uk-search">
                <i class="uk-icon-search"></i>
                <input type="text" class="uk-search-field" placeholder="Search">
            </form>
        </div>
        <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>

        <div class="uk-navbar-brand uk-navbar-center uk-visible-small"><img
                    src="{{asset('/res/custom/imgs/Sim.png')}}"/></div>
    </nav>
    @yield('top')
    <div class="uk-grid" data-uk-grid-margin>
        @yield('blog')
        <div class="uk-width-medium-1-4 uk-hidden-small">
            @foreach($userInfos as $userinfo)
                <div class="uk-panel uk-panel-box uk-text-center">
                    <img class="uk-border-circle" width="120" height="120"
                         src="{{$userinfo->img}}"
                         alt="">

                    <h3>{{$userinfo->name}}</h3>

                    <p>{{$userinfo->about}}</p>
                </div>
            @endforeach
            <div class="uk-panel">
                <ul class="uk-tab" data-uk-tab="{connect:'#new_article'}">
                    <li><a href="">最新文章</a></li>
                    <li><a href="">最热文章</a></li>
                    <li><a href="">最爱文章</a></li>
                </ul>
                <ul id="new_article" class="uk-switcher uk-margin">
                    <li>
                        @foreach($newsTops as $newsTop)
                            <a href="/blog/{{$newsTop->id}}">{{$newsTop->title}}</a><br>
                        @endforeach
                    </li>
                    <li>
                        @foreach($lovesTops as $lovesTop)
                            <a href="/blog/{{$lovesTop->id}}">{{$lovesTop->title}}</a><br>
                        @endforeach
                    </li>
                    <li>
                        @foreach($readsTops as $readsTop)
                            <a href="/blog/{{$readsTop->id}}">{{$readsTop->title}}</a><br>
                        @endforeach
                    </li>
                </ul>
            </div>
            <div class="uk-panel">
                <h3 class="uk-panel-title"><i class="uk-icon-comments-o"></i>分类信息</h3>
                <ul class="uk-list uk-list-line">
                    @foreach($classifys as $classify)
                        <li><a href="/blog/classify/{{$classify->id}}">{{$classify->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="uk-panel">
                <h3 class="uk-panel-title"><i class="uk-icon-link">>友情链接</i></h3>
                <ul class="uk-list uk-list-line">
                    <li><a href="#">管理链接</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="offcanvas" class="uk-offcanvas">
    <div class="uk-offcanvas-bar">
        <form class="uk-search">
            <input class="uk-search-field" type="search" placeholder="search...">
        </form>
        <div class="uk-panel uk-text-center">
            @foreach($userInfos as $userinfo)
                <img class="uk-border-circle" width="120" height="120"
                     src="{{$userinfo->img}}"
                     alt="">
                <h3>{{$userinfo->name}}</h3>
                <p>{{$userinfo->about}}</p>
            @endforeach
        </div>
        <ul class="uk-nav uk-nav-offcanvas">
            <li class="uk-active">
                <a href="/">首页</a>
            </li>
            <li>
                <a href="/auth/login">登录</a>
            </li>
        </ul>
        <div class="uk-panel">
            <h3 class="uk-panel-title"><i class="uk-icon-comments-o"></i>分类信息&nbsp;</h3>
            <ul class="uk-list">
                @foreach($classifys as $classify)
                    <li><a href="#">{{$classify->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="uk-panel">
            <h3 class="uk-panel-title">友情链接&nbsp;<i class="uk-icon-link"></i></h3>
            <ul class="uk-list">
                <li><a href="#">管理链接</a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>