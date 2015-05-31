@extends('admin/template')

@section('main')
    <div class="uk-margin uk-container uk-container-center uk-width-5-6" style="padding-top: 20px">
        <h1>欢迎使用</h1>
        <div class="uk-width-medium-1-1 " style="padding-top: 20px">
            <div style="min-height: 260px;" class="uk-panel uk-panel-box">
                <h3 style="padding-top: 30px">欢迎您使用<a class="#">Sim博客系统</a>管理后台：</h3>
                <h4 class="uk-width-4-5 uk-container-center">1. <a href="#" class="uk-text-danger">强烈建议更改你的默认密码</a> </h4>
                <h4 class="uk-width-4-5 uk-container-center">2. <a href="writeblog.html"> 撰写一篇日志</a> </h4>
                <h4 class="uk-width-4-5 uk-container-center">3. <a href="/">查看我的站点</a> </h4>
                <div class="uk-width-5-6 uk-container-center"> <button class="uk-button uk-button-primary uk-button-large" type="reset">点击我，让我们直接开始吧&nbsp;<i class="uk-icon-angle-double-right"></i></button></div>
            </div>
        </div>
    </div>
@stop
