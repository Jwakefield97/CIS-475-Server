<?php 

function isValidWord($word){
	return preg_match("/^[A-Z][a-zA-Z -]+$/", $word) === 0;
}

function isValidEmail($email){
	return preg_match("/^[a-zA-Z]w+(.w+)*@w+(.[0-9a-zA-Z]+)*.[a-zA-Z]{2,4}$/", $email) === 0;
}

function isValidPhoneNumber($number){
	return preg_match("/^d{1}-d{3}-d{3}-d{4}$/", $number) === 0;
}

function isValidDate($date){
	return preg_match("/^[0-9]{1,2}-[0-9]{1,2}-[0-9]{4}$/", $date) === 0;
}

?>