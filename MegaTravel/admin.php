<?php 
    session_start();
    if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true){
        include "partials/admin_page.php";
    }else{
        include "partials/admin_login.php";
    }

?>