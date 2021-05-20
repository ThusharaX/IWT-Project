<?php
    // Dynamic Header
    $title = 'Log in'; include("header.php");
    include_once('./src/isloginConfig.src.php');
?>

<link rel="stylesheet" href="./assets/css/login.css">

<!-- Niki -->
<!-- Type your code here -->
<section class="m-container">
    <h1 class="main-title">LOG IN</h1>
    <div class="m-types">
            <div class="m-type">
                <img src="assets/images/customerlogin (1).png" alt="Customer">
                <a href='./customer-login.php'>
                    <button class="m-btn1">I am Customer</button>
                </a>
            </div>
            <div class="m-type">
                <img src="assets/images/vendorlogin.png" alt="Vendor">
                <a href='./vendor-login.php'>
                    <button class="m-btn2">I am Vendor</button>
                </a>
            </div>
    </div>
</section>


<script src="./assets/js/login.js"></script>

<?php include("footer.php"); ?>