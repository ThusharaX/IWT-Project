<?php
    // Dynamic Header
    $title = 'Vendor Login'; include("header.php");
    include_once('./src/isloginConfig.src.php');
?>

<link rel="stylesheet" href="./assets/css/vendor-login.css">

<!-- Niki -->
<!-- Type your code here -->
<section class="lg-container">
  <div class="login">
    <h1 class="main-title"><u>Vendor</u> Log In</h1>
    <div class="login-form">
      <form action="./src/login.src.php" method="post">
        <input type="hidden" name="user_type" id="users" value="vendor">
        <input
          required
          placeholder="Username/Email..."
          type="text"
          name="user"
        />
        <input
          required
          placeholder="Password..."
          type="password"
          name="pwd"
        />
        <div class="btn-div">
          <button class="submit-btn" type="submit" name="submit">
            Log In
          </button>
        </div>
      </form>
    </div>
    <div class="changeform">
      <h3>Are you a Customer?</h3>
      <a class = "formlink1" href="./customer-login.php">Customer Login</a>
      <p class = "reg">Not a Member yet? <a href="signup.php" class = "formlink2" >Register Now!</a></p>
    </div>
  </div>
  <div class="bg-image">
    <img src="assets/img/vendorlogin1.png" alt="">
  </div>
</section>

<script src="./assets/js/login.js"></script>

<?php include("footer.php"); ?>