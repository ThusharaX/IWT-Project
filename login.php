<?php
    // Dynamic Header
    $title = 'Login'; include_once("header.php");
    include_once('./src/isloginConfig.src.php');
?>

<link rel="stylesheet" href="./assets/css/login.css">

<!-- Niki -->
<!-- Type your code here -->
<section class="login_section">

    <body background= "assets/img/loginBackground.jpg" class = "background"> 
    <!-- <body background= "assets/img/loginBackground.jpg" class = "background">  -->

    <div class = "loginbox">
        <h1 class="log_in_to_your_acc"><b>LOG IN TO YOUR ACCOUNT</b></h1>
        <p class = "reg">Not a Member yet? <a href="signup.php" class = "reg1" >Register Now!</a></p>
        <br>
        <a href = "https://www.facebook.com/" > <img src = "assets/img/fb.png"  class = "fblogo" > </a>
        <a href = "https://myaccount.google.com/"> <img src = "assets/img/google.png" class = "googlelogo"> </a>
        <a href="https://www.icloud.com/"><img src="assets/img/apple.png" class = "apple"></a>
        <h4 class = "or">Or log with your emails</h4>
    
    
        <form class = "box" action = "./src/login.src.php" method="POST">
            <h3 class="who_are_you">Who are you?</h3><br>
            <select class = "login" name="user_type" id="users">
                <option value="customer">Customer</option>
                <option value="vendor">Vendor</option>
            </select><br>
            <input class = "login" required placeholder="Username/Email..." type="text" name="user"><br>
            <input class = "login" required placeholder="Password..." type="password" name="pwd"><br>
            <br>
            <br>
            <button class = "log" type="submit" name="submit">Login</button>

            <!-- <b class = "forgetpassword">Forgot password?</b> -->
        </form>
    </div>
</section>





<script src="./assets/js/login.js"></script>

<?php include("footer.php"); ?>






<!-- <h1 class="main-title">Login Page</h1>
    <form class="login_form" action="./src/login.src.php" method="post">
        <label for="cars">Who are you?</label><br>
        <select name="users" id="users">
            <option value="customer">Customer</option>
            <option value="vendor">Vendor</option>
            <option value="admin">Admin</option>
        </select><br>
        <input required placeholder="Username/Email..." type="text" name="uid"><br>
        <input required placeholder="Password..." type="password" name="password"><br>
        <button type="submit" name="submit">Login</button>
    </form> -->