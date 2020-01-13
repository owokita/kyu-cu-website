
$(document).ready(function () {
    $('#comment_form').on('submit', function (e) {
        e.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url: "user/includes/articleComment.php",
            method: "POST",
            data: form_data,
            dataType: "JSON",
            success: function (data) {
                $('#comment_form')[0].reset();
                $('#comment_message').html(data.error);
                $('#comment_id').val('0');
                load_comment();
            },
            error: function (error) {
                console.log(error);
            }
        })
    })

    load_comment();
    function load_comment() {
        

        $.ajax({
            url: "user/includes/articleComment.php",
            method: "POST",
            success: function (data) {
                // console.log(data);

                $('#display_comment').html(data);
            }
        })
    }

    $(document).on('click', '.reply', function () {
       
        
        var comment_id = $(this).attr("id");
        
        $('#comment_id').val(comment_id);
        console.log($('#comment_id').val());
        $('#comment_content').focus();
    });


    
})

