@extends('index.template')

@section('blog')
    <div>
        标题： <a href="">{{$blogInfo->title}}</a><br>
        创建人： {{$blogInfo->users->name}}<br>
        内容： {{$blogInfo->article}}<br>
        图片： {{$blogInfo->url}}<br>
        读取次数： {{$blogInfo->reads}}<br>
        创建时间： {{$blogInfo->created_at}}<br>
    </div>
@stop
