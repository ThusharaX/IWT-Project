 
<?php
	// Dynamic Header
	$title = 'Make Payment'; include("header.php");
	// Check if user is an vendor (commented for now)
	// include("./src/vendor/vendorConfig.php");

	//ses


?>

<link  rel="stylesheet" href="./assets/css/makePayment.css">
	
	
	<div class="only">
	          <h1>Make your payment</h1>
      <form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	       <div  class="amount">
		   <input type="text" placeholder="Enter amount"/>
	       </div>      
		   <div class="method">
		   <select name="payment" id="payment"  >	 
	       <option value="Pay_here">Payhere</option>
	       <option value="Visa">Visa</option>
		   <option value="PayPal">PayPal</option>
		   </select>
		   </div>
           
		   <input type="submit" id="paybtn" name="submit" value="Pay"/>	 
	 
	 
	 </form>
	   

    </div> 

	
<?php include("footer.php"); ?>