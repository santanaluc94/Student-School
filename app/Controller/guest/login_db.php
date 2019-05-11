<?php

require_once('../../Model/Database.php');

$email = $_POST['email'];
$password = $_POST['password'];

$connectionDb = new Database();
$connection = $connectionDb->connection();

$queryLogin = "SELECT * FROM register where email = '$email' AND password = $password;";

$query = mysqli_query($connection, $queryLogin);
$connected = mysqli_num_rows($query);


if ($connected == 1) {
    header("Location: ../../view/user/index.php");
}

else {
    header("Location: javascript:history.back(-2)");
    //header("Location: ../../view/guest/login.php");
}


