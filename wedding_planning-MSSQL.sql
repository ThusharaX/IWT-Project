CREATE TABLE Admin(
	adminID INT IDENTITY(1,1) NOT NULL,
	a_fname varchar(30) NOT NULL,
	a_lname varchar(30) NOT NULL,
	a_username varchar(30) NOT NULL,
	a_imgLoc varchar(30),
	role varchar(10) NOT NULL,
	a_password varchar(256) NOT NULL,
	a_email varchar(25) NOT NULL,
	CONSTRAINT admin_pk PRIMARY KEY (adminID)
);

INSERT INTO Admin
	(a_fname, a_lname, a_username, a_imgLoc, role, a_password, a_email)
VALUES
	('Thushara', 'Thiwanka', 'thusharax', 'adminImage1.jpg', 'admin', HASHBYTES('SHA2_256', 'pass'), 'thushara@sliit.lk'),
	('Gaween', 'Kanishka', 'gaween', 'adminImage2.jpg', 'admin', HASHBYTES('SHA2_256', 'pass'), 'gaween@sliit.lk'),
	('Chamath', 'Jayasekara', 'chamath', 'adminImage3.jpg', 'admin', HASHBYTES('SHA2_256', 'pass'), 'chamath@sliit.lk'),
	('Nikethani', 'Gangoda', 'nikethani', 'adminImage4.jpg', 'admin', HASHBYTES('SHA2_256', 'pass'), 'nikethani@sliit.lk'),
	('Pamodya', 'Daundasekara', 'pamodya', 'adminImage5.jpg', 'admin', HASHBYTES('SHA2_256', 'pass'), 'pamodya@sliit.lk');


CREATE TABLE Vendor(
    vendorID INT IDENTITY(1,1) NOT NULL,	   
	v_company varchar(30) ,
	v_username varchar(30) NOT NULL,
	v_imgLoc varchar(30),
	v_fname varchar(30) NOT NULL,
	v_lname varchar(30) NOT NULL,
	role varchar(10) NOT NULL,
	v_password varchar(256) NOT NULL,
	v_mobile INT,
	v_address varchar(30),
	v_email varchar(30) NOT NULL,
	CONSTRAINT vendor_pk PRIMARY KEY (vendorID)
	  
);

INSERT INTO Vendor
	(v_company, v_username, v_imgLoc, v_fname, v_lname, role, v_password, v_mobile, v_address, v_email)
VALUES
	('LuciferX', 'thusharax', 'vedorImage1.jpg', 'Thushara', 'Thiwanka', 'vendor', HASHBYTES('SHA2_256', 'pass'), 712345678, 'G/07, Galigamuwa, Kegalle', 'thushara@sliit.lk'),
	('Gawee', 'gaween', 'vedorImage2.jpg', 'Gaween', 'Kanishka', 'vendor', HASHBYTES('SHA2_256', 'pass'), 756427856, 'K/09, Naiwala, Minuwangoda', 'gaween@sliit.lk'),
	('Chama', 'chamath', 'vedorImage3.jpg', 'Chamath', 'Jayasekara', 'vendor', HASHBYTES('SHA2_256', 'pass'), 732145698, 'L/02, Aldeniya, Kadawatha', 'chamath@sliit.lk'),
	('Niki', 'nikethani', 'vedorImage4.jpg', 'Nikethani', 'Gangoda', 'vendor', HASHBYTES('SHA2_256', 'pass'), 787956423, 'E/05, Gabgoda, Pilimathalawa', 'nikethani@sliit.lk'),
	('Pamo', 'pamodya', 'vedorImage5.jpg', 'Pamodya', 'Daundasekara', 'vendor', HASHBYTES('SHA2_256', 'pass'), 798756321, 'T/08, Katugasthota, Kandy', 'pamodya@sliit.lk');


CREATE TABLE Customer(
    customerID INT IDENTITY(1,1) NOT NULL,
	c_fname varchar(30) NOT NULL,
	c_lname varchar(30) NOT NULL,
   	c_dob date,
	c_username varchar(30) NOT NULL,
	c_imgLoc varchar(30),
	role varchar(10) NOT NULL,
    c_password varchar(256) NOT NULL,
	c_email varchar(30) NOT NULL,
	c_partner varchar(30),
	CONSTRAINT customer_pk PRIMARY KEY (customerID)	  
);

INSERT INTO Customer
	(c_fname, c_lname, c_dob, c_username, c_imgLoc, role, c_password, c_email, c_partner)
