<?php 
   //By IT20654962
   // Dynamic Header
   $title = 'Vendor Dashboard';
     include("header.php");
     include("./src/vendor/vendorConfig.php");
     include "accountDetailsFile.php";
  
?>
  
    <link rel="stylesheet" href="./assets/css/accountDetails.css">
	<link rel="stylesheet" href="./assets/css/vendorNavBar.css">
	<nav id="vnavBar">
		<ul class="vendorNavbar">
			<li>
				<a class="links current"  href="vendorDashboard.php">Account details</a>
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
	<br/>
	<h2>
	Account Details
	</h2>
	<div class="acdetails">
	<!--my code-->
	<form method="POST" action="accountDeleteFile.php" id="accFrom"enctype="multipart/form-data">
 
   
	
	<div class="data">
	<table  width="100%" >
	<tr>
		<td rowspan="3">
	  
	  
	  <div class="profilepic">
	  <!--put inside a label,so we can upload a propic by clicking  the  image-->
	<label>
	<!--img src='{$row['addImageLoc']}'-->
	<img src="<?php echo $ImageLoc;?>" height='200' width='200' alt="profilepicture" title="vendorpropic">

	
	
	
    <!--file type has to be converted into characters that html supports unless image will not appear-->
	<input class="visible" type="hidden" id="propicfilebtn" name="propic" value="<?php echo htmlspecialchars($ImageLoc);?>" disabled><br><br>
  </label>
	</div>	  	  
	  </td>					
	</tr>
	<tr>
	  <td colspan="2"></td>
	</tr>
	<tr>
      
   
      <td> <label for="company">Company Name:</label>
    <input class="visible" type="text" id="company" name="company" value="<?php echo  $company;?>" disabled><br><br>

	  
	  
	  </td>
      <td><label for="address">Company addresss:</label>
	 <!--textarea values has to be converted into characters that html supports-->
	 <textarea class="visible" id="address" name="address" cols="45" rows="10" disabled><?php echo htmlspecialchars($address); ?></textarea>

	  
	  
	  </td>
      
  </tr>
  <tr>
     <td rowspan="4" >
	
	 </td>
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
    <label for="lname">Last name:</label>			
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
  <td>
   <input class="visible" type="hidden" id="vendorID" name="vendorID" value="<?php echo $vendorID;?>"><br><br>
  
  </td>
  
  <td> <input type="button" class="accountButtons" name="update" id="update" value="Update">	
     <input type="hidden" class="accountButtons" name="edit" id="edit" value="Edit" onclick="editing()">
	 <input type="hidden" class="accountButtons" name="save" id="save" value="save"></td>
  <td>
	 <input type="hidden" class="accountButtons" name="deleted" id="deleted" value="Delete">
  </td>
  
    
	 
  </tr>
  </div>
  
</table>
		
	</div>
	 
  
 </form>
</div>
	<script type="text/javascript">
	     var update=document.getElementById('update');
		 var edit=document.getElementById('edit');
         var  deleted=document.getElementById('deleted');
         var save=document.getElementById('save');	 
		 var manipProPic=document.getElementById('propicfilebtn');
		 var formAction=document.getElementById('accFrom');
		 var password=document.getElementById('password');
	
	    
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
			 manipProPic.type='file';
			 //change edit button type
			 edit.type='hidden';
			 //change form action
			  formAction.action='accountDetailsSave.php';
			  password.value='';
			 password.required='true';
			//change save button type
			 save.type='submit';
			
		 }
		 	
	</script>

	
	

<?php 
   include "vendorAnnouncementFooter.php";
?>
