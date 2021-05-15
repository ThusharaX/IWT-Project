<?php
    // Dynamic Header
    $title = 'Signup'; include("header.php");
    include_once('./src/isloginConfig.src.php');
?>

<link rel="stylesheet" href="./assets/css/signup.css">

<!-- Niki -->
<!-- Type your code here -->
<section>
    <h1 class="main-title">Signup Page</h1>
    <div class="column">
        <div class="row">
            <div class="customer">
                <a href='./customerSignup.php?role=customer'>
                <button type="submit">I am Customer</button></a>
            </div>
            <div class="vendor">
                <a href='./vendorSignup.php?role=vendor'>
                <button type="submit">I am Vendor</button></a>
            </div>
        </div>
    </div>
</section>


<script src="./assets/js/signup.js"></script>

<?php include("footer.php"); ?>





<!-- PopUp
<section>
    <a href="javascript:void(0)" onclick="document.getElementById('popupBox').style.display='block';document.getElementById('popupBackground').style.display='block'">Show PopUp</a>

    <div id="popupBox" class="white_content">

    <h1 style="display:inline-block; float:left">Signup</h1>
        <a href="javascript:void(0)" 
            onclick="document.getElementById('popupBox').style.display='none';document.getElementById('popupBackground').style.display='none'" 
            class="textright close">X</a>
    
        <p style="clear: both"></p>
        <p style="font-size:1.3em">
        
            <br/>
            <a href='./customerSignup.php?role=customer'>
            <button type="submit">I am Customer</button>
            <br/>
            <a href='./vendorSignup.php?role=vendor'>
            <button type="submit">I am Vendor</button>
        </p>
    </div>
    <div id="popupBackground" class="black_overlay"></div>
    
</section> -->