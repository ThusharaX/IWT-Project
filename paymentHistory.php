<?php
//BY IT206548962
    // Dynamic Header
    $title = 'Vendor Dashboard'; include("header.php");
	include("./src/vendor/vendorConfig.php");
	$vendorID=$_SESSION["id"];
?>



<link rel="stylesheet" href="./assets/css/paymentHistory.css">
<link rel="stylesheet" href="./assets/css/vendorNavBar.css">
	<nav id="vnavBar">
		<ul class="vendorNavbar">
			<li>
				<a class="link" href="vendorDashboard.php">Account details</a>
			</li>
			<li>
				<a class="link" href="adsInventory.php">Ads Inventory</a>
			</li>
			<li>
				<a class="link" href="addCommercialsPage.php">Add advertisement</a>
			</li>
			<li>
				<a class="link current"   href="paymentHistory.php">Payments</a>
			</li>
		</ul>
	</nav>
	<hr>	
<br>
<h2>Payments</h2>
	<div class="for-font">
	
	<div class="pays">
	
	<table border='1px solid #ddd'>
	  <tr>
	       <th>PaymentID</th>
		   <th>Paid date and time</th>
		   <th>Amount</th>
		   <th>Payment method</th>
		   <th>Payment description</th>
	  </tr>
	
	<?php
	  global $conn;
	  //sql statement to retrieve payment values
	  $sqlstmt="SELECT *
	            FROM  Payment
				WHERE VendorID=$vendorID
				ORDER BY paymentID DESC;";
	  
      if($paymentHistory=mysqli_query($conn,$sqlstmt)){
		     if($paymentHistory->num_rows>0){
				 while($row=$paymentHistory->fetch_assoc()){
					 echo "<tr>";			
		             echo "<td>PV".$row['paymentID']."</td>";
		 
                     echo "<td>".$row['payTimeDate']."</td>";			
                     echo "<td>".$row['amount']."</td>";
         
                    echo "<td>".$row['pay_type']."</td>";
                    echo "<td>".$row['pymntDescription']."</td>";
                    echo "</tr>";			 
				 }
				 
			 }else{
				 echo "No payment records found";
			 }
		  
		  
		  
	  }	else{
		  echo "Error: cannot query because".$conn->error;
	  }
      	  
	  
	
	
	?>
	    </table>
	</div>
	</div>
<?php include "vendorAnnouncementFooter.php"; ?>