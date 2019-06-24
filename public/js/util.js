const SABE_URL = "http://localhost/student-school/"

var errorList = {"#btn_login": "Usuário ou senha incorreta"}

function clearErrors() {
    $(".help-block").removeClass("alert alert-danger");
    $(".help-block").html("");
}

function showErrors(errorList) {
    clearErrors();
    $.each(errorList, function (id, message) {
        $(id).siblings(".help-block").addClass("alert alert-danger").html(message)
    });
}

function loadingImg(message = "") {
    return "<i class='spinner-border'></i>" + message;
}