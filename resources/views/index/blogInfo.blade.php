@extends('index.template')

@section('blog')
    <div class="uk-width-medium-3-4">
        <article class="uk-article">
            <h1 class="uk-article-title">
                <a href="/blog/{{$blogInfo->id}}">{{$blogInfo->title}}</a>
            </h1>

            <p class="uk-article-meta"><a href="#">创建人：{{$blogInfo->users->name}} &nbsp</a>创建于：{{$blogInfo->created_at}}
            </p>

            <p>
                <a href=""><img width="900" height="300" src="{{$blogInfo->url}}" alt=""></a>
            </p>
            <hr>
            {{$blogInfo->article}}
            <p>
                <a class="uk-button uk-button-danger" href="#" onclick=""><i
                            class="uk-icon-star"></i>&nbsp;点赞({{$blogInfo->reads}})</a>
                <a class="uk-button uk-button-primary" href="#my-id" data-uk-modal=""><i class="uk-icon-comment"></i>&nbsp;评论</a>
            </p>
        </article>
        <hr>
        <div class="uk-width-1-1">
            <ul class="uk-comment-list">
                <li>
                    <article class="uk-comment">
                        <header class="uk-comment-header">
                            <img class="uk-comment-avatar"
                                 src="http://www.getuikit.net/docs/images/placeholder_avatar.svg" alt="" height="50"
                                 width="50">
                            <h4 class="uk-comment-title">Author</h4>

                            <div class="uk-comment-meta">12 days ago | Profile | #</div>
                        </header>
                        <div class="uk-comment-body">
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                        </div>
                    </article>
                    <ul>
                        <li>
                            <article class="uk-comment">
                                <header class="uk-comment-header">
                                    <img class="uk-comment-avatar"
                                         src="http://www.getuikit.net/docs/images/placeholder_avatar.svg" alt=""
                                         height="50" width="50">
                                    <h4 class="uk-comment-title">Author</h4>

                                    <div class="uk-comment-meta">12 days ago | Profile | #</div>
                                </header>
                                <div class="uk-comment-body">
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                        eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                        voluptua.</p>
                                </div>
                            </article>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="uk-width-1-1">
            <ul class="uk-pagination">
                <li class="uk-disabled"><span><i class="uk-icon-angle-double-left"></i></span></li>
                <li class="uk-active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><span>...</span></li>
                <li><a href="#">20</a></li>
                <li><a href="#"><i class="uk-icon-angle-double-right"></i></a></li>
            </ul>
        </div>
    </div>
    <div id="my-id" class="uk-modal">
        <div class="uk-modal-dialog">
            <button type="button" class="uk-modal-close uk-close"></button>
            <div class="uk-modal-header">
                <h2>评论</h2>
            </div>
            <form class="uk-form">
                <div class="uk-grid">
                    <div class="uk-width-1-2 uk-form-icon">
                        <i class="uk-icon-user"></i>
                        <input type="text" placeholder="请输入昵称" class="uk-width-1-1">
                    </div>
                    <div class="uk-width-1-2 uk-form-icon">
                        <i class="uk-icon-envelope"></i>
                        <input type="email" placeholder="请输入邮箱" class="uk-width-1-1">
                    </div>
                    <div class="uk-width-1-1" style="padding-top: 10px">
                        <textarea cols="" rows="3" placeholder="请输入评论内容" class="uk-width-1-1"></textarea>
                    </div>
                </div>
                <div class="uk-modal-footer uk-text-right">
                    <button type="button" class="uk-button uk-button-danger uk-modal-close">取消</button>
                    <button type="submit" class="uk-button uk-button-primary">评论</button>
                </div>
            </form>
        </div>
    </div>
@stop
