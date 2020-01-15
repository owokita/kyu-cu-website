
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
                    console.log(date);
                    
                    // console.log(date);
                    var timeago =  $.timeago(date)
                    $(this).text(timeago)
                    
                });

                
            }
        })
    };

    function count_comments(){

        //count the comments on a specific article
        var idarray = window.location.search.split('=');
        var id = idarray[1];
        $.ajax({
            url: "user/includes/articleComment.php",
            method: "POST",
            data: { commentcount: id },
            success: function (data) {
                $('#coment_count').html(data);
                $('.comment').click(function (e) {
                    $('#comment_content').focus();
                });
                count_comments()              
                
            }
        })
    }

    count_comments()
    $(document).on('click', '.reply', function () {
        var comment_id = $(this).attr("id");
        $('#comment_id').val(comment_id);
        console.log($('#comment_id').val());
        $('#comment_content').focus();
    });

    $('.timeago1').each(function (item) {
        var date = $(this).text();
        console.log(date);
        
        // console.log(date);
        var timeago =  $.timeago(date)
        $(this).text(timeago)
        
    });
    $('.readmore').readmore();

    



})


function react (item,id) {
    $(item).toggleClass('text-primary');
    console.log(id);
    
    var likedata = {
        react: 1,
        articleid: id,
        post_likes:'postlikes'
    }
    
    $.ajax({
        url: "user/includes/article.inc.php",
        method: "POST",
        data: likedata,
        dataType: "html",
        success: function (data) {
            console.log(data);
        },
        error: function (error) {
            console.log(error);
        }
    })

    
}

