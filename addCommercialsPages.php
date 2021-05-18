<?php  
//BY It20654962 add commercial php page
 if(isset($_POST['save'])){
  require './src/dbh.php';
 
 //assigning the name of the file to a variable
  $fileName=$_FILES["images"]["name"];
 //assigning the size of the file to a variable
 $fileSize=$_FILES["images"]["size"];
 
 
 //Assigning temporary name to a variable
 $fileTempName=$_FILES["images"]["tmp_name"];  
 
 //create directory
  $target_dir="Uploads/";

  //contains the path
  $target_file=$target_dir.basename($fileName);
  
  $uploadOk =true;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  
  //Check if the file is actual image or not
  $check = getimagesize($fileTempName);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk =true;
  } else {
    echo "File is not an image.";
    $uploadOk = false;
  }

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk =false;
}

// Check file size
if ($fileSize > 2000000) {
  echo "<script>alert('Too large')</script>";
  $uploadOk =false;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk =false;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk ==false) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else 
  if (move_uploaded_file($fileTempName, $target_file)) {
    echo "The file ". htmlspecialchars( basename( $fileName)). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
  
  
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