<?php

$server = "localhost";
$user = "root";
$_password = "";
$database = "student_school";

$conection = mysqli_connect($server, $user, $_password, $database);

$name = $_POST['name'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$phone = $_POST['phone'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$password = $_POST['password'];

if ($gender == 1){
	$gender = 'Male'; 
} else if ($gender == 2){
	$gender = 'Female';
} else if ($gender == 3){
	$gender = 'Other';
} else {
	$gender = null;
}

$query = "INSERT register(
	name,
	email,
	cpf,
	phone,
	birthday,
	gender,
	password
) VALUES (
	'.$name.', 
	'.$email.',
	.$cpf.,
	.$phone.,
	'.$birthday.',
	'.$gender.',
	'.$password.'
);";

$registry = mysqli_query($conection, $query);
