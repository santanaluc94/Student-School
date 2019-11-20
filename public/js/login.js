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
                        '<div class="alert alert-danger" id="error_message_login"><span>Insira um e-mail válido!</span></div>'
                    );
                }

                errorMessage = true;
            } else {
                errorMessage = false;
                $("body").find('#error_message_login').remove();
            }
        });
    });

    $('#login_form').submit(function () {
        $.ajax({
            type: "POST",
            url: BASE_URL + "restrict/ajaxLogin",
            dataType: "json",
            data: $(this).serialize(),
            beforeSend: function () {
                clearErrors();
                $("body").find('.help-block').html(loadingImg("Carregando..."));
            },
            success: function (json) {
                if (json['status'] == 1) {
                    clearErrors();
                    $("body").find('.help-block').html(loadingImg("Logando..."));
                    window.location = BASE_URL + 'users/profile';
                } else {
                    showErrors(json['errorList']);
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
        return false;
    });
});
