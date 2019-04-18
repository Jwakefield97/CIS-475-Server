<?php 
	include "utils.php";
	session_start();

	if(checkUsername("jake1")) {
		echo hashPassword("jake");
	}
	session_destroy();
?>