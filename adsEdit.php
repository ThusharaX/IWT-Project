<?php
 $title = 'Vendor Dashboard'; include("header.php");
 	
	     if(isset($_POST['save'])){
			 // $target_file
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
            		 
			 $sqlstmt="UPDATE Advertisement_payment
 			           SET title='$title',addDescription='$adsDescription',mobile=$mobile,addImageLoc='$target_file'
					   WHERE adID=$adID;";
			 if(mysqli_query($conn,$sqlstmt)){
				 header("Location:adsInventory.php?EditedSuccessfully");
			 }else{
				 echo "Error : ".$conn->error;
			 }			 
		 }
		
 ?>
 <?php
  $adID=$_GET['id'];
  $adtitle=$_GET['title'];
  $adsDescription=$_GET['addes'];
  $mobile=$_GET['mobile'];
  $imglocation=$_GET['imglocation'];
//BY IT20654962
    // Dynamic Header
   
   
 //By IT20654962

  //id=$row[adID]&title=$row[title]&addes=$row[addDescription]&mobile=$row[mobile]&imglocation=$row[addImageLoc]

?>

<div class="alternative">
	<link rel="stylesheet" href="./assets/css/adsInventory.css">
	<link rel="stylesheet" href="./assets/css/adsEdit.css">
	<link rel="stylesheet" href="./assets/css/vendorNavBar.css">
	<nav id="vnavBar">
		<ul class="vendorNavbar">
			<li>
				<a href="accountDetails.php">Account details</a>
			</li>
			<li>
				<a class="current" href="adsInventory.php">Ads Inventory</a>
			</li>
			<li>
				<a href="addCommercialsPage.php">Add advertisement</a>
			</li>
			<li>
				<a href="paymentHistory.php">Payments</a>
			</li>
		</ul>
	</nav>
	<hr>
		
				<br/>
					<h2>Edit Your advertisement</h2>
					
<div class="ads">
       <div class='display'>
		 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
             <table border='1px solid #ddd'>
		      <tr>
			     <td><img src="<?php echo $imglocation;?>" height='200' width='100%'/><br/>
			     <input id="image" type="file" name="images"/></td>
			  
			  </tr>
		 
          <tr>
		      <td>
		         <input id="title" type="text" name="title" value="<?php echo $adtitle;?>"/>
		  
		     </td>
		  </tr>			
          <tr>
		      <td>
		         <textarea id="adsDescription" cols="5" rows="7" name="adsDescription "><?php echo htmlspecialchars($adsDescription);?></textarea>
		      </td>
		  </tr>
        
          <tr>
		   <td>
		       <input id="mobile" type="text" name="mobile" value="<?php echo $mobile;?>"/>
		   </td>
		  </tr>
          <tr>
		     <td>
			    <input id="submit" name="save" type="submit" value="save" />
			 </td>
		 </tr>
                  
         <tr>
		  <td>
		   <input id="no" name="no" onclick="window.location.href='adsInventory.php'" width='100%' value="No" type="button"/>
		  </td>
		 
		 </tr>
	
      
		  </table>
		  </form>
		 </div>
    <?php 
	  	
		
	?>


    </div>
</div>
<?php include "vendorAnnouncementFooter.php"; ?>