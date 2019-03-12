<?php
$cities = array (
    "Brisbane, Australia" => array("City Tours", "Sports", "Cycling", "Museums", "Boating"),
    "Vancouver, Canada" => array("Museums", "Sailing", "Beach", "Hiking", "Boating"),
    "New York City, United States" => array("Museums", "Theatre", "Parks and Recreation", "City Tours"),
    "Berlin, Germany" => array("City Tours", "Museums", "Cycling"),
    "Cancun, Mexico" => array("Parks and Recreation", "Beaches", "Boating", "Snorkeling")
);

$adultNum = $_POST["adultNum"];
$childrenNum = $_POST["childrenNum"];
$fromDate = $_POST["fromDate"];
$toDate = $_POST["toDate"];
$destination = $_POST["destination"];
$activity = $_POST["activity"];
$email = $_POST["email"];
$phoneNumber = $_POST["phoneNumber"];
$fullName = $_POST["fullName"];

$error = false;

if(empty($adultNum) || $adultNum <= 0){
    $error = true;
}
if(empty($childrenNum) || $childrenNum < 0){
    $error = true;
}
if(empty($fromDate)){
    $error = true;
}
if(empty($toDate)){
    $error = true;
}
//if destination doesn't exist or activity doesn't exist for that city
if(empty($destination) || !array_key_exists($destination,$cities) || (strlen($activity) > 0 && !in_array($activity,$cities[$destination]))){
    $error = true;
}
if(empty($email)){
    $error = true;
}
if(empty($fullName)){
    $error = true;
}

if($error){
    $errorTitle = "invalid form";
    $errorBody = "an error occured while processing the reservation form. One of the fields may not have been filled out correctly. please try again";
    $redirectLink = "/MegaTravel/reservation.php";
    include "../error.php";
}else{
    include "../confirmation.php";
}

?>