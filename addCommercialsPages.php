<?php  
//BY It20654962 add commercial php page

 if(isset($_POST['save'])){
  require './src/dbh.php';
  //This php file includes all the checkings
 include "ImageCheckAdvertisements.php";
  $target_file= imageChecking("images");
 
   //Get advertisement details from the form,then assign values to varibles  
  $mobile_number = $_POST['mobile_number'];
  
  $description = $_POST['description']; 
  $title = $_POST['title'];
  $category = $_POST['category'];
  //get payment details from the form,then assign values to varibles
  $amount=$_POST['amount'];
  $paydescription=$_POST['paydescription'];
  $paymentType=$_POST['payment']; 
  
  //current Date and time 
  $currentDateTime=date("Y-m-d H:i:s");
//This vendor ID should be taken as session
  $vendorID=3;
 
  //sql statement to insert advertisemnt and payment details
  
//	( paymentID,catID,title, addDescription, mobile, addImageLoc, publishDateTime, status,vendorID)
  
  $sqlstmt="INSERT INTO Advertisement(catID,title,addDescription,mobile,addImageLoc,publishDateTime,status,vendorID) 
             VALUES($category,'$title','$description',$mobile_number,'$target_file','$currentDateTime',1,$vendorID)";
			 
          
  		 
			 //can excute multiple sql statements using this php function
			 if(mysqli_query($conn,$sqlstmt)){
				  $adID;
				  $sqlstmt2="SELECT adID
                             FROM  Advertisement 
			                 WHERE vendorID=3 AND publishDateTime='$currentDateTime'";			             			
//vendorID, adID

                         if($result=mysqli_query($conn,$sqlstmt2)){
                                 if($result->num_rows>0){

                                  while($row=$result->fetch_assoc()){
								   $adID=$row["adID"];
							       }
								 }else{
									 echo "No adID for this vendor";
								 }
						 }else{
							 echo "Error adID retrievel:".$conn->error;
						 }
				 $sqlstmt3="INSERT INTO Payment(amount,adID,vendorID,payTimeDate, pay_type, pymntDescription)
            				 VALUES ($amount,$adID,$vendorID,'$currentDateTime','$paymentType','$paydescription')";
				  if(!mysqli_query($conn,$sqlstmt3)){
					   echo "Error payment not entered: ".$conn->error;
					 
				  }				 
						
			  }else{
				 
				  echo "Error for advertisement and payment : ".$conn->error;		
			  }
    
   $conn->close();
  header("Location:adsInventory.php?sucess");

 }else{
	 header("Location:adsInventory.php");
 }
?>