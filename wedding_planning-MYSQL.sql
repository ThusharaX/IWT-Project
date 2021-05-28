CREATE TABLE Admin(
	adminID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	a_fname varchar(30) NOT NULL,
	a_lname varchar(30) NOT NULL,
	a_username varchar(30) NOT NULL,
	a_imgLoc varchar(300),
	role varchar(10) NOT NULL,
	a_password varchar(256) NOT NULL,
	a_email varchar(25) NOT NULL
);

INSERT INTO Admin
	(a_fname, a_lname, a_username, a_imgLoc, role, a_password, a_email)
VALUES
	('Thushara', 'Thiwanka', 'thusharax', 'adminImage1.jpg', 'admin', SHA2('pass', 256), 'thushara@sliit.lk'),
	('Gaween', 'Kanishka', 'gaween', 'adminImage2.jpg', 'admin', SHA2('pass', 256), 'gaween@sliit.lk'),
	('Chamath', 'Jayasekara', 'chamath', 'adminImage3.jpg', 'admin', SHA2('pass', 256), 'chamath@sliit.lk'),
	('Nikethani', 'Gangoda', 'nikethani', 'adminImage4.jpg', 'admin', SHA2('pass', 256), 'nikethani@sliit.lk'),
	('Pamodya', 'Daundasekara', 'pamodya', 'adminImage5.jpg', 'admin', SHA2('pass', 256), 'pamodya@sliit.lk');


CREATE TABLE Vendor(
    vendorID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,   
	v_company varchar(30) ,
	v_username varchar(30) NOT NULL,
	v_imgLoc varchar(300),
	v_fname varchar(30) NOT NULL,
	v_lname varchar(30) NOT NULL,
	role varchar(10) NOT NULL,
	v_password varchar(256) NOT NULL,
	v_mobile INT,
	v_address varchar(30),
	v_email varchar(30) NOT NULL	  
);

INSERT INTO Vendor
	(v_company, v_username, v_imgLoc, v_fname, v_lname, role, v_password, v_mobile, v_address, v_email)
VALUES
	('LuciferX', 'thusharax', 'vedorImage1.jpg', 'Thushara', 'Thiwanka', 'vendor', SHA2('pass', 256), 712345678, 'G/07, Galigamuwa, Kegalle', 'thushara@sliit.lk'),
	('Gawee', 'gaween', 'vedorImage2.jpg', 'Gaween', 'Kanishka', 'vendor', SHA2('pass', 256), 756427856, 'K/09, Naiwala, Minuwangoda', 'gaween@sliit.lk'),
	('Chama', 'chamath', 'vedorImage3.jpg', 'Chamath', 'Jayasekara', 'vendor', SHA2('pass', 256), 732145698, 'L/02, Aldeniya, Kadawatha', 'chamath@sliit.lk'),
	('Niki', 'nikethani', 'vedorImage4.jpg', 'Nikethani', 'Gangoda', 'vendor', SHA2('pass', 256), 787956423, 'E/05, Gabgoda, Pilimathalawa', 'nikethani@sliit.lk'),
	('Pamo', 'pamodya', 'vedorImage5.jpg', 'Pamodya', 'Daundasekara', 'vendor', SHA2('pass', 256), 798756321, 'T/08, Katugasthota, Kandy', 'pamodya@sliit.lk');


CREATE TABLE Customer(
    customerID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	c_fname varchar(30) NOT NULL,
	c_lname varchar(30) NOT NULL,
   	c_dob date,
	c_username varchar(30) NOT NULL,
	c_imgLoc varchar(300),
	role varchar(10) NOT NULL,
    c_password varchar(256) NOT NULL,
	c_email varchar(30) NOT NULL,
	c_partner varchar(30),
	weddingDate date
);

INSERT INTO Customer
	(c_fname, c_lname, c_dob, c_username, c_imgLoc, role, c_password, c_email, c_partner, weddingDate)
