<?php
include './src/dbh.php';
include 'ImageCheckAdvertisements.php';
if(isset($_POST['save'])){
	//getadID using  hiddenfeild
	$adID=$_POST["adID"];
	
	// $target_file
	//$target_file=imageChecking("images");
			 
			  //assigning the name of the file to a variable
 $fileName=$_FILES["images"]["name"];
 //assigning the size of the file to a variable
 $fileSize=$_FILES["images"]["size"];
 
 
 //Assigning temporary name to a variable
 $fileTempName=$_FILES["images"]["tmp_name"];  
 
 //create directory
 //changed
  $target_dir="./Uploads/adsImage/";

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
	  echo "<br>";
    echo "The file ". htmlspecialchars( basename( $fileName)). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
 			  
			   $title=$_POST["title"];
			   $adsDescription=$_POST["adsDescription"];
			   $mobile=$_POST["mobile"];
			  
	//$sqlstmt="INSERT INTO Advertisement_payment(paymentID,catID,title,addDescription,mobile,addImageLoc,publishDateTime,status,amount,pay_type,pymntDescription,vendorID) 
            		 
			 $sqlstmt="UPDATE Advertisement
 			           SET title='$title',addDescription='$adsDescription',mobile=$mobile,addImageLoc='$target_file'
					   WHERE adID=$adID;";
			 if(mysqli_query($conn,$sqlstmt)){
				 echo "<script>alert('$target_file')</script>";
				header("Location:adsInventory.php?adID=$adID&UPDATED");
			 }else{
				 echo "Error : ".$conn->error;
			 }			 
		 }
		
?>