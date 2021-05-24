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
	<table border="1" width="100%">
	<tr>
		<td>ABC</td>
		
		<td colspan="2">ABC</td>
	
	</tr>
	<tr>
      <td rowspan="5">
	  
	  
	  <div class="profilepic">
	  <div class="picture">
	
	<!--img src='{$row['addImageLoc']}'-->
	<img src="<?php echo $ImageLoc;?>" height='200' width='200' alt="profilepicture" title="vendorpropic">
	<label for="propic"><?php 	echo htmlspecialchars($username);?></label>
	</div>
    <!--file type has to be converted into characters that html supports unless image will not appear-->
	<input class="visible" type="file" id="propic" name="propic" value="<?php echo htmlspecialchars($ImageLoc);?>" disabled><br><br>
	</div>
	  
	  
	  
	  </td>
     <div class="vendorDetails">
      <td> <label for="company">Company Name:</label>
    <input class="visible" type="text" id="company" name="company" value="<?php echo  $company;?>" disabled><br><br>

	  
	  
	  </td>
      <td><label for="address">Company addresss:</label>
	 <!--textarea values has to be converted into characters that html supports-->
	 <textarea class="visible" id="address" name="address" cols="45" rows="10" disabled><?php echo htmlspecialchars($address); ?></textarea>

	  
	  
	  </td>
      
  </tr>
  <tr>
    <td><label for="username">User name:</label>
    <input class="visible" type="text" id="username" name="username" value="<?php 	echo $username;?>" disabled><br><br>
	</td>
    
  </tr>
	<tr>
		<td>
    <label for="fname">First name:</label>
    <input class="visible" type="text" id="fname" name="fname" value="<?php echo $firstname;?>" disabled><br><br>
</td>
		<td>
    <label class="visible" for="lname">Last name:</label>			
    <input class="visible" type="text" id="lname" name="lname" value="<?php echo  $lastname;?>" disabled><br><br>
  </td>
  </tr>
  	<tr>
		<td>
    <label for="email">Email:</label>
    <input class="visible" type="email" id="email" name="email" value="<?php echo $email;?>"  disabled><br><br>
    	 </td>
		<td>	 
    <label for="password">Password:</label>
	<!--Limits  encrypted password-->
    <input class="visible" type="password" id="password" name="password" value="<?php echo substr($password,0,12);?>" disabled><br><br>
</td>
  </tr>
  <tr>
		<td>
	 <label for="mobile">Mobile Number:</label>
    <input class="visible" type="text" id="mobile" name="mobile" value="<?php echo $mobile;?>" pattern="[1-9]{9}" disabled><br><br>
	
</td>
		
  </tr>
      <div class="profilebtn">
  <tr>
  <td></td>
  <td> <input type="button" name="update" id="update" value="Update">	
     <input type="hidden" name="edit" id="edit" value="Edit" onclick="editing()">
	 <input type="hidden" name="save" id="save" value="save"></td>
  <td>
	 <input type="hidden" name="deleted" id="deleted" value="Delete"></td>
  
    
	 
  </tr>
  </div>
  
</table>
		
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
		 var manipProPic=document.getElementById('propic');
	
	    
		 update.addEventListener('click',()=>{
              //update hidden
                update.type='hidden'; 
			  //edit type button
			    edit.type='button';
		        		 
		    //delete type submit
			    deleted.type='submit';
				deleted.name='delete';
						 
		 })
		 function editing(){
			 //access every element of class visible
			 var inputs=document.getElementsByClassName('visible');
			 for(x in inputs){
				 //enable each input and textarea
				 inputs[x].disabled=false;
			 }
			 //change delete button name 
			 deleted.name='deleted';
			 //change delete button type to hidden
			 deleted.type='hidden';
			 //propic file upload display
			 manipProPic.style.display='block';
			 //change edit button type
			 edit.type='hidden';
			//change save button type
			 save.type='submit';
			
		 }
		 	
	</script>
	<?php
	
	    if(isset($_POST["delete"])){
		  
           //vendorID must be taken as  a session.	  
		   $sqlstatementDel="DELETE FROM Vendor WHERE vendorID=2;";
		   
		   if(mysqli_query($conn,$sqlstatementDel)){
			   //header("Location:vendorSignup.php?userdeleted");
              echo "<script>alert('user deleted')</script>" ;			  
			  
		   }else{
			  echo "Error cannot be deleted user because: ".$conn->error;   
		  }
		   
		   
	     }
      else if(isset($_POST["save"])){
		   //includes  imagechecking function
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
