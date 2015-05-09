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
    <script src="{{asset('/res/custom/js/main.js')}}"></script>
</head>
<body>
<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
    <nav class="uk-navbar">
        <a class="uk-navbar-brand uk-hidden-small" href="#">控制台</a>
        <div class="uk-navbar-content uk-hidden-small">
            <ul class="uk-navbar-nav">
                <li><a href=""><i class="uk-icon-list-alt"></i>撰写</a></li>
                <li aria-expanded="false" aria-haspopup="true" class="uk-parent" data-uk-dropdown="">
                    <a href=""><i class="uk-icon-building-o"></i>管理</a>
                    <div style="" class="uk-dropdown uk-dropdown-navbar uk-dropdown-small">
                        <ul class="uk-nav uk-nav-navbar">
                            <li><a href="#">发表文章</a></li>
                            <li><a href="#">所有文章</a></li>
                        </ul>
                    </div>
                </li>
                <li aria-expanded="false" aria-haspopup="true" class="uk-parent" data-uk-dropdown="">
                    <a href=""><i class="uk-icon-folder-open-o"></i>设置</a>
                    <div style="" class="uk-dropdown uk-dropdown-navbar uk-dropdown-small">
                        <ul class="uk-nav uk-nav-navbar">
                            <li><a href="#">上传文件</a></li>
                            <li><a href="#">试图文件</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="uk-navbar-content uk-hidden-small uk-navbar-flip">
            <ul class="uk-navbar-nav">
                <li aria-expanded="false" aria-haspopup="true" class="uk-parent" data-uk-dropdown="">
                    <a href=""><i class="uk-icon-user"></i>用户名</a>
                    <div style="" class="uk-dropdown uk-dropdown-navbar uk-dropdown-small">
                        <ul class="uk-nav uk-nav-navbar">
                            <li><a href="#">个人信息修改</a></li>
                            <li><a href="#">退出登录</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
        <div class="uk-navbar-brand uk-navbar-center uk-visible-small">控制台</div>
    </nav>
    @yield('main')
</div>
</body>
</html>