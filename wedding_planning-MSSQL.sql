-- MS SQL SERVER
CREATE TABLE Admin(
	   adminID INT IDENTITY(1,1) NOT NULL,
	   a_fname varchar(30) NOT NULL,
	   a_lname varchar(30) NOT NULL,
	   a_username varchar(30) NOT NULL,
	   a_imgLoc varchar(30),
	   role varchar(10) NOT NULL,
	   a_password varchar(20) NOT NULL,
	   a_email varchar(25) NOT NULL,
	   CONSTRAINT admin_pk PRIMARY KEY (adminID)
);

CREATE TABLE Vendor(
       vendorID INT IDENTITY(1,1) NOT NULL,
	   -- adminID  INT NOT NULL,
	   v_company varchar(30) ,
	   v_username varchar(30) NOT NULL,
	   v_imgLoc varchar(30),
	   v_fname varchar(30) NOT NULL,
	   v_lname varchar(30) NOT NULL,
	   role varchar(30) NOT NULL,
	   v_password varchar(20) NOT NULL,
	   v_mobile varchar (10),
	   v_address varchar(30),
	   CONSTRAINT vendor_pk PRIMARY KEY (vendorID)
	   -- CONSTRAINT vendor_fk FOREIGN KEY (adminID) REFERENCES Admin(adminID)
);

CREATE TABLE Customer(
       customerID INT IDENTITY(1,1) NOT NULL,
	   c_fname varchar(30) NOT NULL,
	   c_lname varchar(30) NOT NULL,
   	   c_dob date,
	   c_username varchar(30) NOT NULL,
	   c_imgLoc varchar(30),
	   role varchar(10) NOT NULL,
       c_password varchar(20) NOT NULL,
	   c_email varchar(30) NOT NULL,
	   c_partner varchar(30)
	   CONSTRAINT customer_pk PRIMARY KEY (customerID)	  
);

CREATE TABLE Payment(
      paymentID INT IDENTITY(1,1) NOT NULL,
	  amount real,
	  pay_type varchar(10),
	  pymntDescription varchar(300),
      pay_date date,
	  CONSTRAINT Payment_pk PRIMARY KEY (paymentID)
);

CREATE TABLE Category(
       catID INT IDENTITY(1,1) NOT NULL,
	   catName varchar(30) NOT NULL,
	   catDescription varchar(300),
	   price real,
	   CONSTRAINT Category_pk PRIMARY KEY(catID)
);

CREATE TABLE Advertisement(
      adID INT IDENTITY(1,1) NOT NULL,
	  catID INT NOT NULL,
	  title varchar(20)  NOT NULL,
	  addDescription varchar(300)  NOT NULL,
      mobile INT,
	  addImageLoc varchar(30),
      publish_date Date,
	  CONSTRAINT adID_pk PRIMARY KEY (adID),
	  CONSTRAINT adID_fk FOREIGN KEY (catID) REFERENCES Category(catID)
);

CREATE TABLE Feedback(
      customerID INT IDENTITY(1,1) NOT NULL,
	  adID INT NOT NULL,
	  feedbackID INT NOT NULL,
	  feedbackDate date,
	  feedbackTime time,
	  rating INT,
	  fbdescription varchar(300),
	  CONSTRAINT feedback_pk PRIMARY KEY (customerID,adID,feedbackID),
	  CONSTRAINT feedbackCus_fk FOREIGN KEY (customerID) REFERENCES Customer(customerID),
	  CONSTRAINT feedbackAd_fk FOREIGN KEY (adID) REFERENCES advertisement(adID)
);

CREATE TABLE VendorEmail(
       vendorID INT NOT NULL,
	   email varchar(30),
	   CONSTRAINT vendorEmail_pk PRIMARY KEY (vendorID,email),
	   CONSTRAINT vendorEmail_fk FOREIGN KEY (vendorID) REFERENCES Vendor(vendorID)
);

CREATE TABLE VendorPaymentAdvertisement(
       vendorID INT NOT NULL,
	   adID INT NOT NULL,
	   paymentID INT NOT NULL,
	   vpadate date,
	   vpaTime time,
	   CONSTRAINT VpaymentAdvertisement_pk PRIMARY KEY (vendorID,adID,paymentID)
);

CREATE TABLE Wedding(
       weddingID INT IDENTITY(1,1) NOT NULL,
	   customerID INT NOT NULL,
	   weddingDate date,
	   weddingDescription varchar(300), 
	   CONSTRAINT wedding_pk PRIMARY KEY (weddingID),
	   CONSTRAINT wedding_fk FOREIGN KEY (customerID) REFERENCES Customer(customerID)
);

CREATE TABLE Choice(
       adID INT NOT NULL,
	   CID INT NOT NULL,
	   CONSTRAINT choice_pk PRIMARY KEY (adID,CID),
	   CONSTRAINT choicecid_fk FOREIGN KEY (adID) REFERENCES Advertisement(adID),
	   CONSTRAINT choiceadid_fk FOREIGN KEY (CID) REFERENCES Customer(customerID)
); 

CREATE TABLE Announcement(
       annID INT IDENTITY(1,1) NOT NULL,
	   adminID INT NOT NULL,
	   title varchar(30),
	   user_type varchar(30),
	   pubklish_date Date,
	   andescription varchar(300)
	   CONSTRAINT announcement_pk PRIMARY KEY (annID),
	   CONSTRAINT adminID_fk FOREIGN KEY (annID) REFERENCES Admin(adminID)
);

CREATE TABLE Report(
      reportID INT IDENTITY(1,1) NOT NULL,
	  adminID INT NOT NULL,
	  reportDate Date,
	  reportName varchar(30),
	  CONSTRAINT report_pk PRIMARY KEY (reportID),
	  CONSTRAINT report_fk FOREIGN KEY (adminID) REFERENCES Admin(adminID)
); 