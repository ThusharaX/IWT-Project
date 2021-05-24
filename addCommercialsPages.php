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
  $paymentID=rand(1,1000);
  //sql statement to insert advertisemnt and payment details
  
//	( paymentID,catID,title, addDescription, mobile, addImageLoc, publishDateTime, status,amount,pay_type,pymntDescription,vendorID)
  
  $sqlstmt="INSERT INTO Advertisement_payment(paymentID,catID,title,addDescription,mobile,addImageLoc,publishDateTime,status,amount,pay_type,pymntDescription,vendorID) 
             VALUES($paymentID,$category,'$title','$description',$mobile_number,'$target_file','$currentDateTime',1,$amount,'$paymentType','$paydescription',$vendorID);";
          
  		 
			 //can excute multiple sql statements using this php function
			 if(!mysqli_query($conn,$sqlstmt)){
					echo "Error for advertisement and payment : ".$conn->error;			
			  }
    
   $conn->close();
   header("Location:adsInventory.php?sucess");

 }else{
	 header("Location:adsInventory.php");
 }
?>