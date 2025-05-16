create table Apartments(
	ID int primary key auto_increment,
	Name varchar(25) NOT NULL,
	Type varchar(10) NOT NULL,
	OwnerName varchar(25) NOT NULL,
	OwnerNumber int NOT NULL,
	Price int NOT NULL,
	Address varchar(30) NOT NULL,
	Size int NOT NULL,
	Rooms int NOT NULL,
	Bedrooms int NOT NULL,
	Bathrooms int NOT NULL,
	Balconys int NOT NULL,
	PropertyAge varchar(15) NOT NULL,
	Image1 BLOB NOT NULL,
	Image2 BLOB NOT NULL,
	Image3 BLOB NOT NULL,
	Image4 BLOB NOT NULL,
	Description varchar(100) NOT NULL,
    Uploaded_Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

create table Details(
id int primary key auto_increment,
fullname varchar(50) NOT NULL,
gender varchar(10) NOT NULL,
job varchar(30),

role varchar(30),
email varchar(40) UNIQUE,
password varchar(20),
phone int NOT NULL,
address varchar(50) NOT NULL,
apartment_type varchar(40),
budget int,
comments varchar(500),
Submission_Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP


);

create table Feedback(
	ID int primary key auto_increment,
	name varchar(20),
	email varchar(40),
	message varchar(100)
);

create table paymentdetails(
	ID int primary key auto_increment,
	Name varchar(20),
	Cardnumber varchar(20),
	Expirydate varchar(10),
	Cvv varchar(20), 
	Amount int
);

CREATE TABLE contact (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Message TEXT NOT NULL,
    Submission_Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO Details (fullname, gender, job, role, email, password, phone, address, apartment_type, budget, comments) 
VALUES ('Ramana', 'Male', 'Software Engineer', 'admin', 'ramana@gmail.com', '1234567890', '0771122334', 'Stanly Road Jaffna', 'loft', 1500000, 'I am assigned as the new Admin');
