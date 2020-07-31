drop database if exists group9project;
create database group9project;
use group9project;

create table user (
	userId INT AUTO_INCREMENT PRIMARY KEY,
	firstName VARCHAR(50),	
	lastName VARCHAR(20),	
	password VARCHAR(250)
) Engine=InnoDB;

create table car (
	carId INT AUTO_INCREMENT PRIMARY KEY,
	brand VARCHAR(50),	
	model VARCHAR(20),	
	price INT
) Engine=InnoDB;

create table booking (
	bookingId INT AUTO_INCREMENT PRIMARY KEY,
	userId INT,
	carId INT,
	FOREIGN KEY (userId) REFERENCES user(userId) ON DELETE CASCADE ON UPDATE CASCADE,
  	FOREIGN KEY (carId) REFERENCES car(carId) ON DELETE CASCADE ON UPDATE CASCADE
) Engine=InnoDB;

INSERT INTO user VALUES
	(12345, "Haonan", "Cao", "12345"),
	(23456, "Donald", "Trump", "12345"),
	(34567, "Jastin", "Trudeau", "12345");

INSERT INTO car VALUES
	(11111, "Honda", "Civic", 100),
	(22222, "Benz", "E300", 200),
	(33333, "BMW", "Z4", 300);

INSERT INTO booking VALUES
	(00001, 12345, 11111),
	(00002, 23456, 22222),
	(00003, 34567, 33333);
