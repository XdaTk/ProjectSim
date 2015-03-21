<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="{{URL('auth/login')}}" method="post">
    邮箱： <input type="email" name="email" value="{{$email or ''}}"><br>
    密码： <input type="password" name="password"><br>
    记住我 <input type="checkbox" name="remember" value="{{$remember or ''}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" value="登陆">
    @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
    @endif
</form>
</body>
</html>