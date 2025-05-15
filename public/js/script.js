
$(document).on('click', '.like-btn, .unlike-btn', function () {
    const button = $(this);
    const url = button.data('url');

    // Send AJAX request
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token
        },
        success: function (response) {
            // Update the like/unlike counts dynamically
            $('.like-count').text(response.like_count);
            $('.unlike-count').text(response.unlike_count);

            // Update button styles
            if (button.hasClass('like-btn')) {
                button.removeClass('btn-outline-success').addClass('btn-success');
                $('.unlike-btn').removeClass('btn-danger').addClass('btn-outline-danger');
            } else if (button.hasClass('unlike-btn')) {
                button.removeClass('btn-outline-danger').addClass('btn-danger');
                $('.like-btn').removeClass('btn-success').addClass('btn-outline-success');
            }
        },
        error: function (error) {
            console.error('Error:', error);
            alert('Something went wrong. Please try again.');
        },
    });
});
