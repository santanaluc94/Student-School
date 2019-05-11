<?php

session_start();

if(!$_SESSION['name']) {
    header('../../index.php');
}