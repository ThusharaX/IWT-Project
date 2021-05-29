<?php
//IT20654962

if(isset($_POST['save'])){
	include './src/dbh.php';
include 'ImageCheckAdvertisements.php';
	//get adID using  hiddenfeild
	$adID=$_POST["adID"];
	
	// $target_file
	$target_file=imageChecking("images");
			 
	         //retirval of other input and textarea values
			   $title=$_POST["title"];
			   $adsDescription=$_POST["adsDescription"];
			   $mobile=$_POST["mobile"];
			  
	
            		 //sql statement to update advertisement details
			 $sqlstmt="UPDATE Advertisement
 			           SET title='$title',addDescription='$adsDescription',mobile=$mobile,addImageLoc='$target_file'
					   WHERE adID=$adID;";
			 if(mysqli_query($conn,$sqlstmt)){
				 echo "<script>alert('$target_file')</script>";
				header("Location:adsInventory.php?adID=$adID&UPDATED");
			 }else{
				 echo "Error : ".$conn->error;
			 }			 
		 }else{
	   //redirect  user  to homepage, if they try to access unathorized files
		   header("Location:index.php?unauthorizedaccess");
	   }	
	
		
?>