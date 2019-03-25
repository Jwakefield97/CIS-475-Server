CREATE DATABASE megatravel;

CREATE TABLE megatravel.reservation (
	id INT AUTO_INCREMENT PRIMARY KEY,
	client_name VARCHAR(200) NOT NULL,
	client_phone_number VARCHAR(14),
	client_email VARCHAR(256) NOT NULL,
	number_adults INT NOT NULL,
	number_children INT NOT NULL,
	destination VARCHAR(200) NOT NULL,
	from_date DATE NOT NULL,
	to_date DATE NOT NULL,
	activity VARCHAR(200) NOT NULL
);