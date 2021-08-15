<?php


$db = new DBConnect();

$db->authLogin(); // if user has logged in already then forward it to home.php

$alert = NULL;
if (isset($_POST['loginBtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $flag1 = $db->adminlogin($username, $password);
    if ($flag1) {
        header("Location: ./employee.php");
    } else {

        echo '<script>alert("Username or password was incorrect!")</script>';
    }
}
if (isset($_POST['loginBtn1'])) {
    $username = $_POST['uname'];
    $password = $_POST['psw'];

    $flag = $db->employeelogin($username, $password);
    if ($flag) {
        header("Location: ./register.php");
    } else {

        echo '<script>alert("Username or password was incorrect!")</script>';
    }
}
$title = "Login";
