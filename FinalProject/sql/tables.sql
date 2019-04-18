CREATE DATABASE finalproject;

CREATE TABLE finalproject.user (
	username VARCHAR(200) PRIMARY KEY,
	password VARCHAR(200) NOT NULL,
	date_created DATETIME NOT NULL
);

CREATE TABLE finalproject.leaderboard (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(200),
	score VARCHAR(200) NOT NULL,
	date_scored DATETIME NOT NULL,
	FOREIGN KEY (username) REFERENCES finalproject.user(username)
);