<?php

require_once('../../Model/database.php');

$name = $_POST['name'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$phone = $_POST['phone'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

if ($gender == 1) {
	$gender = 'Male'; 
} 

elseif ($gender == 2) {
	$gender = 'Female';
}

elseif ($gender == 3) {
	$gender = 'Other';
}

else {
	$gender = null;
}

$connectionDb = new Database();
$connection = $connectionDb->connection();

if ($password == $cpassword){
	$query = "INSERT INTO register(name, email, cpf, phone, birthday, gender, password) VALUES ('$name', '$email', $cpf, $phone, '$birthday', '$gender','$password');";
	mysqli_query($connection, $query);
	header("Location: ../../index.php");
}