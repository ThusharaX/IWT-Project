<?php
    // Dynamic Header
    $title = 'Vendor Signup'; include("header.php");
?>

<link rel="stylesheet" href="./assets/css/vendorSignup.css">

<!-- Niki -->
<!-- Type your code here -->
<section>
    <h1 class="main-title">Hello Vendor</h1>
    <br>
    <form action="./src/signup.src.php" method="post">
        <input required placeholder="Full Name..." type="text" name="name"><br>
        <input required placeholder="Email..." type="text" name="email"><br>
        <input required placeholder="Username..." type="text" name="uid"><br>
        <input required placeholder="Password..." type="password" name="pwd"><br>
        <input required placeholder="Re-Password..." type="password" name="repwd"><br>
        <input hidden value="vendor" type="text" name="user_type"><br>
        <button type="submit" name="submit">Sign Up</button>
    </form>

    <br>
    <h3>Are you a Customer?</h3>
    <a href="./customerSignup.php">Customer Signup</a>
</section>


<script src="./assets/js/vendorSignup.js"></script>

<?php include("footer.php"); ?>