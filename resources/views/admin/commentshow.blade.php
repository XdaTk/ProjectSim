@extends('admin/template')

@section('main')
    <div class="uk-margin uk-container uk-container-center uk-width-5-6" style="padding-top: 20px">
        <h3>评论管理</h3>

        <div class="uk-width-medium-1-1" style="padding-top: 20px">
            <div style="min-height: 260px;" class="uk-panel uk-panel-box">
                <div class="uk-overflow-container">
                    <table class=" uk-table uk-table-hover">
                        <thead>
                        <tr>
                            <th class="uk-text-center">id</th>
                            <th class="uk-text-center">名称</th>
                            <th class="uk-text-center">email</th>
                            <th class="uk-text-center">回复内容</th>
                            <th class="uk-text-center">时间</th>
                            <th class="uk-text-center">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                        <tr>
                                <td class="uk-text-center">{{$comment->id}}</td>
                                <td class="uk-text-center">{{$comment->name}}</td>
                                <td class="uk-text-center">{{$comment->email}}</td>
                                <td class="uk-text-center">{{$comment->comment}}</td>
                                <td class="uk-text-center">{{$comment->created_at}}</td>
                                <td class="uk-text-center">
                                    <a href="/home/comment/del/{{$comment->id}}" class="uk-button uk-button-danger">删除</a>
                                </td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="uk-form-controls" style="padding-top: 20px">
            <div class="uk-align-right">
                <ul class="uk-pagination uk-pagination-right"
                    data-uk-pagination="{items:{{$pages['total']}}, itemsOnPage:{{$pages['per_page']}},currentPage:{{$pages['current_page']}}}"></ul>
                <script>
                    $('[data-uk-pagination]').on('select.uk.pagination', function (e, pageIndex) {
                        location.href = "/home/comment/?page=" + (pageIndex + 1);
                    });
                </script>
            </div>
        </div>
    </div>
@stop
