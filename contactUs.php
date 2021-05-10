<?php
    // Dynamic Header
    $title = 'Contact Us'; include("header.php");
?>

<link rel="stylesheet" href="./assets/css/contactUs.css">

<!-- Pamodya -->
<!-- Type your code here -->
<a href="home.html">Home ></a>Contact us
<div class="main">
 <div class="slider">
     
    <br><h1 class="main-title" id="mtitle">Reach Our Team </h1>
	<h2 class="sub-title" id="stitle">We love questions and feedback .we're always happy to help!<br>Here are some ways to contact us.</h2></div>
	
	
	
<div class="groupbox1">
	<h3>Contact Customer Support</h3>
	<h4>We are waiting to help you........<br><br>Talk with our team to discover how our service can work best for you.</h4>
	<button class="btn" id ="btn1"  type="button" > <img src="./assets/images/phone.png" class="icon" > CALL +9477 46567937 </button> 
	</div>
	          


<fieldset class="groupbox2" id="gbox2">

<legend>Head Branch</legend>

<ul type ="none" class ="info">
<li>
<span><img src="./assets/images/locate.png" class="icon" ></span>
<span>No 177, Kandy Road,Malabe,<br>Colombo,Sri Lanka</br></span>
</li>
<br>
<li><span><img src="./assets/images/mail.png" class="icon" ></span> 
<span>mywedding@company.lk</span><br>
</li>
<br><button class="btn" id ="btn1"  type="button" >  <img src="./assets/images/phone.png" class="icon" > CALL +9477 46567937 </button> 
</fieldset>
	          

<fieldset class="groupbox3" id="gbox3">

<legend>Connect With</legend><br>
<img src="./assets/images/facebook.png" class="icon ">
<a href="www.facebook.com"> www.facebook.com/Mywedding.lk</a><br><br>
<img src= "./assets/images/viber.png" class="icon2" alt="">
+9477 4656793<br><br>
<img src ="./assets/images/app.png" class="icon" >+9477 46567937
</fieldset>


  
  <form class ="form"  method="post" action="" onsubmit ="return validate()" >
    
    <label for="name">*Name</label><br>
    <input type="text" id="name" name="name" placeholder="Your name"><br><br>

    <label for="Email">*Email</label><br>
    <input type="text" id="email" name="email" placeholder="Your Email" pattern="[a-zA-z0-9._%+-]+@[a-z0-9._]+\.2,3}"><br><br>

	<label for="phone">*Mobile Number</label> <br>
	<input type="text"  id="mobile" name="mobile" placeholder="Your phone number"  pattern="[0-9]{10}"><br><br>
    
    <label for="subject">*Comments</label><br>
    <textarea id="subject" name="subject" placeholder="Type your comments here..." style="height:300px"></textarea><br>

    <button type ="submit" class="btn">SUBMIT</button>
	
	

  </form>

</div>


<script src="./assets/js/contactUs.js"></script>

<?php include("footer.php"); ?>
