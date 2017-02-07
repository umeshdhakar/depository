$(function () {
    $('#btnContactUs').click(function () {
        var data = {
            name: $("#name").val(),
            email: $("#email").val(),
            subject: $("#subject").val(),
            message: $("#message").val()
        }
        if (!data.name || !data.email || !data.message) {
            $('#btnContactUs').text("Incomplete Details!, Resend");
        }
        else {
            $.ajax({
                type: "POST",
                url: "email.php",
                data: data,
                success: function (data) {
                    if (data) {
                        $('#btnContactUs').attr('disabled', 'disabled').text('Sent');
                    } else {
                        $('#btnContactUs').text("Failed, Resend it");
                    }
                }
            });
        }
    });
});