@extends('index.template')

@section('markdown')
    <link rel="stylesheet" href="{{asset('/res/editor/css/editormd.min.css')}}">
    <link rel="stylesheet" href="{{asset('/res/editor/css/editormd.preview.min.css')}}">
    <script src="{{asset('/res/editor/lib/marked.min.js')}}"></script>
    <script src="{{asset('/res/editor/lib/prettify.min.js')}}"></script>
    <script src="{{asset('/res/editor/lib/raphael.min.js')}}"></script>
    <script src="{{asset('/res/editor/lib/underscore.min.js')}}"></script>
    <script src="{{asset('/res/editor/lib/sequence-diagram.min.js')}}"></script>
    <script src="{{asset('/res/editor/lib/flowchart.min.js')}}"></script>
    <script src="{{asset('/res/editor/lib/jquery.flowchart.min.js')}}"></script>
    <script src="{{asset('/res/editor/editormd.min.js')}}"></script>
@stop
@section('blog')
    <div class="uk-width-medium-3-4">
        <article class="uk-article">
            <h1 class="uk-article-title">
                <a href="/blog/{{$blogInfo->id}}">{{$blogInfo->title}}</a>
            </h1>

            <p class="uk-article-meta">创建人：{{$blogInfo->users->name}} &nbsp<a target="_blank"
                                                                              href="/blog/classify/{{$blogInfo->Classify->id}}">分类信息：{{$blogInfo->Classify->name}}</a>
                创建于：{{$blogInfo->created_at}}</p>

            <p>
                <a href=""><img width="900" height="300" src="{{$blogInfo->url}}" alt=""></a>
            </p>
            <hr>
            <div id="editormd-view">
                <textarea style="display: none"> {{$blogInfo->article}}</textarea>
            </div>
            <script>
                $(function () {
                    EditormdView = editormd.markdownToHTML("editormd-view", {
                        htmlDecode: "style,script,iframe",
                        emoji: true,
                        taskList: true,
                        tex: true,
                        flowChart: true,
                        sequenceDiagram: true
                    });
                });
            </script>
            <p>
                <a class="uk-button uk-button-danger" id="lover{{$blogInfo->id}}" href="#lover{{$blogInfo->id}}"
                   onclick="addLoverCount({{$blogInfo->id}})"><i
                            class="uk-icon-star"></i>&nbsp;喜欢({{$blogInfo->loves}})</a>
                <a class="uk-button uk-button-primary" href="#my-id" data-uk-modal=""><i class="uk-icon-comment"></i>&nbsp;评论</a>
            </p>
        </article>
        <hr>
        <div class="uk-width-1-1">
            <ul class="uk-comment-list" id="commentList">
            </ul>
        </div>
        <div class="uk-width-1-1" id="commentPage">
            <ul class="uk-pagination" data-uk-pagination="{}"></ul>
        </div>
    </div>
    <div id="my-id" class="uk-modal">
        <div class="uk-modal-dialog">
            <button type="button" class="uk-modal-close uk-close"></button>
            <div class="uk-modal-header">
                <h2>评论</h2>
            </div>
            <form class="uk-form" id="commitForm">
                <div class="uk-grid">
                    <div class="uk-width-1-2 uk-form-icon">
                        <i class="uk-icon-user"></i>
                        <input type="text" name="name" placeholder="请输入昵称" class="uk-width-1-1">
                    </div>
                    <div class="uk-width-1-2 uk-form-icon">
                        <i class="uk-icon-envelope"></i>
                        <input type="email" name="email" placeholder="请输入邮箱" class="uk-width-1-1">
                    </div>
                    <div class="uk-width-1-1" style="padding-top: 10px">
                        <textarea cols="" rows="3" name="comment" placeholder="请输入评论内容" class="uk-width-1-1"></textarea>
                    </div>
                </div>
                <div class="uk-modal-footer uk-text-right">
                    <button type="button" class="uk-button uk-button-danger uk-modal-close">取消</button>
                    <button type="button" onclick="addComments({{$blogInfo->id}})" class="uk-button uk-button-primary">
                        评论
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(function () {
            getFirstComments({{$blogInfo->id}});
        });
    </script>
@stop
