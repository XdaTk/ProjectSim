@extends('admin/template')

@section('main')
    <div class="uk-margin uk-container uk-container-center uk-width-5-6" style="padding-top: 20px">
        <h1>欢迎使用</h1>
        <div class="uk-width-medium-1-1 " style="padding-top: 20px">
            <div style="min-height: 260px;" class="uk-panel uk-panel-box">
                <h3 style="padding-top: 30px">欢迎您使用<a class="#">Sim博客系统</a>管理后台：</h3>
                <h4 class="uk-width-4-5 uk-container-center"><a href="/">查看我的站点</a> </h4>
                <div class="uk-width-5-6 uk-container-center"> <a href="/home/blog/create" class="uk-button uk-button-primary uk-button-large">点击我，让我们直接开始吧&nbsp;<i class="uk-icon-angle-double-right"></i></a></div>
            </div>
        </div>
    </div>
@stop