VALUES
	('Thushara', 'Thiwanka', '1998-09-01', 'thusharax', 'customerImage1.jpg', 'customer', SHA2('pass', 256), 'thushara@sliit.lk', 'Dilki', '2022-08-04'),
	('Gaween', 'Kanishka', '1998-04-01', 'gaween', 'customerImage2.jpg', 'customer', SHA2('pass', 256), 'gaween@sliit.lk', 'Gayani', '2021-10-05'),
	('Chamath', 'Jayasekara', '1999-01-01', 'chamath', 'customerImage3.jpg', 'customer', SHA2('pass', 256), 'chamath@sliit.lk', 'Chamali', '2023-07-02'),
	('Nikethani', 'Gangoda', '1997-08-01', 'nikethani', 'customerImage4.jpg', 'customer', SHA2('pass', 256), 'nikethani@sliit.lk', 'Nikethana', '2021-08-05'),
	('Pamodya', 'Daundasekara', '1999-12-01', 'pamodya', 'customerImage5.jpg', 'customer', SHA2('pass', 256), 'pamodya@sliit.lk', 'Pamoda', '2021-09-01');


CREATE TABLE Category(
    catID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    cat_imgLoc varchar(300) NOT NULL,
	catName varchar(30) NOT NULL,
	catDescription varchar(300),
	price real
);


INSERT INTO Category
	(catName, cat_imgLoc, catDescription, price)
VALUES
	('Uncategorized', 'uncategorized.gif', 'This is a category for uncategorized ads', 0.00),
	('Catering ', 'catering.gif', 'The best Catering services in the country', 500.00),
	('DJ Music', 'djMusic.gif', 'After the ceremony, there is often a celebratory dance', 1500.00),
	('Wedding Dress', 'weddingDress.gif', 'Our tailors can create amazing modern-day gowns from vintage wedding gowns', 800.00),
	('Cosmetics', 'cosmetics.gif', 'Which provides some of the most competitive rates in the industry.', 1100.00),
	('Wedding Vehivle', 'weddingVehivle.gif', 'This is a category for Wedding Vehivle ads', 1300.00),
	('Flowers', 'flower.gif', 'This is a category for Flowers ads', 1400.00),
	('Videography', 'videography.gif', 'This is a category for Videography ads', 1200.00),
	('Wedding Cards', 'weddingCards.gif', 'This is a category for Wedding Cards ads', 1100.00),
	('Wedding Halls', 'weddingHalls.gif', 'This is a category for Wedding Halls ads', 920.00),
	('Photography', 'photography.gif', 'This is a category for Photography ads', 2100.00);







CREATE TABLE Advertisement (
  adID int(11) AUTO_INCREMENT NOT NULL,
  catID int(11),
 
  title varchar(20) NOT NULL,
  addDescription varchar(300) NOT NULL,
  mobile int(11) NOT NULL,
  addImageLoc varchar(300) DEFAULT NULL,
  publishDateTime datetime DEFAULT NULL,
  status bit(1) DEFAULT NULL,
   vendorID int(11),
  CONSTRAINT advertisement_pk PRIMARY KEY (adID),
  CONSTRAINT catID_fk FOREIGN KEY (catID) REFERENCES Category(catID) ON DELETE SET NULL,
  CONSTRAINT VID_fk FOREIGN KEY (vendorID) REFERENCES Vendor(vendorID) ON DELETE SET NULL
);

