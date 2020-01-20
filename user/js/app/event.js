$(document).ready(function () {
    $('#eventpost').on('submit', function (e) {
        e.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url: "includes/event.inc.php",
            method: "POST",
            data: form_data,
            dataType: "html",
            success: function (data) {
                console.log(data);
                
                // $('#eventpost')[0].reset();
               
                // setTimeout(() => {
                //     $('#comment_message p').fadeOut();
                // }, 2000);
                // $('#comment_id').val('0');
                 
            },
            error: function (error) {
                console.log(error);
            }
        })
    })

})
