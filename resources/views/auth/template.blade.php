<!doctype html>
<html lang="zh_CN" dir="ltr" class="uk-height-1-1">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="{{asset('/res/uikit/css/uikit.almost-flat.min.css')}}">
    <link rel="stylesheet" href="{{asset('/res/uikit/css/components/form-password.almost-flat.min.css')}}">
    <link rel="stylesheet" href="{{asset('/res/uikit/css/components/notify.almost-flat.min.css')}}">
    <script src="{{asset('/res/jquery.min.js')}}"></script>
    <script src="{{asset('/res/uikit/js/uikit.min.js')}}"></script>
    <script src="{{asset('/res/uikit/js/components/form-password.min.js')}}"></script>
    <script src="{{asset('/res/uikit/js/components/notify.min.js')}}"></script>
</head>
<body class="uk-height-1-1">
<div class="uk-vertical-align uk-text-center" style="height: 600px">
    <div class="uk-vertical-align-middle" style="width: 400px;">
        <img src="{{asset('/res/custom/imgs/sim_logo.png')}}">
        @yield('loginForm')
    </div>
</div>
</body>
</html>