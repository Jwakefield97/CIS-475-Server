<?php 
    session_start();
    $admin_username = "admin";
    $admin_password = "password";

    $username = $_POST["username"];
    $password = $_POST["password"];

    //username and password matches
    if(strcmp($username,$admin_username) === 0 && strcmp($password,$admin_password) === 0){
        $_SESSION["logged_in"] = true;
    }else{
        session_destroy();
    }
    header("Location: ../admin.php");
    exit();
?>