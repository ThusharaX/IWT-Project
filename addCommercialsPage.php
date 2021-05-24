<?php
//BY IT20654962
    // Dynamic Header
    $title = 'Vendor Dashboard'; include("header.php");
	
?>
<link rel="stylesheet" href="./assets/css/addCommercials.css">

<link rel="stylesheet" href="./assets/css/vendorNavBar.css">
	<nav id="vnavBar">
		<ul class="vendorNavbar">
			<li>
				<a class="link" href="accountDetails.php">Account details</a>
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










	
				<form action="addCommercialsPages.php" onsubmit="return checking();" method="POST" enctype="multipart/form-data" id="formi">
				<div class="whole">
				<div class="container">
                <div class="title">Enter Advertisement Details</div>
				<br/>
					<div class="ads-details">
						<div class="left">
							<h2>
                    Advertisement Details
                            </h2>
							<div class="inputs">
								
								<span class="bk">Advertisement Title</span>
								<input type="text" class="bk" placeholder="" id="title" name="title" required=""/>
								<small id="title_chk_error" class="bk Message">Error message</small>
								<small id="title_chk_success" class="bk Message">Success message</small>
							</div>
							<div class="iinputs">
								<span class="bk">Image</span>
								<input type="file" name="images" accept="image/png, image/jpeg"/>
								<small id="size_matter" class="bk Message">Maximum file size is 2MB</small>
							</div>
							<div class="inputs">
								<span class="bk">Category</span>
								<select name="category" id="categoryID">
									<option value="3">Music</option>
									<option value="Invitation Cards">Invitation Cards</option>
									<option value="Makeup">Makeup</option>
									<option value="2">Catering</option>
									<option value="Flower bokays">Flower bokays</option>
									<option value="Photography">Photography</option>
									<option value="Videography">Videography</option>
									<option value="5">Car rent</option>
									<option value="Venue">Venue</option>
									<option value="4">Dress</option>
								</select>
							</div>
							<div class="inputs">
								<span class="bk">Ads description</span>
								<textarea name="description" id="description" cols="42.5" rows="8" required=""></textarea>
								<small id="description_chk_error" class="bk Message">Error message</small>
								<small id="description_chk_success" class="bk Message">Success message</small>
							</div>
						</div>
						<div class="right">
							<h2>
                        Contact details
                           </h2>
							<div class="cinputs">
								<span class="bk">Mobile number</span>
								<input type="mobile number" name="mobile_number" placeholder="" pattern="[0-9]{10}" required=""/>
							</div>
							
						</div>
					</div>
				<!--email was here-->
						
					</div>
					<div class="payment_display">
						<div class="pay">
							<div id="paymentTitle">Make your payment</div>
							<div class="inputs" id="amountInput">
								<span class="bk">Amount</span>
								<input type="text" name="amount" placeholder="Enter amount" required=""/>
								<small id="amount_chk_error" class="bk Message">Error message</small>
								<small id="amount_chk_success" class="bk Message">Success message</small>
							</div>
							<div class="inputs">
								<span class="bk">Payment Description</span>
								<textarea name="paydescription" id="paydescription" cols="42.5" rows="8" required=""></textarea>
								<small id="paydescription_chk_error" class="bk Message">Error message</small>
								<small id="paydescription_chk_success" class="bk Message">Success message</small>
							</div>
							<div class="inputs">
								<span class="bk">Choose a payment method</span>
								<select name="payment" id="payment">
									<option value="Payhere">Payhere</option>
									<option value="Visa">Visa card</option>
									<option value="Master card">Master card</option>
									<option value="American Express">American Express</option>
									
									<option value="PayPal">PayPal</option>
								</select>
							</div>
						</div>
					</div>
						<div class="sdbutton">
						<div class="button">
							<input type="submit" name="save" id="saved" value="Save">
                    </div>
							<div class="button">
								<input type="reset" id="cancel" value="Reset form">
                    </div>
							</div>
							</div>
					</form>
				<script type="text/javascript" src="./assets/js/addCommercial.js"></script>

<?php include "vendorAnnouncementFooter.php"?>