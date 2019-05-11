<?php

include_once 'view/guest/header.php';

if (isset($_GET['page'])) {
	$page = $_GET['page'];
}

else {
	$page = 'index.php';
}

if ($page == 'login') {

	include 'view/guest/login.php';

	if ($page == 'login_db') {
		include 'Controller/guest/login_db.php';
	}
}

else if ($page == 'register') {

	include 'view/guest/register.php';

	if ($page == 'register_db') {
		include 'Controller/guest/register_db.php';
	}
}

else if ($page == 'forgot-password') {
	include 'view/guest/forgot-password.php';
}

include 'view/guest/footer.php';