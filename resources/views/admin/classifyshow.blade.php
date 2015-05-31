@extends('admin/template')

@section('main')
    <div class="uk-margin uk-container uk-container-center uk-width-5-6" style="padding-top: 20px">
        <h3>分类管理</h3>

        <div class="uk-width-medium-1-1" style="padding-top: 20px">
            <div style="min-height: 260px;" class="uk-panel uk-panel-box">
                <div class="uk-overflow-container">
                    <table class=" uk-table uk-table-hover">
                        <thead>
                        <tr>
                            <th class="uk-text-center">id</th>
                            <th class="uk-text-center">名称</th>
                            <th class="uk-text-center">名称</th>
                            <th class="uk-text-center">关于</th>
                            <th class="uk-text-center">时间</th>
                            <th class="uk-text-center">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($classifys as $classify)
                        <tr>
                                <td class="uk-text-center">{{$classify->id}}</td>
                                <td class="uk-text-center">{{$classify->name}}</td>
                                <td class="uk-text-center">{{$classify->users->name}}</td>
                                <td class="uk-text-center">{{$classify->about}}</td>
                                <td class="uk-text-center">{{$classify->created_at}}</td>
                                <td class="uk-text-center">
                                    <a href="/home/classify/del/{{$classify->id}}" class="uk-button uk-button-danger">删除</a>
                                    <a href="/home/classify/update/{{$classify->id}}" class="uk-button uk-button-danger">修改</a>
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
                        location.href = "/home/classify/?page=" + (pageIndex + 1);
                    });
                </script>
            </div>
        </div>
    </div>
@stop
