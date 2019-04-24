<?php 
	include "utils.php";
	session_start();
	$username = $_POST["username"];
	$password = $_POST["username"];
	if (isValidUsernameAndPassword($username, $password)) {
		if (checkUsername($username)) {
			createUser($username, $password);
			$_SESSION["user"] = $username;
			header("Location: ../game.php");
		} else {
			unset($_SESSION["user"]);
			session_destroy();
			header("Location: ../login_register.php?registerFail=1");
			exit();
		}
	} else {
		unset($_SESSION["user"]);
		session_destroy();
		header("Location: ../login_register.php?registerFail=1");
		exit();
	}

?>