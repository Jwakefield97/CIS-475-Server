<?php 
	include 'utils.php';
	session_start();
	$score = $_POST["score"];

	if(!isset($_SESSION["user"])) {
		session_destroy();
		header("Location: login_register.php");
		exit();
	} else {
		$e = insertLeaderBoard($_SESSION["user"],$score);
	}

?>