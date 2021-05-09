<?php
    // Dynamic Header
    $title = 'Customer Signup'; include("header.php");
?>

<link rel="stylesheet" href="./assets/css/customerSignup.css">

<!-- Niki -->
<!-- Type your code here -->
<section>
    <h1 class="main-title">Hello Customer</h1>
    <br>
    <form action="" method="post">
        <input placeholder="First Name" type="text" name="firstName" id=""><br>
        <input placeholder="Last Name" type="text" name="lastName" id=""><br>
        <input placeholder="Email" type="email" name="email" id=""><br>
        <input placeholder="Password" type="password" name="password" id=""><br>
        <input placeholder="Retype-Password" type="password" name="rpassword" id=""><br>
        <button type="submit">Sign Up</button>
    </form>
    <br>
    <h3>Are you a Vendor?</h3>
    <a href="./vendorSignup.php">Vendor Signup</a>
</section>


<script src="./assets/js/customerSignup.js"></script>

<?php include("footer.php"); ?>