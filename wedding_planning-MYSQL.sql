-- MYSQL SERVER
CREATE TABLE `Admin`(
	`adminID` INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	`a_fname` varchar(30) NOT NULL,
	`a_lname` varchar(30) NOT NULL,
	`a_username` varchar(30) NOT NULL,
	`a_imgLoc` varchar(30),
	`role` varchar(10) NOT NULL,
	`a_password` varchar(20) NOT NULL,
	`a_email` varchar(25) NOT NULL
);

CREATE TABLE `Vendor`(
    `vendorID` INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	`v_company` varchar(30) ,
	`v_username` varchar(30) NOT NULL,
	`v_imgLoc` varchar(30),
	`v_fname` varchar(30) NOT NULL,
	`v_lname` varchar(30) NOT NULL,
	`role` varchar(30) NOT NULL,
	`v_password` varchar(20) NOT NULL,
	`v_mobile` varchar (10),
	`v_address` varchar(30)
);

CREATE TABLE `Customer`(
    `customerID` INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	`c_fname` varchar(30) NOT NULL,
	`c_lname` varchar(30) NOT NULL,
   	`c_dob` date,
	`c_username` varchar(30) NOT NULL,
	`c_imgLoc` varchar(30),
	`role` varchar(10) NOT NULL,
    `c_password` varchar(20) NOT NULL,
	`c_email` varchar(30) NOT NULL,
	`c_partner` varchar(30)
);

