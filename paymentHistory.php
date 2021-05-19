<?php
//BY IT206548962
    // Dynamic Header
    $title = 'Vendor Dashboard'; include("header.php");
?>



<link rel="stylesheet" href="./assets/css/paymentHistory.css">
<link rel="stylesheet" href="./assets/css/vendorNavBar.css">
	<nav id="vnavBar">
		<ul class="vendorNavbar">
			<li>
				<a href="accountDetails.php">Account details</a>
			</li>
			<li>
				<a href="adsInventory.php">Ads Inventory</a>
			</li>
			<li>
				<a href="addCommercialsPage.php">Add advertisement</a>
			</li>
			<li>
				<a class="current"   href="paymentHistory.php">Payments</a>
			</li>
		</ul>
	</nav>
	<hr>	


















	
	
	<H2>Payments</H2>
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
	            FROM  Advertisement_payment
				WHERE VendorID=3;";
	  
      if($paymentHistory=mysqli_query($conn,$sqlstmt)){
		     if($paymentHistory->num_rows>0){
				 while($row=$paymentHistory->fetch_assoc()){
					 echo "<tr>";			
		             echo "<td>".$row['paymentID']."</td>";
		 
                     echo "<<td>".$row['publishDateTime']."</td>";			
                     echo "<td>".$row['amount']."</td>";
         
                    echo "<td>".$row['pay_type']."</td>";
                    echo "<td>0".$row['pymntDescription']."</td>";
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
<?php include "vendorAnnouncementFooter.php"; ?>