<?php
    include "validation.php";

    $cities = array (
        "Brisbane, Australia" => array("City Tours", "Sports", "Cycling", "Museums", "Boating"),
        "Vancouver, Canada" => array("Museums", "Sailing", "Beach", "Hiking", "Boating"),
        "New York City, United States" => array("Museums", "Theatre", "Parks and Recreation", "City Tours"),
        "Berlin, Germany" => array("City Tours", "Museums", "Cycling"),
        "Cancun, Mexico" => array("Parks and Recreation", "Beaches", "Boating", "Snorkeling")
    );

    $db_url = "localhost";
    $db_username = "root";
    $db_password = "";

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
    $errorBody = "";

    if(empty($adultNum) || !is_numeric($adultNum) || $adultNum <= 0){
        $error = true;
        $errorBody .= "Error with the number of adults. \n";
    }
    if(!isset($childrenNum) || !is_numeric($childrenNum) || $childrenNum < 0){
        $error = true;
        $errorBody .= "Error with the number of children. \n";
    }
    if(empty($fromDate) || !isValidDate($fromDate)){
        $error = true;
        $errorBody .= "Error with the from date. \n";
    }
    if(empty($toDate) || !isValidDate($toDate)){
        $error = true;    
        $errorBody .= "Error with the to date. \n";
    }
    //if destination doesn't exist or activity doesn't exist for that city
    if(empty($destination) || !isValidWord($destination) || !array_key_exists($destination,$cities) || (strlen($activity) > 0 && !in_array($activity,$cities[$destination]))){
        $error = true;
        $errorBody .= "Error with the destination. \n";
    }
    if(empty($email) || !isValidEmail($email)){
        $error = true;
        $errorBody .= "Error with the email entered. \n";
    }
    if(empty($fullName) || !isValidWord($fullName)){
        $error = true;
        $errorBody .= "Error with the name entered. \n";
    }
    if(!empty($phoneNumber) && !isValidPhoneNumber($phoneNumber)){
        $error = true;
        $errorBody .= "Error with the phone number entered. \n";
    }

    if($error){
        $errorTitle = "invalid form";
        $errorBody = "an error occured while processing the reservation form. please see the reasons: \n" . $errorBody;
        $redirectLink = "/MegaTravel/reservation.php";
        include "../error.php";
    }else{

        // Create connection
        $conn = new mysqli($db_url, $db_username, $db_password);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else{ //no connection error insert info
            if(!isset($childrenNum)){
                $childrenNum = 0;
            }
            $fromDate = date("Y-m-d", strtotime($fromDate));
            $toDate = date("Y-m-d", strtotime($toDate));
            
            $stmt = $conn->prepare("INSERT INTO megatravel.reservation (client_name,client_phone_number,client_email,number_adults,number_children,destination,from_date,to_date,activity) VALUES (?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("sssiissss", $fullName, $phoneNumber, $email, $adultNum, $childrenNum, $destination, $fromDate, $toDate, $activity);
            
            if ($stmt->execute() === TRUE) { //if the reservation was save successfully
                include "../confirmation.php";
            } else {
                $errorTitle = "Error with the Database";
                $errorBody = "an error occured while processing the reservation form. please see the reasons: \n" . $stmt->error;
                $redirectLink = "/MegaTravel/reservation.php";
                include "../error.php";
            }
        } 
        $conn->close();
    }

?>