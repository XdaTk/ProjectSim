<!DOCTYPE html>
<html lang="zh_CN" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>控制台</title>
    <link rel="stylesheet" href="{{asset('/res/uikit/css/uikit.almost-flat.min.css')}}">
    <link rel="stylesheet" href="{{asset('/res/uikit/css/components/progress.min.css')}}">
    <link rel="stylesheet" href="{{asset('/res/custom/css/main.css')}}">
    <script src="{{asset('/res/jquery.min.js')}}"></script>
    <script src="{{asset('/res/uikit/js/uikit.min.js')}}"></script>
    <script src="{{asset('/res/uikit/js/components/accordion.min.js')}}"></script>
    <script src="{{asset('/res/uikit/js/components/pagination.min.js')}}"></script>
    <script src="{{asset('/res/custom/js/main.js')}}"></script>
</head>
<body>
<div class="uk-margin uk-margin-top">
    <nav class="uk-navbar">
        <ul class="uk-navbar-nav uk-hidden-small">
            <li class="uk-active"><a href="/home">控制台</a></li>
            <li class="uk-parent" data-uk-dropdown="">
                <a href="/home/blog/create">撰写文章</a>
            </li>
            <li class="uk-parent" data-uk-dropdown="">
                <a href="">管理</a>

                <div class="uk-dropdown uk-dropdown-navbar uk-dropdown-small">
                    <ul class="uk-nav uk-nav-navbar">
                        <li><a href="/home/blog/">文章管理</a></li>
                        <li><a href="/home/comment">评论管理</a></li>
                        <li><a href="/home/classify/create">分类添加</a></li>
                        <li><a href="/home/classify">分类管理</a></li>
                    </ul>
                </div>
            </li>
            <li class="uk-parent" data-uk-dropdown="">
                <a href="">设置</a>

                <div class="uk-dropdown uk-dropdown-navbar">
                    <ul class="uk-nav uk-nav-navbar">
                        <li><a href="/home/love/create">添加友情链接</a></li>
                        <li><a href="/home/love">友情链接管理</a></li>
                    </ul>
                </div>

            </li>
        </ul>
        <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas=""></a>
        <div class="uk-navbar-flip">
            <a href="" class="uk-navbar-toggle uk-navbar-toggle-alt uk-visible-small"></a>
            <ul class="uk-navbar-nav uk-hidden-small">
                <li class="uk-parent">
                    <a href="">{{Auth::user()->name}}</a>
                </li>
                <li><a href="/auth/logout">登出</a></li>
                <li class=""><a href="/">网站</a></li>
            </ul>
        </div>
        <div class="uk-navbar-content uk-navbar-center"><a href="#"><img src="{{asset('/res/custom/imgs/Sim.png')}}"></a></div>
    </nav>
</div>
@yield("main")
</body>
</html>