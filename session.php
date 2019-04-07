<?php
//Start session
session_start();
//Check whether the session variable $_SESSION['user_name'] is present or not

if (!isset($_SESSION['user_name']) || (trim($_SESSION['user_name']) == '')) {
    header("location:login.php");
    exit();
}

if (!isset($_SESSION['role']) || (trim($_SESSION['role']) == '')) {
    header("location:login.php");
    exit();
}

?>