<?php 
   //By IT20654962
   // Dynamic Header
   $title = 'Vendor Dashboard'; include("header.php");
   include "accountDetailsFile.php";
  
?>
  
    <link rel="stylesheet" href="./assets/css/accountDetails.css">
	<link rel="stylesheet" href="./assets/css/vendorNavBar.css">
	<nav id="vnavBar">
		<ul class="vendorNavbar">
			<li>
				<a class="links current"  href="accountDetails.php">Account details</a>
			</li>
			<li>
				<a class="links"  href="adsInventory.php">Ads Inventory</a>
			</li>
			<li>
				<a class="links"  href="addCommercialsPage.php">Add advertisement</a>
			</li>
			<li>
				<a class="links"   href="paymentHistory.php">Payments</a>
			</li>
		</ul>
	</nav>
	<hr>
	
	<div class="acdetails">
	<!--my code-->
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
  <fieldset>
    <legend>Account Details</legend>
	<div class="data">
	<div class="profilepic">
	<label for="propic">Profile Picture:</label>
	<!--img src='{$row['addImageLoc']}'-->
	<img src="<?php echo $ImageLoc;?>" height='200' width='200' alt="profilepicture" title="vendorpropic">
    <input class="visible" type="file" id="propic" name="propic" value="<?php echo htmlspecialchars($ImageLoc);?>" disabled><br><br>
	</div>
	<div class="vendorDetails">
	 <label for="company">Company Name:</label>
    <input class="visible" type="text" id="company" name="company" value="<?php echo  $company;?>" disabled><br><br>

	<label for="username">User name:</label>
    <input class="visible" type="text" id="username" name="username" value="<?php 	echo $username;?>" disabled><br><br>
	
	
	
    <label for="fname">First name:</label>
    <input class="visible" type="text" id="fname" name="fname" value="<?php echo $firstname;?>" disabled><br><br>

    <label class="visible" for="lname">Last name:</label>			
    <input class="visible" type="text" id="lname" name="lname" value="<?php echo  $lastname;?>" disabled><br><br>
  
    <label for="email">Email:</label>
    <input class="visible" type="email" id="email" name="email" value="<?php echo $email;?>"  disabled><br><br>
    	 
		 
    <label for="password">Password:</label>
    <input class="visible" type="password" id="password" name="password" value="<?php echo substr($password,0,12);?>" disabled><br><br>

	
	 <label for="mobile">Mobile Number:</label>
    <input class="visible" type="text" id="mobile" name="mobile" value="<?php echo $mobile;?>" pattern="[1-9]{9}" disabled><br><br>
	

	 <label for="address">Company addresss:</label>
	 <textarea class="visible" id="address" name="address" cols="45" rows="10" disabled><?php echo htmlspecialchars($address); ?></textarea>

	
    <div class="profilebtn">	
     <input type="button" name="update" id="update" value="Update">	
     <input type="hidden" name="edit" id="edit" value="Edit" onclick="editing()">
	 <input type="hidden" name="save" id="save" value="save">
	 <input type="hidden" name="delete" id="deleted" value="Delete">
	</div>
	</div>
	 </div>
  </fieldset>
 </form>
</div>
	<script type="text/javascript">
	     var update=document.getElementById('update');
		 var edit=document.getElementById('edit');
         var  deleted=document.getElementById('deleted');
         var save=document.getElementById('save');	 
	
	    
		 update.addEventListener('click',()=>{
              //update hidden
                update.type='hidden'; 
			  //edit type button
			    edit.type='button';
		        		 
		    //delete type submit
			    deleted.type='submit';
			 
			 
			 
			 
		 })
		 function editing(){
			 //access every element of class visible
			 var inputs=document.getElementsByClassName('visible');
			 for(x in inputs){
				 //enable each input and textarea
				 inputs[x].disabled=false;
			 }
			 //change delete button name 
			 deleted.name='noname';
			 //change delete button type to hidden
			 deleted.type='hidden';
			 //change edit button type
			 edit.type='hidden';
			//change save button type
			 save.type='submit';
			
		 }
		 	
	</script>
	<?php
	
	    if(isset($_POST["delete"])){
		  
           //vendorID must be taken as  a session.	  
		   $sqlstatementDel="DELETE FROM Vendor WHERE vendorID=1;";
		   
		   if(mysqli_query($conn,$sqlstatementDel)){
			   //header("Location:vendorSignup.php?userdeleted");
              echo "<script>alert('user deleted')</script>" ;			  
			  
		   }else{
			  echo "Error cannot be deleted user because: ".$conn->error;   
		  }
		   
		   
	     }
      else if(isset($_POST["save"])){
		   
		   include "ImageCheckPropic.php";
		   //get updated  details
		   $companyName=$_POST["company"];
		   $userNameUp=$_POST["username"];
		   $firstName=$_POST["fname"];
		   $lastName=$_POST["lname"];
		   $emailNew=$_POST["email"];
		   //encryptingnew password
		   $passwordNew=password_hash($_POST["password"],PASSWORD_DEFAULT);
		   $newMobile=$_POST["mobile"];
		   $companyAddress=$_POST["address"];
		   		   
		   
		   //VendorProPic
		   /*$ImageName=$_FILES["propic"]["name"];
		   $ImageTempName=$_FILES["propic"]["tmp_name"];
		   $ImageSize=$_FILES["propic"]["size"];
		   //explode from punctuation mark
		  // $tempfilext=explode('.',$ImageName);//this is array consist of boht name and type
		   //end() function returns the last element of array strtolower will convert string to lowercase
		  // $fileext=strtolower(end($tempfilext));
		   //alllowed extentions
		  // $allowed=array('jpg','jpeg','png');
		  //in_array($fileext,$allowed
		   $targetPropicdir="Uploads/VendorProPic/";
		   $target_image=$targetPropicdir.basename($ImageName);
		  // echo $target_image;
		   if(true){
			     if($ImageSize<2000000){
					 
					  move_uploaded_file($ImageTempName,$target_image);
					 
				 }else{
					 echo "Image is too big";
				 }
			   			   			   
		   }else{
			   echo "Image type is not allowed";
		   }*/
		  //define(name, value, case-insensitive)
	       $target_image=imageChecking("propic");
		  		  		   
$sqlstatement="Update Vendor
               SET  v_username='$userNameUp',v_imgLoc='$target_image',v_fname='$firstName',
			   v_lname='$lastName',v_password='$passwordNew',v_mobile=$newMobile,v_address='$companyAddress',
			   v_company='$companyName',v_email='$emailNew'
               WHERE vendorID=3;";						  
		   if(mysqli_query($conn,$sqlstatement)){
			  
			  echo "<script>alert('Updated')</script>";
			  
			
		   }else{
			   echo "Error cannot update vendor because: ".$conn->error;
		   }		   
	   }	
	
	?>
	
	
	
	

<?php 
   include "vendorAnnouncementFooter.php";
?>
