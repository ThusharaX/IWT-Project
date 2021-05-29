<?php
	//IT20654962
	    
      if(isset($_POST["save"])){
		  //provide db connection
		   require './src/dbh.php';
		   //includes  imagechecking function
		   include "ImageCheckPropic.php";
		   //get updated  details
		   $companyName=$_POST["company"];
		   $userNameUp=$_POST["username"];
		   $firstName=$_POST["fname"];
		   $lastName=$_POST["lname"];
		   $emailNew=$_POST["email"];
		   $vID=$_POST["vendorID"];
		   //encryptingnew password		   		  
		   $passwordNew= hash('sha256', $_POST["password"]);
		   $newMobile=$_POST["mobile"];
		   $companyAddress=$_POST["address"];
		   		   
		   /*checking image*/
	       $target_image=imageChecking("propic");
	/*sql staement to update vendor details*/	  		  		   
$sqlstatement="Update Vendor
               SET  v_username='$userNameUp',v_imgLoc='$target_image',v_fname='$firstName',
			   v_lname='$lastName',v_password='$passwordNew',v_mobile=$newMobile,v_address='$companyAddress',
			   v_company='$companyName',v_email='$emailNew'
               WHERE vendorID=$vID;";						  
		   if(mysqli_query($conn,$sqlstatement)){
			  
			header("Location:vendorDashboard.php?editsuccess");
			  
			
		   }else{
			   echo "Error cannot update vendor because: ".$conn->error;
		   }		   
	   }else{
		   //redirect  user  to homepage, if they try to access unathorized files
		   header("Location:index.php?unauthorizedaccess");
	   }	
	
	?>
	
	