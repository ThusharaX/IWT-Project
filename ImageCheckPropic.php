<?php 

function imageChecking($Filefieldname){
 //assigning the name of the file to a variable
  $fileName=$_FILES[$Filefieldname]["name"];
 //assigning the size of the file to a variable
 $fileSize=$_FILES[$Filefieldname]["size"];
 
 
 //Assigning temporary name to a variable
 $fileTempName=$_FILES[$Filefieldname]["tmp_name"];  
 
 //default profile picture if user forget to upload a image when editing the profile
 if($_FILES[$Filefieldname]["size"]==0){
	 $target_imag="assets/img/profilePic.png";
	 return $target_imag;
 }
 //create directory
 
   $targetPropicdir="Uploads/vendors/";

  //contains the path
 $target_image=$targetPropicdir.basename($fileName);
  
  $uploadOk =true;
  $imageFileType = strtolower(pathinfo($target_image,PATHINFO_EXTENSION));
  
  
  //Check if the file is actual image or not
  $check = getimagesize($fileTempName);
  if($check !== false) {
    //echo "File is an image - " . $check["mime"] . ".";
    $uploadOk =true;
  } else {
    echo "File is not an image.";
    $uploadOk = false;
  }

// Check if file already exists


// Check file size
if ($fileSize > 5000000) {
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
//Since this is a profile picture same picture can be  upload and replaced
if (file_exists( $target_image)&&uploadOk&&move_uploaded_file($fileTempName, $target_image)) {
	
	return $target_image;
  
}

//Uploading a file for the first time
  if ($uploadOk&&move_uploaded_file($fileTempName, $target_image)) {

	
	 return $target_image;
      echo "<script>alert('The file '+ htmlspecialchars( basename( $fileName))+ ' has been uploaded.')</script>";
  } else {
    echo "<script>alert(Sorry, there was an error uploading your file.)</script>";
  }


} 





 ?>