INSERT INTO Advertisement (catID, title,addDescription, mobile, addImageLoc, publishDateTime, status,vendorID) VALUES
(1,  'Uncategorized', 'These services can include providing any combination of food', 752468741, 'adImage1.jpg', CURRENT_TIMESTAMP, 0,1),
(2,  'Laka Catering', 'Live wedding band, or DJ to play songs for the couple and guests.', 736985214, 'adImage2.jpg', CURRENT_TIMESTAMP, 1,2),
(3,  'Lahiru DJ Music', 'While you are busy with the details of planning the wedding, let us care for the dress', 773915642, 'adImage3.jpg', CURRENT_TIMESTAMP, 0,3),
(4,  'Anjalee Wedding Dress', 'The service typically consists of: Coverage of as much of the day as you wish', 775632589, 'adImage4.jpg', CURRENT_TIMESTAMP, 1,2),
(5,  'Kasun Wedding Vehivle', 'We guarantee your vehicle on time for the auspicious occasion thus giving you peace of mind.', 732145698, 'adImage5.jpg', CURRENT_TIMESTAMP, 1,4),
(6,  'Kasun Cosmetics', 'We guarantee your vehicle on time for the auspicious occasion thus giving you peace of mind.', 732145698, 'adImage5.jpg', CURRENT_TIMESTAMP, 0,5),
(7,  'Niki Flowers', 'These services can include providing any combination of food', 752468741, 'adImage1.jpg', CURRENT_TIMESTAMP, 1,1),
(8,  'Gaween Videography', 'Live wedding band, or DJ to play songs for the couple and guests.', 736985214, 'adImage2.jpg', CURRENT_TIMESTAMP, 0,2),
(9,  'Dilki Wedding Cards', 'While you are busy with the details of planning the wedding, let us care for the dress', 773915642, 'adImage3.jpg', CURRENT_TIMESTAMP, 0,4),
(10,  'Anjalee Wedding Halls', 'The service typically consists of: Coverage of as much of the day as you wish', 775632589, 'adImage4.jpg', CURRENT_TIMESTAMP, 1,3),
(11, 'Kasun Photography', 'We guarantee your vehicle on time for the auspicious occasion thus giving you peace of mind.', 732145698, 'adImage5.jpg', CURRENT_TIMESTAMP, 0,1);


CREATE TABLE Payment (
  paymentID int(11) AUTO_INCREMENT NOT NULL,
  amount double DEFAULT NULL,
  adID int(11),
  vendorID int(11), 
  payTimeDate datetime DEFAULT NULL,
  pay_type varchar(20) DEFAULT NULL,
  pymntDescription varchar(300) DEFAULT NULL,
  /*Need a vendorID because If ad get deleted cannot retrieve payments*/
  CONSTRAINT paymentID_pk PRIMARY KEY (paymentID),
  CONSTRAINT adID_fk FOREIGN KEY (adID) REFERENCES Advertisement(adID) ON DELETE SET NULL,
  CONSTRAINT vendorPay_fk FOREIGN KEY (vendorID) REFERENCES Vendor(vendorID) ON DELETE SET NULL
);
INSERT INTO Payment (amount,adID,vendorID,payTimeDate, pay_type, pymntDescription) VALUES
 (1000.00,1,1,CURRENT_TIMESTAMP ,'visa card', 'This payment for Bride'),
 (500.00,2,2,CURRENT_TIMESTAMP ,'master card', 'This payment for Catering'),
 (1500.00,3,3,CURRENT_TIMESTAMP ,'american express', 'This payment for Music'),
 (800.00,4,2,CURRENT_TIMESTAMP ,'visa card', 'This payment for Dress'),
 (1100.00,5,4,CURRENT_TIMESTAMP , 'master card', 'This payment for Car Rent'),
 (1100.00,6,5,CURRENT_TIMESTAMP , 'master card', 'This payment for Car Rent'),
 (1000.00,7,1,CURRENT_TIMESTAMP , 'visa card', 'This payment for Bride'),
 (500.00,8,2,CURRENT_TIMESTAMP ,'master card', 'This payment for Catering'),
 (1500.00,9,4,CURRENT_TIMESTAMP ,'american express', 'This payment for Music'),
 (800.00,10,3,CURRENT_TIMESTAMP ,'visa card', 'This payment for Dress'),
 (1100.00,11,1,CURRENT_TIMESTAMP , 'master card', 'This payment for Car Rent');



CREATE TABLE Feedback(
    customerID INT NOT NULL,
	adID INT NOT NULL,
	feedbackID INT AUTO_INCREMENT  NOT NULL,
	feedbackDate date,
	feedbackTime time,
	rating INT,
	fbdescription varchar(300),
	CONSTRAINT feedback_pk PRIMARY KEY (feedbackID),
	CONSTRAINT feedbackCus_fk FOREIGN KEY (customerID) REFERENCES Customer(customerID) ON DELETE CASCADE,
	CONSTRAINT feedbackAd_fk FOREIGN KEY (adID) REFERENCES Advertisement(adID) ON DELETE CASCADE
);

