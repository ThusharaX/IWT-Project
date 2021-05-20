<?php
    // Dynamic Header
    $title = 'Vendor Signup'; include("header.php");
    // is Logged in?
    include("./src/isloginConfig.src.php")
?>

<link rel="stylesheet" href="./assets/css/vendorSignup.css">

<!-- Niki -->
<!-- Type your code here -->
<section class="su-container">
  <div class="signup">
    <h1 class="main-title">Create an <u>Vendor</u> account</h1>
    <div class="signup-form">
      <form action="./src/vendor/vendorSignup.src.php" method="post">
        <div class="form-row">
          <input
            required
            placeholder="First Name..."
            type="text"
            name="fname"
          />
          <input required placeholder="Last Name..." type="text" name="lname" />
        </div>
        <input required placeholder="Email..." type="text" name="email" />
        <input required placeholder="Username..." type="text" name="user" />
        <input required placeholder="Password..." type="password" name="pwd" />
        <input
          required
          placeholder="Re-Password..."
          type="password"
          name="repwd"
        />
        <!-- <input hidden value="customer" type="text" name="user_type"><br> -->
        <div class="btn-div">
          <button class="submit-btn" type="submit" name="submit">
            Sign Up
          </button>
        </div>
      </form>
    </div>
    <div class="changeform">
        <h3>Are you a Customer?</h3>
        <a href="./customerSignup.php">Customer Signup</a>
        <p>Already a member ? <a href="login.php">Log In!</a></p>
    </div>
  </div>
  <div class="vbgImage">
    <img src="assets/images/signupvender-bg.jpg"" alt="Vendor">
  </div>
</section>


<script src="./assets/js/vendorSignup.js"></script>

<?php include("footer.php"); ?>