VALUES
	('Thushara', 'Thiwanka', '1998-09-01', 'thusharax', 'customerImage1.jpg', 'customer', HASHBYTES('SHA2_256', 'pass'), 'thushara@sliit.lk', 'Dilki'),
	('Gaween', 'Kanishka', '1998-04-01', 'gaween', 'customerImage2.jpg', 'customer', HASHBYTES('SHA2_256', 'pass'), 'gaween@sliit.lk', 'Gayani'),
	('Chamath', 'Jayasekara', '1999-01-01', 'chamath', 'customerImage3.jpg', 'customer', HASHBYTES('SHA2_256', 'pass'), 'chamath@sliit.lk', 'Chamali'),
	('Nikethani', 'Gangoda', '1997-08-01', 'nikethani', 'customerImage4.jpg', 'customer', HASHBYTES('SHA2_256', 'pass'), 'nikethani@sliit.lk', 'Nikethana'),
	('Pamodya', 'Daundasekara', '1999-12-01', 'pamodya', 'customerImage5.jpg', 'customer', HASHBYTES('SHA2_256', 'pass'), 'pamodya@sliit.lk', 'Pamoda');


CREATE TABLE Payment(
    paymentID INT IDENTITY(1,1) NOT NULL,
	amount real,
	payTimeDate DateTime,
	pay_type varchar(20),
	pymntDescription varchar(300),
	CONSTRAINT Payment_pk PRIMARY KEY (paymentID)
);

INSERT INTO Payment
	(amount, payTimeDate, pay_type, pymntDescription)
VALUES
	(1000.00, CURRENT_TIMESTAMP, 'visa card', 'This payment for Bride'),
	(500.00, CURRENT_TIMESTAMP, 'master card', 'This payment for Catering'),
	(1500.00, CURRENT_TIMESTAMP, 'american express', 'This payment for Music'),
	(800.00, CURRENT_TIMESTAMP, 'visa card', 'This payment for Dress'),
	(1100.00, CURRENT_TIMESTAMP, 'master card', 'This payment for Car Rent');


CREATE TABLE Category(
    catID INT IDENTITY(1,1) NOT NULL,
	catName varchar(30) NOT NULL,
	catDescription varchar(300),
	price real,
	CONSTRAINT Category_pk PRIMARY KEY(catID)
);

INSERT INTO Category
	(catName, catDescription, price)
VALUES
	('Uncategorized', 'This is a category for uncategorized ads', 0.00),
	('Catering ', 'The best Catering services in the country', 500.00),
	('Music', 'After the ceremony, there is often a celebratory dance', 1500.00),
	('Dress', 'Our tailors can create amazing modern-day gowns from vintage wedding gowns', 800.00),
	('Car Rent', 'Which provides some of the most competitive rates in the industry.', 1100.00);


CREATE TABLE Advertisement(
    adID INT IDENTITY(1,1) NOT NULL,
	catID INT DEFAULT 1,
	adminID INT,
	title varchar(20)  NOT NULL,
	addDescription varchar(300)  NOT NULL,
    mobile INT NOT NULL,
	addImageLoc varchar(30),
	publishDateTime DateTime,
	status BIT,
	CONSTRAINT adID_pk PRIMARY KEY (adID),
	CONSTRAINT adIDcat_fk FOREIGN KEY (catID) REFERENCES Category(catID) ON DELETE SET DEFAULT,
	CONSTRAINT adIDadmin_fk FOREIGN KEY (adminID) REFERENCES Admin(adminID) ON DELETE SET NULL,
);

INSERT INTO Advertisement
	(catID, adminID, title, addDescription, mobile, addImageLoc, publishDateTime, status)
VALUES
	(1, 1, 'Kalana Catering', 'These services can include providing any combination of food', 752468741, 'adImage1.jpg', CURRENT_TIMESTAMP, 1),
	(2, 2, 'Laka Music', 'Live wedding band, or DJ to play songs for the couple and guests.', 736985214, 'adImage2.jpg', CURRENT_TIMESTAMP, 1),
	(3, 3, 'Lahiru Dress', 'While you are busy with the details of planning the wedding, let us care for the dress', 773915642, 'adImage3.jpg', CURRENT_TIMESTAMP, 1),
	(4, 4, 'Anjalee Photography', 'The service typically consists of: Coverage of as much of the day as you wish', 775632589, 'adImage4.jpg', CURRENT_TIMESTAMP, 1),
	(5, 5, 'Kasun Car Rent', 'We guarantee your vehicle on time for the auspicious occasion thus giving you peace of mind.', 732145698, 'adImage5.jpg', CURRENT_TIMESTAMP, 0);


