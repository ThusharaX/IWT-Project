<?php
//BY IT20654962
    // Dynamic Header
    $title = 'Vendor Dashboard'; include("header.php");
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
<?php
 //if(isset($_POST['result'])){
   global $conn;
   //statement to retrieve ad ids which belongs to vendorID=3;
   $sqlstmt="SELECT *
             FROM  Advertisement_payment 
			 WHERE status=1 AND  vendorID=3";			             			
//vendorID, adID

  if($result=mysqli_query($conn,$sqlstmt)){
      if($result->num_rows>0){

       while($row=$result->fetch_assoc()){
		  echo "<div class='display'>";
          echo "<table border='1px solid #ddd'>";
		  echo "<tr><td>"."<img src='{$row['addImageLoc']}' height='200' width='100%'/>"."</td></tr>";
		 
          echo "<tr><td>".$row['title']."</td></tr>";			
          echo "<tr><td>".$row['addDescription']."</td></tr>";
         // $row['adID'];
          echo "<tr><td>".$row['publishDateTime']."</td></tr>";
          echo "<tr><td>".$row['mobile']."</td></tr>";
                  
         echo "<tr><td><a class='update'id='edit' href='adsEdit.php?id=$row[adID]&title=$row[title]&addes=$row[addDescription]&mobile=$row[mobile]&imglocation=$row[addImageLoc]'>Edit</a></td></tr>";
		  //no need of quotations in the url adID and  others
         echo "<tr><td><a class='update' id='delete' href='adsDelete.php?id=$row[adID]'   class='button'>Delete</a></td></tr>";
		  echo "</table>";
		  echo "</div>";
       }
   }else{
	   echo "No advertisements published";
   }
 }else{
	 echo "Error: ".$conn->error;
 }
 
// }
  //$conn->close();

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