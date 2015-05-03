@extends('auth.template')
@section('loginForm')
    <form class="uk-panel uk-panel-box uk-form" action="{{URL('auth/login')}}" method="post">
        <div class="uk-form-row">
            <input class="uk-width-1-1 uk-form-large" id="email" name="email" type="text" placeholder="用户名">
        </div>
        <div class="uk-form-row uk-form-password" style="display: inline">
            <input class="uk-width-1-1 uk-form-large" id="password" name="password" type="password"
                   placeholder="密码">
            <a href="" class="uk-form-password-toggle" data-uk-form-password="{lblShow:'查看',lblHide:'隐藏'}">查看</a>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="uk-form-row">
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <p class="uk-text-danger">{{ $error }}</p>
                @endforeach
            @endif
        </div>
        <div class="uk-form-row">
            <button type="submit" class="uk-width-1-1 uk-button uk-button-primary uk-button-large" id="login_button">登陆</button>
        </div>
        <div class="uk-form-row uk-text-small">
            <label class="uk-float-left"><input type="checkbox" name="remember" value="{{$remember or ''}}">记住我</label>
            <a class="uk-float-right uk-link uk-link-muted" href="#">忘记密码?</a>
        </div>
    </form>
@stop