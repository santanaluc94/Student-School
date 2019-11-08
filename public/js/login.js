$(function () {
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
