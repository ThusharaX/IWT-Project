<?php 
function imageChecking($Filefieldname){
 //assigning the name of the file to a variable
  $fileName=$_FILES[$Filefieldname]["name"];
 //assigning the size of the file to a variable
 $fileSize=$_FILES[$Filefieldname]["size"];
 
 
 //Assigning temporary name to a variable
 $fileTempName=$_FILES[$Filefieldname]["tmp_name"];  
 
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
	    return $target_file;
    echo "The file ". htmlspecialchars( basename( $fileName)). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }


} 



?>