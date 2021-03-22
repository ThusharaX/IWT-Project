<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
    <title>මගුල</title>
</head>
<body>
<header id="navbar">
    <nav class="navbar-container container">
      <a href="#" class="home-link">
        <div class="navbar-logo"></div>
        මගුල
      </a>
      <button type="button" class="navbar-toggle" aria-label="Open navigation menu">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <div class="navbar-menu detached">
        <ul class="navbar-links">
          <li class="navbar-item"><a class="navbar-link" href="#">About</a></li>
          <li class="navbar-item"><a class="navbar-link" href="#">Contact</a></li>
          <li class="navbar-item register"><a class="navbar-link" href="#">Register</a></li>
          <li class="navbar-item login"><a class="navbar-link" href="#">Login</a></li>
        </ul>
      </div>
    </nav>
</header>

<form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
    <input type="hidden" name="merchant_id" value="1216936">    <!-- Replace your Merchant ID -->
    <input type="hidden" name="return_url" value="http://sample.com/return">
    <input type="hidden" name="cancel_url" value="http://sample.com/cancel">
    <input type="hidden" name="notify_url" value="http://sample.com/notify">  
    <br><br>Item Details<br>
    <input type="text" name="order_id" value="ItemNo12345">
    <input type="text" name="items" value="Door bell wireless"><br>
    <input type="text" name="currency" value="LKR">
    <input type="text" name="amount" value="1000">  
    <br><br>Customer Details<br>
    <input type="text" name="first_name" value="Saman">
    <input type="text" name="last_name" value="Perera"><br>
    <input type="text" name="email" value="samanp@gmail.com">
    <input type="text" name="phone" value="0771234567"><br>
    <input type="text" name="address" value="No.1, Galle Road">
    <input type="text" name="city" value="Colombo">
    <input type="hidden" name="country" value="Sri Lanka"><br><br> 
    <input type="submit" value="Buy Now">   
</form> 

<script src="navbar.js"></script>
</body>
</html>