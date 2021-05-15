<?php
  //Chamath Jayasekara IT20654962

 require 'configure.php';
?>

    
	 <?php include 'header.php'?>
	<link  rel="stylesheet" href="./assets/css/adsInventory.css">
  <!--on this part made by chamath-->
<nav id="vnavBar">
 <ul class="vendorNavbar">
   <li><a href="accountDetails.php">Account details</a></li>

   <li><a href="adsInventory.php">Ads Inventory</a></li>
   <li><a href="addCommercialsPage.php">Add advertisement</a></li>
   <li><a href="paymentHistory.php">Payments</a></li>
 </ul>
  
 </nav>
 <hr>

 <br>
 <h1>Advertisement Inventory</h1>
 
<form method="POST" action="">
   <input  type="submit" name="result" id="View_advertisement" value="View advertisements">

</form>
<div class="ads">
<?php
 if(isset($_POST['result'])){
   global $con;
   $sqlstmt="SELECT *FROM  COMMERCIAL";

   $result=mysqli_query($con,$sqlstmt);
   if($result->num_rows>0){

       while($row=$result->fetch_array()){
		  echo "<div class='display'>";
          echo "<table border='1px solid'>";
		  echo "<tr><td>".'<img src="data:image;base64,'.base64_encode($row['img']).'"height="200" width="100%"/>'."</td></tr>";
		 
          echo "<tr><td>".$row['addTitle']."</td></tr>";			
          echo "<tr><td>".$row['category']."</td></tr>";
         
          echo "<tr><td>".$row['adddes']."</td></tr>";
          echo "<tr><td>".$row['number']."</td></tr>";
          echo "<tr><td>".$row['email']."</td></tr>";          
          echo "<tr><td><a href='www.youtube.com'>Edit</a></td></tr>";
         echo "<tr><td><a href='www.google.com' class='button'>Delete</a></td></tr>";
		  echo "</table>";
		  echo "</div>";
       }
   }
 }
  $con->close();

?>
</div>
</div>
</body>
</html>