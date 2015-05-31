@extends('admin/template')

@section('main')
    <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
        <div class="uk-grid" style="padding-top: 3px">
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-small-4-4">
                <div class="uk-panel uk-panel-box uk-panel-header">
                    <h3 class="uk-panel-title">添加分类</h3>

                    <form class="uk-form uk-form-stacked" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="uk-form-row">
                            <label class="uk-form-label" for="form-h-it">名称</label>

                            <div class="uk-form-controls">
                                <input type="text" name="name" id="form-h-it" class="uk-width-1-1" placeholder="标题"
                                       value="{{$inputs['name'] or ''}}">
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <label class="uk-form-label" for="form-h-ip">简介</label>

                            <div class="uk-form-controls">
                                <input type="text" name="about" id="form-h-ip" class="uk-width-1-1" placeholder="简介"
                                       value="{{$inputs['about'] or ''}}">
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <label class="uk-form-label" for="form-h-s">URL</label>

                            <div class="uk-form-controls">
                                <input type="text" name="img" id="form-h-s" class="uk-width-1-1" placeholder="URL"
                                       value="{{$inputs['img'] or ''}}">
                            </div>
                        </div>
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <p class="uk-text-danger">{{ $error }}</p>
                            @endforeach
                        @endif
                        <div style="padding-top: 20px" class="uk-align-right">
                            <button class="uk-button uk-button-primary" type="submit">提交</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
