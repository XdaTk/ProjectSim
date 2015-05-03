function addLoverCount($id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        type: 'post',
        url: '/blog/love/' + $id,
        success: function (data) {
            if (data != null && data != '') {
                $('#lover' + $id).html("<i class=\"uk-icon-star\"></i>&nbsp;喜欢(" + data + ")");
            } else {
                UIkit.notify('亲，你已经提交过了');
            }
        }
    });
}

function addComments($id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        type: 'post',
        url: '/blog/comment/add/' + $id,
        dataType: 'json',
        data: $('#commitForm').serialize(),
        success: function (data) {
            if (data == 'success') {
                UIkit.notify('评论成功');
                var modal = UIkit.modal("#my-id");
                modal.hide();
            } else if (data == "fail") {
                UIkit.notify('评论失败');
            } else {
                UIkit.notify(data.comment[0]);
            }
        },
        error: function (data) {
            UIkit.notify('网络有问题');
        }
    });
}
function getFirstComments($id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        type: 'post',
        url: '/blog/comment/show/' + $id,
        success: function (data) {
            wieteComments($id, data);
        }
    });
}
function getPageComments($id, $page) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        type: 'post',
        url: '/blog/comment/show/' + $id + '?page=' + $page,
        success: function (data) {
            wieteComments($id, data);
        }
    });
}

function wieteComments($id,$data) {
    var $message = '';
    $.each($data.data, function (n) {
        $message += '<li>' +
        '<article class="uk-comment">' +
        '<header class="uk-comment-header">' +
        '<img class="uk-comment-avatar"src="http://www.getuikit.net/docs/images/placeholder_avatar.svg" alt="" height="50" width="50">' +
        '<h4 class="uk-comment-title">' + $data.data[n].name + '</h4>' +
        '<div class="uk-comment-meta">' + $data.data[n].created_at + '</div>' +
        '</header>' +
        '<div class="uk-comment-body">' +
        '<p>' + $data.data[n].comment + '</p>' +
        ' </div>' +
        ' </article>' +
        '</li>';
    });
    $("#commentList").html($message);
    $('#commentPage').html(
        '<ul class="uk-pagination"  data-uk-pagination="{items:' + $data.total + ', itemsOnPage:' + $data.per_page + ',currentPage:' + $data.current_page + '}"></ul>'
    );
    UIkit.pagination('[data-uk-pagination]', {
        'items': $data.total,
        'itemsOnPage': $data.per_page,
        'currentPage': $data.current_page
    });
    $('[data-uk-pagination]').on('select.uk.pagination', function (e, pageIndex) {

        getPageComments($id, pageIndex + 1);
    });
}