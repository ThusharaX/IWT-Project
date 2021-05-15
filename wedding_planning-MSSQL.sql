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
	   v_company varchar(30) ,
	   v_username varchar(30) NOT NULL,
	   v_imgLoc varchar(30),
	   v_fname varchar(30) NOT NULL,
	   v_lname varchar(30) NOT NULL,
	   role varchar(10) NOT NULL,
	   v_password varchar(20) NOT NULL,
	   --changed to INT--
	   v_mobile INT(10),
	   v_address varchar(30),
	   v_email varchar(30),
	   CONSTRAINT vendor_pk PRIMARY KEY (vendorID)
	  
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
	   c_partner varchar(30),
	   CONSTRAINT customer_pk PRIMARY KEY (customerID)	  
);

CREATE TABLE Payment(
      paymentID INT IDENTITY(1,1) NOT NULL,
	  amount real,
	  payTimeDate DateTime,
	  pay_type varchar(10),
	  pymntDescription varchar(300),
	  --remove payment date--
	
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
	  --1-category uncategorized--
	  catID INT DEFAULT 1,
	  adimID INT,
	  title varchar(20)  NOT NULL,
	  addDescription varchar(300)  NOT NULL,
      mobile INT NOT NULL,
	  addImageLoc varchar(30),
	  publishDateTime DateTime,
	--removed advertisement publish date--
	  CONSTRAINT adID_pk PRIMARY KEY (adID),
	  --if a category get deleted fk will be set to null--
	  CONSTRAINT adIDcat_fk FOREIGN KEY (catID) REFERENCES Category(catID) ON DELETE SET DEFAULT,
	  --if admin get  deleted fk--
	  CONSTRAINT adIDadmin_fk FOREIGN KEY (adminID) REFERENCES Admin(adminID) ON DELETE SET NULL,
);

CREATE TABLE Feedback(
      customerID INT IDENTITY(1,1) NOT NULL,
	  adID INT NOT NULL,
	  feedbackID INT NOT NULL,
	  feedbackDateTime DateTime,
	 
	  rating INT,
	  fbdescription varchar(300),	  
	  CONSTRAINT feedback_pk PRIMARY KEY (customerID,adID,feedbackID),
	  --if referenced pk get deleted feedback will be deleted if we update--
	  CONSTRAINT feedbackCus_fk FOREIGN KEY (customerID) REFERENCES Customer(customerID) ON DELETE CASCADE,
	  CONSTRAINT feedbackAd_fk FOREIGN KEY (adID) REFERENCES advertisement(adID) ON DELETE CASCADE
);



CREATE TABLE VendorPaymentAdvertisement(
       vendorID INT NOT NULL,
	   adID INT NOT NULL,
	   paymentID INT NOT NULL,
	  
	   CONSTRAINT VpaymentAdvertisement_pk PRIMARY KEY (vendorID,adID,paymentID),
	   --add 3 foreign keys--
	   --payment only can  perform pk--
	   --In our system there is no functionality  delete payments--
	   --if vendor get deleted paymentID and advertisementID can  perform a foreign key --
	   ----
	   CONSTRAINT VPAvendor_fk FOREIGN KEY (vendorID) REFERENCES Vendor(vendorID) ON DELETE CASCADE,
	   CONSTRAINT VPAad_fk FOREIGN KEY (adID) REFERENCES Advertisement(adID) ON DELETE CASCADE,
	   CONSTRAINT VPApayment_fk FOREIGN KEY (Payment) REFERENCES Payment(paymentID) ON DELETE CASCADE
);

CREATE TABLE Wedding(
       weddingID INT IDENTITY(1,1) NOT NULL,
	   customerID INT,
	   weddingDate date,
	   weddingDescription varchar(300), 
	   CONSTRAINT wedding_pk PRIMARY KEY (weddingID),
	   --changed to weddingCus_fk--
	   CONSTRAINT weddingCus_fk FOREIGN KEY (customerID) REFERENCES Customer(customerID) ON DELETE SET NULL;
);

CREATE TABLE Choice(
       adID INT NOT NULL,
	   CID INT NOT NULL,
	   CONSTRAINT choice_pk PRIMARY KEY (adID,CID),
	   --if reference pk get deleted,referencing fk's whole row will be delted--
	   CONSTRAINT choicecid_fk FOREIGN KEY (adID) REFERENCES Advertisement(adID) ON DELETE CASCADE,
	   CONSTRAINT choiceadid_fk FOREIGN KEY (CID) REFERENCES Customer(customerID) ON DELETE CASCADE,
); 

CREATE TABLE Announcement(
       annID INT IDENTITY(1,1) NOT NULL,
	   adminID INT ,
	   title varchar(30),
	   user_type varchar(30),
	   publish_date Date,
	   annDescription varchar(300)
	   CONSTRAINT announcement_pk PRIMARY KEY (annID),
	   --changed fk constraint--
	   CONSTRAINT AnnadminID_fk FOREIGN KEY (adminID) REFERENCES Admin(adminID) ON DELETE SET NULL
);

--contact us--