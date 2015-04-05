@extends('index.template')

@section('blog')
    <div>
        @foreach($blogs as $blog)
            <hr>
            标题： <a href="/blog/{{$blog->id}}">{{$blog->title}}</a><br>
            创建人： {{$blog->users->name}}<br>
            内容： {{$blog->article}}<br>
            图片： {{$blog->url}}<br>
            读取次数： {{$blog->reads}}<br>
            创建时间： {{$blog->created_at}}<br>
            <hr>
        @endforeach
        <a href="{{$pages['prev_page_url']}}">上一页</a>
        总条数:{{$pages['total']}}
        当前页数:{{$pages['current_page']}}
        最后一页：{{$pages['last_page']}}
        下一页：@if($pages['current_page']>1&&$pages['current_page']!=$pages['last_page']){{$pages['current_page']+1}} @endif
        当前页内容数量：{{$pages['per_page']}}
        <a href="{{$pages['next_page_url']}}">下一页</a>
    </div>
@stop
