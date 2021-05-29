<?php
//IT20654962
  $title = 'Vendor Dashboard'; include("header.php");
  include("./src/vendor/vendorConfig.php");
  //getting ad details from the  url
  $adID=$_GET['id'];
  $adtitle=$_GET['title'];
  $adsDescription=$_GET['addes'];
  $mobile=$_GET['mobile'];
  $imglocation=$_GET['imglocation'];
?>

<div class="alternative">
	<link rel="stylesheet" href="./assets/css/adsInventory.css">
	<link rel="stylesheet" href="./assets/css/adsEdit.css">
	<link rel="stylesheet" href="./assets/css/vendorNavBar.css">
	<nav id="vnavBar">
		<ul class="vendorNavbar">
			<li>
				<a  href="vendorDashboard.php">Account details</a>
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
		 <form action="adsEditandSave.php" method="POST" enctype="multipart/form-data">
             <table border='1px solid #ddd'>
			  
		      <tr>
			     <input type="hidden" name="adID" value="<?php echo $adID;?>">  
			     <td id="alignment" rowspan=6><img src="<?php echo $imglocation;?>" height='200' width='100%'/><br/>
			     
				 <input id="imageUpFile" type="file" name="images"/>
				 
				 </td>
			  
			  
		      </tr>
          
		      
			  <tr>
		       <td>  <input id="title" type="text" name="title" value="<?php echo $adtitle;?>"/></td>
		      </tr> 
		     
		  		
          
		  <tr>    
		     <td><textarea id="adsDescription" cols="5" rows="7" name="adsDescription"><?php echo htmlspecialchars($adsDescription);?></textarea> </td>
		     
		</tr>  
        
          
	<tr>	   
		       <td> <input id="mobile" type="text" name="mobile" value="<?php echo $mobile;?>"/> </td>
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


    </div>
</div>
<?php include "vendorAnnouncementFooter.php"; ?>