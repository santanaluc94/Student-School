const BASE_URL = "http://localhost/student-school/"

var errorList = {
	"#btn_login": "Usuário ou senha incorreta"
}

function clearErrors() {
	$(".help-block").removeClass('alert alert-danger');
	$(".help-block").html("");
}

function showErrors(errorList) {
	clearErrors();
	$.each(errorList, function (id, message) {
		$("body").find(".help-block").addClass("alert alert-danger").html(message)
	});
}

function loadingImg(message = "") {
	return $('.help-block').append("<span class='spinner-border'></span>&nbsp;&nbsp;<span class='loading-msg'>" + message + "</span>");
}
