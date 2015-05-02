function addLoverCount($id) {
    $.ajax({
        type: 'post',
        url: '/blog/love/'+$id,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
            console.log(data.status);
        }
    });
}