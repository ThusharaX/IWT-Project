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

	
	 <label for="mobile">Mobile name:</label>
    <input class="visible" type="text" id="mobile" name="mobile" value="<?php echo $mobile;?>" pattern="[1-9]{9}" disabled><br><br>
	

	 <label for="address">Company addresss:</label>
	 <textarea class="visible" id="address" name="address" cols="45" rows="10" disabled><?php echo htmlspecialchars($address); ?></textarea>

	
    <div class="profilebtn">	
    <input type="button" name="update" id="update" value="Update" onclick="window.location.href='accountDetailsDelete.php'">
	
	</div>
	</div>
	 </div>
  </fieldset>
 </form>
</div>
	
	
<?php 
   include "vendorAnnouncementFooter.php";
?>
