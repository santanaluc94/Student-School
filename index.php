<?php

include 'header.php';

if(isset($_GET['page'])) {
	$page = $_GET['page'];
}else {
	$page = 'index.php';
}

if ($page == 'login') {
	include 'view/login.php';
} else if ($page == 'register') {
	include 'view/register.php';
	if ($page == 'register_db') {
		include 'view/register_db.php';;
	}
} else if ($page == 'forgot-password') {
	include 'view/forgot-password.php';
}

include 'footer.php';