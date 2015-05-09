@extends('admin/template')

@section('main')
    <div class="uk-grid" style="padding-top: 15px" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-panel uk-panel-box uk-panel-header">
                <h3 class="uk-panel-title"><i class="uk-icon-list-alt"></i>控制台</h3>

                <div class="uk-grid tm-grid-truncate" data-uk-grid-margin="">
                    <div class="uk-width-small-1-2">
                        <div class="uk-panel uk-panel-box uk-panel-box-primary">
                            <a class=""><i class="uk-icon-bold uk-icon-large"></i></a>
                            <h4><a>显示文章篇数（如何居中？）</a></h4>
                        </div>
                    </div>
                    <div class="uk-width-small-1-2">
                        <div class="uk-panel uk-panel-box uk-panel-box-primary">
                            <a class=""><i class="uk-icon-envelope-o uk-icon-large"></i></a>
                            <h4><a>显示信息条数（如何居中？）</a></h4>
                        </div>
                    </div>
                    <div class="uk-width-small-1-2">
                        <div class="uk-panel uk-panel-box uk-panel-box-primary">
                            <a class=""><i class="uk-icon-thumbs-o-up uk-icon-large"></i></a>
                            <h4><a>显示点赞条数（如何居中？）</a></h4>
                        </div>
                    </div>
                    <div class="uk-width-small-1-2">
                        <div class="uk-panel uk-panel-box uk-panel-box-primary">
                            <a><i class="uk-icon-tags uk-icon-large"></i></a>
                            <h4><a>显示日志条数（如何居中？）</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
