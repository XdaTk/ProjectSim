function addLoverCount($id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        type: 'post',
        url: '/blog/love/' + $id,
        success: function (data) {
            if(data!=null&&data!=''){
                $('#lover' + $id).html("<i class=\"uk-icon-star\"></i>&nbsp;喜欢(" + data + ")");
            }else{
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
        data:$('#commitForm').serialize(),
        success: function (data) {
            alert(data);
        },
        error: function (data) {
            UIkit.notify('网络有问题');
        }
    });
}