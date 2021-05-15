<?php
   //Chamath Jayasekara IT20654962
 // $password=GET["password"];
  
  //this works
  ini_set('mysql.connection_timeout',300);
  ini_set('default_socket_timeout',300);  
  
?>


  <?php include 'header.php'; ?>
    <link rel="stylesheet" href="./assets/css/addCommercials.css">
  <!--This part is done by IT20654962-->
  <nav id="vnavBar">
 <ul class="vendorNavbar">
   <li><a href="accountDetails.php">Account details</a></li>

   <li><a href="adsInventory.php">Ads Inventory</a></li>
   <li><a href="addCommercialsPage.php">Add advertisement</a></li>
   <li><a href="paymentHistory.php">Payments</a></li>
 </ul>
  
 </nav>
 <hr>
 <div class="whole">
    <div class="container">

        <div class="title">Add new advertisement</div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" onsubmit="return checking();" method="POST" enctype="multipart/form-data" id="formi">

            <div class="ads-details">
			
			
			<div class="left">
                <h3>
                    Advertisement Details
                </h3>
                <div class="inputs">
                    <small id="insertSuccess" class="bk"></small>
                    <span class="bk">Advertisement Title</span>
                    <input type="text" class="bk" placeholder="" id="title" name="title" required="" />
					<small id="title_chk_error" class="bk">Error message</small>
					<small id="title_chk_success" class="bk">Success message</small>
                </div>
                <div class="iinputs">

                    <span class="bk">Image</span>
                    <input type="file" name="images" accept="image/png, image/jpeg" />
                </div>
                <div class="inputs">

                    <span class="bk">Category</span>
                     <select name="category" id="categoryID">
					    <option value="Dj">Dj Music</option>
						<option value="Invitation Cards">Invitation Cards</option>
						<option value="Makeup">Makeup</option>
				        <option value="Catering">Catering</option>
					    <option value="Flower bokays">Flower bokays</option>
					    <option value="Photography">Photography</option>
					    <option value="Videography">Videography</option>
						<option value="Wedding vehicle rental">Wedding vehicle rental</option>
						<option value="Venue">Venue</option>
						<option value="Wedding dresses">Wedding dresses</option>
					 </select>
				
                </div>

                <div class="inputs">

                    <span class="bk">Ads description</span>
                    <textarea name="description" id="description" cols="42.5" rows="8" required=""></textarea>
                    <small id="description_chk_error" class="bk">Error message</small>
                    <small id="description_chk_success" class="bk">Success message</small>					
			   </div>
			   
			  </div> 
                
				<div class="right"> 
                    <h3>
                        Contact details
                    </h3>
                    <div class="cinputs">

                        <span class="bk">Mobile number</span>
                        <input type="mobile number" name="mobile_number" placeholder="" pattern="[0-9]{10}" required="" />
                    </div>
                    <div class="cinputs">

                        <span class="bk">Email</span>
                        <input type="email" class="bk" id="email" name="email" placeholder="abc@mail.com" pattern="[a-z0-9._%+-]+@[a-z0-9._]+\.[a-z]{2,3}" required="" />
                     <small id="email_chk_error" class="bk">Error message</small> 
                     <small id="email_chk_success" class="bk">Success message</small>  					 
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
   	
			

        </form>
    </div>
	<div class="category_display">
	        		<div class="pay">		            
	                  <h3>Make your payment</h3>
      
	       <div  class="amount">
		   <input type="text" placeholder="Enter amount"/>
	       </div>    
           <div id="paydes">
             <textarea name="paydescription" id="paydescription" cols="42.5" rows="8" required=""></textarea>
		   </div>	
	    <small id="description_chk_error" class="bk">Error message</small>
             <small id="description_chk_success" class="bk">Success message</small>			   
		   <div class="method">
		   <select name="payment" id="payment">	 
	       <option value="Pay_here">Payhere</option>
	       <option value="Visa">Visa</option>
		   <option value="PayPal">PayPal</option>
		   </select>
		   </div>
	
          </div>
	  
	 
	</div>
	</div>
<?php  
 if(isset($_POST['save'])){
  require 'configure.php';
  
  $mobile_number = $_POST['mobile_number'];
  $email = $_POST['email']; 
  $description = $_POST['description']; 
  $title = $_POST['title'];
  $category = $_POST['category'];
  
  
  /* 
     
     $stmt="select VID from vendor where password='$password'"
     $con->query($stmt)
      
  */
  $image = addslashes(file_get_contents($_FILES["images"]["tmp_name"]));
  $sqlstm="INSERT INTO commercial VALUES('','$title', '$category','$image','$description','$mobile_number','$email')";
  if($con->query($sqlstm)){
	  	     			   
			  
	  
  }else{
	 echo "Error : ".$con->error;  
  }
    $con->close();
 }



?>
    
  
</div>  
<script type="text/javascript" src="./assets/js/addCommercial.js"></script>
 

   
</body>

</html>