function deleteComment(commentid) {
    var comment_id = commentid;
    $.ajax({
        type: 'DELETE',
        url: '/comment/' + comment_id,
        data: {
            _token: '{{csrf_token()}}'
        },
        success: function () {
            $('#comment-'+comment_id).hide();
        }
    });
}