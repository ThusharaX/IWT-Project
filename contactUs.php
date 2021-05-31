<!--IT20664558 D.M.P.D.Daundasekara-->
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Ranhuya - ContactUs</title>
<?php include("header.php"); ?> 


</head>

 <link rel="stylesheet" href="./assets/css/contactUs.css">
	
	<body>
 <div class="slider">
     
    <br><h1 class="main-title" id="mtitle">Reach Our Team </h1>
	<h2 class="sub-title" id="stitle">We love questions and feedback .we're always happy to help!<br>Here are some ways to contact us.</h2></div>
	

<section class="grid">	
<div class="groupbox1">
	<h3>Contact Customer Support</h3>
	<h4>We are waiting to help you........
	<br><br>
    Talk with our team to discover how our service can work best for you.
    </h4>
	<button class="btn" id ="btn1"  type="button" > <img src="./assets/img/search/phone.png" class="icon" /> CALL +9477 46567937
	 </button> 
</div>
	          

<div class="groupbox2" id="gbox2">

<legend>Head Branch</legend>

<ul type ="none" class ="info">
<li>
<span><img src="./assets/img/search/locate.png" class="icon" ></span>
<span>No 177, Kandy Road,Malabe,<br>Colombo,Sri Lanka</br></span>
</li>
<br>
<li>
	<span>
		 <img src="./assets/img/search/mail.png" class="icon" >
	</span> 
     <span>
     	    mywedding@company.lk
     </span>
     <br>
</li>
</ul>
<br>
       <button class="btn" id ="btn1"  type="button" > 
        <img src="./assets/img/search/phone.png" class="icon" > CALL +9477 46567937
         </button> 
</div>
	          

<div class="groupbox3" id="gbox3">

<legend>Connect With</legend>
<br>
<img src="./assets/img/search/facebook.png" class="icon ">
<a href="www.facebook.com"> www.facebook.com/Mywedding.lk</a>
<br><br>
<img src= "./assets/img/search/viber.png" class="icon2" alt="">
+9477 4656793
<br><br>

<img src ="./assets/img/search/app.png" class="icon" >
+9477 46567937
</div>


<div class=form1> 
  <form class ="form"  method="post" action=""  onsubmit="return validateForm();">
    
    <label for="name">*Name</label><br>
    <input type="text" id="name" name="name" placeholder="Your name" ><br><br>

    <label for="Email">*Email</label><br>
    <input type="text" id="email" name="email" placeholder="Your Email"  ><br><br>
	<small></small>


	<label for="phone">*Mobile Number</label> <br>
	<input type="text"  id="mobile" name="mobile" placeholder="Your phone number"  pattern="[0-9]{10}" ><br><br>
    
    <label for="subject">*Messege</label><br>
    <textarea id="message" name="message" placeholder="Type your Messege here..." style="height:300px" ></textarea><br>

    <input type="submit" class="btn" name="Submit" value="SUBMIT"/>

	

  </form>

</div>
</section>

?>



<?php

	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$message = $_POST['message'];
		
		

//  connect database
		include_once("./src/dbh.php");


				
		// Insert user data into table
		$result = mysqli_query($conn, "INSERT INTO contactUs(name,email,mobile,message) VALUES('$name','$email','$mobile','$message')");
		
		
      // Show message when data added successfully
		echo "<div class='done'>Thank you!! Form submited successfully..We will contact you soon..</div>";
		}
		?>
	
	<script src="./assets/js/contactUs.js"></script>

     <?php include("footer.php"); ?>