CREATE TABLE Feedback(
    customerID INT NOT NULL,
	adID INT NOT NULL,
	feedbackID INT IDENTITY(1,1) NOT NULL,
	feedbackDate date,
	feedbackTime time,
	rating INT,
	fbdescription varchar(300),	  
	CONSTRAINT feedback_pk PRIMARY KEY (customerID,adID,feedbackID),
	CONSTRAINT feedbackCus_fk FOREIGN KEY (customerID) REFERENCES Customer(customerID) ON DELETE CASCADE,
	CONSTRAINT feedbackAd_fk FOREIGN KEY (adID) REFERENCES advertisement(adID) ON DELETE CASCADE
);

INSERT INTO Feedback
	(customerID, adID, feedbackDate, feedbackTime, rating, fbdescription)
VALUES
	(1, 1, '2021-06-30', '10:30:00', 3, 'Very nice'),
	(2, 2, '2020-12-29', '10:30:00', 5, 'Good I like it'),
	(3, 3, '2014-07-09', '10:30:00', 4, 'Amazing Experience'),
	(4, 4, '2017-09-02', '10:30:00', 5, 'Awesome'),
	(5, 5, '2019-01-25', '10:30:00', 1, 'Bad service');


CREATE TABLE VendorPaymentAdvertisement(
    vendorID INT NOT NULL,
	adID INT NOT NULL,
	paymentID INT NOT NULL,
	CONSTRAINT VpaymentAdvertisement_pk PRIMARY KEY (vendorID,adID,paymentID),
	--add 3 foreign keys--
	--payment only can  perform pk--
	--In our system there is no functionality  delete payments--
	--if vendor get deleted paymentID and advertisementID can  perform a foreign key --
	CONSTRAINT VPAvendor_fk FOREIGN KEY (vendorID) REFERENCES Vendor(vendorID) ON DELETE CASCADE,
	CONSTRAINT VPAad_fk FOREIGN KEY (adID) REFERENCES Advertisement(adID) ON DELETE CASCADE,
	CONSTRAINT VPApayment_fk FOREIGN KEY (PaymentID) REFERENCES Payment(paymentID) ON DELETE CASCADE
);

INSERT INTO VendorPaymentAdvertisement
	(vendorID, adID, paymentID)
VALUES
	(1, 1, 1),
	(2, 2, 2),
	(3, 3, 3),
	(4, 4, 4),
	(5, 5, 5);


CREATE TABLE Wedding(
    weddingID INT IDENTITY(1,1) NOT NULL,
	customerID INT,
	weddingDate date,
	weddingDescription varchar(300), 
	CONSTRAINT wedding_pk PRIMARY KEY (weddingID),
	--changed to weddingCus_fk--
	CONSTRAINT weddingCus_fk FOREIGN KEY (customerID) REFERENCES Customer(customerID) ON DELETE SET NULL
);

INSERT INTO Wedding
	(customerID, weddingDate, weddingDescription)
VALUES
	(1, '2022-08-04', 'My wedding'),
	(2, '2021-10-05', 'I got married'),
	(3, '2023-07-02', 'Just say YES'),
	(4, '2021-08-05', 'Love of my life'),
	(5, '2021-09-01', 'Excited');


CREATE TABLE Choice(
    adID INT NOT NULL,
	CID INT NOT NULL,
	CONSTRAINT choice_pk PRIMARY KEY (adID,CID),
	--if reference pk get deleted,referencing fk's whole row will be delted--
	CONSTRAINT choicecid_fk FOREIGN KEY (adID) REFERENCES Advertisement(adID) ON DELETE CASCADE,
	CONSTRAINT choiceadid_fk FOREIGN KEY (CID) REFERENCES Customer(customerID) ON DELETE CASCADE,
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
    annID INT IDENTITY(1,1) NOT NULL,
	adminID INT ,
	title varchar(30),
	user_type varchar(30),
	publish_date Date,
	annDescription varchar(300)
	CONSTRAINT announcement_pk PRIMARY KEY (annID),
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
	conusID INT IDENTITY(1,1) NOT NULL,
	name varchar(30) NOT NULL,
	email varchar(30) NOT NULL,
	mobile varchar(20) NOT NULL,
	message varchar(300) NOT NULL,
);

INSERT INTO ContactUs
	(name, email, mobile, message)
VALUES
	('Thushara Thiwanka', 'thushara@sliit.lk', '712345678', 'Hello admin'),
	('Gaween Kanishka', 'gaween@sliit.lk', '724569356', 'Site is not working properly'),
	('Chamath Jayasekara', 'chamath@sliit.lk', '774589632', 'Website too slow please fix'),
	('Nikethani Gangoda', 'nikethani@sliit.lk', '775896458', 'Just want to say thanks'),
	('Pamodya Daundasekara', 'pamodya@sliit.lk', '736526985', 'Nice website');

