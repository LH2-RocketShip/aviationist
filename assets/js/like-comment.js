jQuery(document).ready(function($) {
    $(document).off('click', '.comment-like').on('click', '.comment-like', function(e) {
        e.preventDefault();
        var $this = $(this);
        if ($this.hasClass('processing')) {
            return; 
        }
        $this.addClass('processing');

        var commentID = $this.data('comment-id');

        $.ajax({
            url: nscBlogAjax.ajaxurl,
            type: 'post',
            data: {
                action: 'nsc_blog_like_comment',
                comment_id: commentID
            },
            success: function(response) {
                console.log('Response:', response);
                $this.find('.like-count').text(response + ' Likes');
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            },
            complete: function() {
                $this.removeClass('processing');
            }
        });
    });
});


