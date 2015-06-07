@extends('admin/template')

@section('main')
    <script src="{{asset('/res/editor/editormd.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('/res/editor/css/editormd.min.css')}}">
    <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
        <div class="uk-grid" style="padding-top: 3px">
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-small-4-4">
                <div class="uk-panel uk-panel-box uk-panel-header">
                    <h3 class="uk-panel-title">撰写文章</h3>

                    <form class="uk-form uk-form-stacked" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="uk-form-row">
                            <label class="uk-form-label" for="form-h-it">标题</label>

                            <div class="uk-form-controls">
                                <input type="text" name="title" id="form-h-it" class="uk-width-1-1" placeholder="标题"
                                       value="{{$inputs['title'] or ''}}">
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <label class="uk-form-label" for="form-h-ip">简介</label>

                            <div class="uk-form-controls">
                                <input type="text" name="brief" id="form-h-ip" class="uk-width-1-1" placeholder="简介"
                                       value="{{$inputs['brief'] or ''}}">
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <label class="uk-form-label" for="form-h-s">类型</label>

                            <div class="uk-form-controls">
                                <select id="form-h-s" name="class_id" class="uk-width-1-1">
                                    @foreach($classifys as $classfiy)
                                        <option value="{{$classfiy->id}}">{{$classfiy->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="uk-form-label" for="form-h-s">图片</label>

                            <div class="uk-form-controls">
                                <input id="form-h-s" type="text" name="img" class="uk-width-1-1"
                                       value="{{$inputs['img'] or ''}}">
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <label class="uk-form-label" for="form-h-t">内容</label>

                            <div id="article" class="uk-form-controls">
                                 <textarea style="display:none;">
                                {{$inputs['article-markdown-doc'] or ''}}
                                     </textarea>
                            </div>
                            <script>
                                var testEditor;
                                editormd.emoji = {
                                    path: "http://www.emoji-cheat-sheet.com/graphics/emojis/",
                                    ext: ".png"
                                };
                                $(function () {
                                    testEditor = editormd("article", {
                                        width: "100%",
                                        height: 640,
                                        codeFold: true,
                                        saveHTMLToTextarea: false,    // 保存HTML到Textarea
                                        searchReplace: true,
                                        htmlDecode: true,            // 开启HTML标签解析，为了安全性，默认不开启
                                        emoji: true,
                                        taskList: true,
                                        tex: true,                   // 开启科学公式TeX语言支持，默认关闭
                                        flowChart: true,             // 开启流程图支持，默认关闭
                                        sequenceDiagram: true,       // 开启时序/序列图支持，默认关闭,
                                        imageUpload: true,
                                        imageFormats: ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                                        imageUploadURL: "/edit/editorFileUpload",
                                        path: '/res/editor/lib/'
                                    });
                                });
                            </script>
                        </div>
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <p class="uk-text-danger">{{ $error }}</p>
                            @endforeach
                        @endif
                        <div style="padding-top: 20px" class="uk-align-right">
                            <button class="uk-button uk-button-primary" type="submit">发表文章</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