INSERT INTO Feedback
	(customerID, adID, feedbackDate, feedbackTime, rating, fbdescription)
VALUES
	(1, 1, '2021-06-30', '10:30:00', 3, 'Very nice'),
	(2, 2, '2020-12-29', '10:30:00', 5, 'Good I like it'),
	(3, 3, '2014-07-09', '10:30:00', 4, 'Amazing Experience'),
	(4, 4, '2017-09-02', '10:30:00', 5, 'Awesome'),
	(5, 5, '2019-01-25', '10:30:00', 1, 'Bad service');


CREATE TABLE Choice(
	choiceID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    adID INT NOT NULL,
	CID INT NOT NULL,
	CONSTRAINT choicecid_fk FOREIGN KEY (adID) REFERENCES Advertisement(adID) ON DELETE CASCADE,
	CONSTRAINT choiceadid_fk FOREIGN KEY (CID) REFERENCES Customer(customerID) ON DELETE CASCADE
);

INSERT INTO Choice
	(adID, CID)
VALUES
	(1, 1),
	(2, 2),
	(3, 3),
	(4, 4),
	(5, 5);


CREATE TABLE Announcement(
    annID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	adminID INT ,
	title varchar(30),
	user_type varchar(30),
	publish_date Date,
	annDescription varchar(300),
	CONSTRAINT AnnadminID_fk FOREIGN KEY (adminID) REFERENCES Admin(adminID) ON DELETE SET NULL
);

INSERT INTO Announcement
	(adminID, title, user_type, publish_date, annDescription)
VALUES
	(1, 'New Year Sale', 'vendor', CURRENT_TIMESTAMP, 'Special discout for Music category'),
	(2, 'Merry Christmas', 'customer', CURRENT_TIMESTAMP, 'We wish you a merry christmas'),
	(3, 'Site Maintenance', 'vendor', CURRENT_TIMESTAMP, 'Site will be down for couple of hours'),
	(4, 'Happy New Year', 'customer', CURRENT_TIMESTAMP, 'Thank you for being with us'),
	(5, 'Hi', 'vendor', CURRENT_TIMESTAMP, 'Hello from Admin');


CREATE TABLE ContactUs(
	conusID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	name varchar(30) NOT NULL,
	email varchar(30) NOT NULL,
	mobile varchar(20) NOT NULL,
	message varchar(300) NOT NULL
);

INSERT INTO ContactUs
	(name, email, mobile, message)
VALUES
	('Thushara Thiwanka', 'thushara@sliit.lk', '712345678', 'Hello admin'),
	('Gaween Kanishka', 'gaween@sliit.lk', '724569356', 'Site is not working properly'),
	('Chamath Jayasekara', 'chamath@sliit.lk', '774589632', 'Website too slow please fix'),
	('Nikethani Gangoda', 'nikethani@sliit.lk', '775896458', 'Just want to say thanks'),
	('Pamodya Daundasekara', 'pamodya@sliit.lk', '736526985', 'Nice website');


CREATE TABLE GuestList(
	guestID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	g_name varchar(30) NOT NULL,
	customerID INT,
	CONSTRAINT guestCusID_fk FOREIGN KEY (customerID) REFERENCES Customer(customerID) ON DELETE SET NULL
);

INSERT INTO GuestList
	(g_name, customerID)
VALUES
	('Thushara Thiwanka', 1),
	('Gaween Kanishka', 2),
	('Chamath Jayasekara', 3),
	('Nikethani Gangoda', 4),
	('Pamodya Daundasekara', 5),
	('Thushara Thiwanka', 1),
	('Gaween Kanishka', 2),
	('Chamath Jayasekara', 3),
	('Nikethani Gangoda', 4),
	('Pamodya Daundasekara', 5);
