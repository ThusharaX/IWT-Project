
<?php
//BY IT20654962
    // Dynamic Header
    $title = 'Vendor Dashboard'; include("header.php");

 //By IT20654962

  //id=$row[adID]&title=$row[title]&addes=$row[addDescription]&mobile=$row[mobile]&imglocation=$row[addImageLoc]
  $adID=$_GET['id'];
  $adtitle=$_GET['title'];
  $adsDescription=$_GET['addes'];
  $mobile=$_GET['mobile'];
  $imglocation=$_GET['imglocation'];
?>

<div class="alternative">
	<link rel="stylesheet" href="./assets/css/adsInventory.css">
		<link rel="stylesheet" href="./assets/css/vendorNavBar.css">
			<nav id="vnavBar">
				<ul class="vendorNavbar">
					<li>
						<a  href="accountDetails.php">Account details</a>
					</li>
					<li>
						<a class="current " href="adsInventory.php">Ads Inventory</a>
					</li>
					<li>
						<a  href="addCommercialsPage.php">Add advertisement</a>
					</li>
					<li>
						<a href="paymentHistory.php">Payments</a>
					</li>
				</ul>
			</nav>
			<hr>
				<br>
					<h2>Advertisement Inventory</h2>
					
<div class="ads">

 

      
		 <div class='display'>
		 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
             <table border='1px solid #ddd'>";
		      <tr>
			     <td><img src="<?php echo $imglocation ;?>" height='200' width='100%'/></td>
			     <td><input id="image" type="file" name="image"/></td>
			  
			  </tr>
		 
          <tr>
		      <td>
		         <input id="title" type="text" name="title" value="<?php echo $adtitle;?>"/>
		  
		     </td>
		  </tr>			
          <tr>
		      <td>
		         <textarea id="adsDescription" cols="5" rows="5" name="adsDescription "><?php echo htmlspecialchars($adsDescription);?></textarea>
		      </td>
		  </tr>
        
          <tr>
		   <td>
		       <input id="mobile" type="text" name="mobile" value="<?php echo $mobile;?>"/>
		   </td>
		  </tr>
          <tr>
		     <td>
			    <input id="submit" name="save" type="submit"/>
			 </td>
		 </tr>
                  
         <tr>
		  <td>
		   <input id="no" name="no" onclick="window.location.href='adsInventory.php'" type="button"/>
		  </td>
		 
		 </tr>
	
      
		  </table>
		  </form>
		 </div>
    <?php 
	  
	
	
	
	
	     if(isset($_POST['save'])){
			 $
			 
			 
			 
		 }
	
	
	
	
	
	
	
	
	
	
	
	?>


    </div>
</div>
						<!-- Code segment for display Announcements related to vendor ---------------- -->
						<section class="adminAnnouncement">
    <?php
        $today = date("Y-m-d");
        $sql = "SELECT * from Announcement 
                WHERE
                    user_type = 'vendor' AND
                    publish_date = '" . $today . "'
        ";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            echo "
                <div class='announcements'>
                    <h3>Title = ". $row["title"] ."</h3>
                    <h5>Description = ". $row["annDescription"] ."</h5>
                </div>
                ";
            }
        } else {
            echo "
                <div class='announcements'>
                    <h3>No Announcements Today!</h3>
                </div>
                ";
        }
    ?>
						</section>
						<!-- --------------------------------------------------------------------------------- -->
						<section>
							<h1 class="main-title">vendorDashboard Page</h1>
						</section>
						<script src="./assets/js/vendorDashboard.js"></script>

<?php include("footer.php");?>