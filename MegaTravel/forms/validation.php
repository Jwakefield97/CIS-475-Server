<?php 

	function isValidWord($word){
		return preg_match("/^[a-zA-Z ,]+$/", $word) !== 0;
	}

	function isValidEmail($email){
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	function isValidPhoneNumber($number){
		return preg_match("/^[0-9]{1}-[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $number) !== 0;
	}

	function isValidDate($date){
		return preg_match("/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/", $date) !== 0;
	}

?>