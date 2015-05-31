@extends('admin/template')

@section('main')
    <div class="uk-margin uk-container uk-container-center uk-width-5-6" style="padding-top: 20px">
        <h3>管理文章</h3>

        <div class="uk-width-medium-1-1" style="padding-top: 20px">
            <div style="min-height: 260px;" class="uk-panel uk-panel-box">
                <div class="uk-overflow-container">
                    <table class=" uk-table uk-table-hover">
                        <thead>
                        <tr>
                            <th class="uk-text-center">标题</th>
                            <th class="uk-text-center">作者</th>
                            <th class="uk-text-center">分类</th>
                            <th class="uk-text-center">阅读数量</th>
                            <th class="uk-text-center">喜欢数量</th>
                            <th class="uk-text-center">时间</th>
                            <th class="uk-text-center">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blogs as $blog)
                        <tr>
                                <td class="uk-text-center"><a><a href="/blog/{{$blog->id}}">{{$blog->title}}</a></a></td>
                                <td class="uk-text-center">{{$blog->users->name}}</td>
                                <td class="uk-text-center">{{$blog->Classify->name}}</td>
                                <td class="uk-text-center">{{$blog->reads}}</td>
                                <td class="uk-text-center">{{$blog->loves}}</td>
                                <td class="uk-text-center">{{$blog->created_at}}</td>
                                <td class="uk-text-center">
                                    <a href="/home/blog/del/{{$blog->id}}" class="uk-button uk-button-danger">删除</a>
                                    <a href="/home/blog/update/{{$blog->id}}" class="uk-button uk-button-primary">修改</a></td>
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
                        location.href = "/home/blog/?page=" + (pageIndex + 1);
                    });
                </script>
            </div>
        </div>
    </div>
@stop
