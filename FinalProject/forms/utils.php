<?php 
	
	//get connection to db
	function getConnection() {
		$db_url = "localhost";
		$db_username = "root";
		$db_password = "";

		// Create connection
        $conn = new mysqli($db_url, $db_username, $db_password);

        // Check connection
        if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			return false;
        }else{ 
			return $conn;
        }
	}

	//check if username exists
	function checkUsername($username) {
		$conn = getConnection();
		$res = $conn->query("SELECT * FROM finalproject.user WHERE username = '" . $conn->real_escape_string($username) . "'");
		$conn->close();
		return $res->num_rows === 0;
	}
	
	//insert user into user table
	function createUser($username, $password) {
		$conn = getConnection();
		$password = hashPassword($password);
		$stmt = $conn->prepare("INSERT INTO finalproject.user (username,password,date_created) VALUES (?, ?, CURRENT_TIMESTAMP)");
		$stmt->bind_param("ss", $username, $password);
		$stmtErr = $stmt->execute(); 
		$conn->close();
		return $stmtErr;
	}

	//check if the username and password are valid
	function isValidUser($username, $password) {
		$password = hashPassword($password);
		$conn = getConnection();
		$res = $conn->query("SELECT * FROM finalproject.user WHERE username = '" . $conn->real_escape_string($username) . "' AND password = '" .  $password . "'");
		$conn->close();
		return $res->num_rows === 1;
	}

	//insert into leaderboard table
	function insertLeaderBoard($username, $score) {
		$conn = getConnection();
		$stmt = $conn->prepare("INSERT INTO finalproject.leaderboard (username,score,date_scored) VALUES (?, ?, CURRENT_TIMESTAMP) ON DUPLICATE KEY UPDATE score=VALUES(score), date_scored=VALUES(date_scored)");
		$stmt->bind_param("si", $username, $score);
		$stmtErr = $stmt->execute(); 
		$conn->close();
		return $stmtErr;
	}

	function getLeaderBoard() {
		$conn = getConnection();
		$res = $conn->query("SELECT * FROM finalproject.leaderboard ORDER BY score DESC");
		$conn->close();
		return $res;
	}

	//has a given password
	function hashPassword($password) {
		$options = [
			'salt' => "somesupersecretstring56", //write your own code to generate a suitable salt
			'cost' => 12 // the default cost is 10
		];
		return password_hash($password, PASSWORD_DEFAULT, $options);
	}

	function isValidUsernameAndPassword($username,$password) {
		return !empty($username) && !empty($password);
	}


?>