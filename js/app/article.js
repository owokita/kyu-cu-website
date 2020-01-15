
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
                setTimeout(() => {
                    $('#comment_message p').fadeOut();
                }, 2000);
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
        var idarray = window.location.search.split('=');
        var id = idarray[1];
        // alert(id)
        $.ajax({
            url: "user/includes/articleComment.php",
            method: "POST",
            data: { artid: id },
            success: function (data) {
                // console.log(data);

                $('#display_comment').html(data);
                $('.timeago').each(function (item) {
                    var date = $(this).text();
                    // console.log(date);
                    var timeago =  $.timeago(date)
                    $(this).text(timeago)
                    console.log($(this).attr('data-date'));
                    

                    // var timeago =  $.timeago("2020-01-14 19:36:49")
                    // var timeago1 =  $.timeago()
                    console.log(timeago);
                });

                console.log('IT IS WORKING');
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

