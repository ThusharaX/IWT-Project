<?php
 include_once './src/dbh.php';

	
    $vendorID=$_SESSION["id"];
	 $company;
	 $username;
	 $ImageLoc;
	 $firstname;
	 $lastname;
	 $password;
	 $mobile;
	 $address;
	 $email;
	 $sqlstmt="SELECT * FROM Vendor WHERE vendorID=$vendorID";
	 if($result=mysqli_query($conn,$sqlstmt)){
		 if($result->num_rows>0){
			 while($row=$result->fetch_assoc()){
				 $company=$row["v_company"];
	             $username=$row["v_username"];
	             $ImageLoc=$row["v_imgLoc"];
	             $firstname=$row["v_fname"];
	             $lastname=$row["v_lname"];
	             $password=$row["v_password"];
	             $mobile=$row["v_mobile"];
	             $address=$row["v_address"];
	             $email=$row["v_email"];
			 }
		 }else{
			 echo "Cannot find this vendor";
			 
			 
		 }
		 		 
	 }else{
		 echo "Errors,vendor retriving:".$conn->error;
	 }
?>