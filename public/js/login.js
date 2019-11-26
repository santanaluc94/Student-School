$(function () {
    $(document).ready(function() {
        let errorMessage = false;

        $('#email').blur(function() {
            let email = $("#email").val();
            let emailFilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            let illegalChars = /[\(\)\<\>\,\;\:\\\/\"\[\]]/

            if (!(emailFilter.test(email)) || (email.match(illegalChars))) {
                if (!errorMessage){
                    $("body").find(".card-body").append(
                        '<div class="alert alert-danger" id="error_message_login"><span>Please insert a valid e-mail!</span></div>'
                    );
                }

                errorMessage = true;
            } else {
                errorMessage = false;
                $("body").find('#error_message_login').remove();
            }
        });
    });
});
