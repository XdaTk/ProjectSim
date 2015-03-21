<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/res/editor/css/editormd.min.css')}}">
    <script src="{{asset('/res/jquery.min.js')}}"></script>
    <script src="{{asset('/res/editor/editormd.min.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
</head>
<body>
<div id="test-editormd">

</div>
<script>
    var testEditor;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    editormd.emoji = {
        path: "http://www.emoji-cheat-sheet.com/graphics/emojis/",
        ext: ".png"
    };
    $(function () {
        testEditor = editormd("test-editormd", {
            width: "90%",
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
</body>
</html>