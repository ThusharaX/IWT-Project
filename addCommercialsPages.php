<?php  
//BY It20654962 add commercial php page

 if(isset($_POST['save'])){
  require './src/dbh.php';
   $vendorID=$_POST["vendorID"];
  //This php file includes all the file checkings
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
 
 
  //sql statement to insert advertisemnt 

   $sqlstmt="INSERT INTO Advertisement(catID,title,addDescription,mobile,addImageLoc,publishDateTime,status,vendorID) 
             VALUES($category,'$title','$description',$mobile_number,'$target_file','$currentDateTime',1,$vendorID)";
			 
          
  		 
			 //excuting advertisement data entering query
			 if(mysqli_query($conn,$sqlstmt)){
				  $adID;
				  //query to retrieve current adID
				  $sqlstmt2="SELECT adID
                             FROM  Advertisement 
			                 WHERE vendorID=$vendorID AND publishDateTime='$currentDateTime'";			             			

                          //excting retrival query
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
						 //query to insert payment details
				 $sqlstmt3="INSERT INTO Payment(amount,adID,vendorID,payTimeDate, pay_type, pymntDescription)
            				 VALUES ($amount,$adID,$vendorID,'$currentDateTime','$paymentType','$paydescription')";
				  if(!mysqli_query($conn,$sqlstmt3)){
					   echo "Error payment not entered: ".$conn->error;
					 
				  }				 
						
			  }else{
				 
				  echo "Error for advertisement and payment : ".$conn->error;		
			  }
    
   $conn->close();
   /*redirect back  to adsInventory*/
   header("Location:adsInventory.php?sucess");

 }else{
	 /*if anyone  try  access this file using url ,user ill be imediately redirected to homepage*/
	 header("Location:index.php?unauthorizedAccess");
 }
?>