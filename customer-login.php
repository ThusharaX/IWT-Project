<?php
    // Dynamic Header
    $title = 'Customer Login'; include("header.php");

    // isLogin
    include_once('./src/isloginConfig.src.php');
?>

<!-- CSS -->
<link rel="stylesheet" href="./assets/css/customer-login.css" />

<!-- Niki -->
<!-- Type your code here -->
<section class="lg-container">
  <div class="login">
    <h1 class="main-title"><u>Customer</u> Log In</h1>
    <div class="login-form">
      <form action="./src/login.src.php" method="post">
        <input type="hidden" name="user_type" id="users" value="customer">
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
      <h3>Are you a Vendor?</h3>
      <a class="formlink1" href="./vendor-login.php">Vendor Login</a>
      <p>Not a Member yet? <a href="signup.php" class = "formlink2" >Register Now!</a></p>
    </div>
  </div>
  <div class="bg-image">
    <img src="assets/img/customerlogin1.png" alt="">
  </div>
</section>

<script src="./assets/js/login.js"></script>

<?php include("footer.php"); ?>
