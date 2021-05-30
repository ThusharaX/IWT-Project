<?php

    // Dynamic Header
    $title = 'Vendor Dashboard'; include("header.php");
	include("./src/vendor/vendorConfig.php");
	
	//BY IT20654962
	//arrays to store catIDs and prices
	$catIDarray=array();
    $catPricearray=array();
	//sql statement to retrieve carID and price
	$sqlCatstatement="SELECT catID,price
	                  FROM  Category";
	//excuting 	$sqlCatstatement statement				  
    if($catIDandPrice=mysqli_query($conn,$sqlCatstatement)){
		//check whether the number of rows are more than zero
		 if($catIDandPrice->num_rows>0){
			 //storing fetched data feild's values inside $row associative array
		    while($row=$catIDandPrice->fetch_assoc()){
				//push IDs inside $catIDarray array
				array_push($catIDarray,$row['catID']);
			   //push prices inside $catIDarray array
				array_push($catPricearray,$row['price']);
				
			}
		   		
		 }else{
			 //if number of rows are zero this will be excuted
			 echo "No categories";
		 }
		
		
	}else{
		//if excuting fails,this will print the error
		echo "Error cat retrival:".$conn->error;
	}
    	
	
?>

<script>
     //json_encode() function will get the array values
    var catIDarray = <?php echo json_encode($catIDarray); ?>;
    var catPricearray= <?php echo json_encode($catPricearray); ?>;

  function amoutAutoAssign(value){
	  var catAmount=document.getElementById('catPrice');
   	 for(var i=1;i<catIDarray.length;i++){
		//if value equals to categoryID if state will be true
	   if(value==catIDarray[i]){
		   //correspond price will be assign to the input value(catPricearray[i] value)
		  catAmount.value=parseInt(catPricearray[i]);
	      }
   	  }  	   	  	  
  }
</script>
<link rel="stylesheet" href="./assets/css/addCommercials.css">

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
				<a class="link current"  href="addCommercialsPage.php">Add advertisement</a>
			</li>
			<li>
				<a class="link" href="paymentHistory.php">Payments</a>
			</li>
		</ul>
	</nav>
	<hr>	
<br>
               <h2>
                  Add  Advertisement Details
                            </h2>


	
				<form action="addCommercialsPages.php"  method="POST" enctype="multipart/form-data" id="formi">
				<div class="whole">
				<div class="container">
                <div class="title">Enter Advertisement Details</div>
				
					<div class="ads-details">
					
						<div class="left">
							<h2>
                        Advertisement details
                           </h2>
							<div class="inputs">
								
								<span class="bk">Advertisement Title</span>
								<input type="text" class="bk" placeholder="Athula catering" id="title" name="title" required=""/>
								<small id="title_chk_error" class="bk Message">Error message</small>
								<small id="title_chk_success" class="bk Message">Success message</small>
							</div>
							<div class="iinputs">
								<span class="bk">Only one Image</span>
								<label>
								<img src="./assets/img/adsIcon.png" alt="adIcon" width="100px">
								<input type="file" name="images" accept="image/png, image/jpeg" id="adsfileImage"/>
								</label>
							
							</div>
							<div class="inputs ads-margin">
								<span class="bk">Ads description</span>
								<textarea name="description" id="description" cols="42.5" placeholder="eg:-our new catrings"rows="8" required=""></textarea>
								<small id="description_chk_error" class="bk Message">Error message</small>
								<small id="description_chk_success" class="bk Message">Success message</small>
						</div>
							
						</div>
						<div class="right">
						
						<div class="inputs">
								<span class="bk">Category</span>
								<!--this.value contains the value that the selected option has. -->
								<select name="category" id="categoryID" onchange=" amoutAutoAssign(this.value)">
								    
									<option value="2">Catering</option>
									<option value="3">Dj Music</option>
									<option value="4">Wedding Dress</option>
									<option value="5">Cosmetics</option>
									<option value="6">Wedding Vehicle</option>
									<option value="7">Flower</option>
									<option value="8">Videography</option>
									<option value="9">Wedding Cards</option>
									<option value="10">Wedding Halls</option>
									<option value="11">Photography</option>
								</select>
						</div>
							<h2>
                        Contact details
                           </h2>
							<div class="cinputs">
								<span class="bk">Mobile number</span>
								<input type="mobile number" name="mobile_number" placeholder="" pattern="[0-9]{10}" required=""/>
							</div>
							<h2>
                   Payment Details
                            </h2>
							
														<div class="inputs" id="amountInput">
								<span class="bk">Amount</span>
								<input type="text" id="catPrice" name="amount" placeholder="Enter amount" maxlength = "4"required="" pattern="[0-9]+"/>
								
							</div>
						
                             
														<div class="inputs" id="payment-margin">
								<span class="bk">Choose a payment method</span>
								<select name="payment" id="payment">
									<option value="Payhere">Payhere</option>
									<option value="Visa">Visa card</option>
									<option value="Master card">Master card</option>
									<option value="American Express">American Express</option>
									
									<option value="PayPal">PayPal</option>
								</select>
							</div>
						
							
							
							<!--right div end here-->
						</div>
						
						

					<div class="payment-details">	
								
											
			
						<div class="payment-left">	

														<div class="inputs">
								<span class="bk">Payment Description</span>
								<textarea name="paydescription" id="paydescription" cols="42.5" rows="8" required=""></textarea>
								<small id="paydescription_chk_error" class="bk Message">Appropriate payment description</small>
								<small id="paydescription_chk_success" class="bk Message">InappropriateSuccess message</small>
							</div>
							
							<input id="vendorID" type="hidden" name="vendorID" value="<?php  echo $_SESSION["id"] ;?>"/>
							
							
							
							
							
							
								<div class="sdbutton">
						<div class="button">
							<input type="button" name="save" id="saved" value="Save" onclick="checking()">
                    </div>
							<div class="button">
								<input type="reset" id="reset" value="Reset form">
                    </div>
					<!--sdbutton div ends here-->
							</div>
							
							
							
						</div>



						
						</div>
						
						
						
						
						
						
						
						
						<!--account details div end here-->
					</div>
					
				<!--container div end here-->	
			</div>
			<!--whole div end here-->	
			</div>
	</form>
				
						
					
					
					

				<script type="text/javascript" src="./assets/js/addCommercial.js"></script>

<?php include "vendorAnnouncementFooter.php"?>