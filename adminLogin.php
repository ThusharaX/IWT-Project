<?php
    // Dynamic Header
    $title = 'About'; include("header.php");
    include_once('./src/isloginConfig.src.php');
?>

<link rel="stylesheet" href="./assets/css/adminLogin.css">

<!-- Thushara -->
<!-- Type your code here -->
<section>
    
    <!-- <form class = "box" action = "" method="POST">
            <h3>Hi Admin</h3><br>
            <input class = "login" required placeholder="Username/Email..." type="text" name="user"><br>
            <input class = "login" required placeholder="Password..." type="password" name="pwd"><br>
            <br>
            <br>
            <button class = "log" type="submit" name="submit">Login</button>

        </form> -->

    <div class="login-form">
        <form action="./src/admin/adminLogin.src.php" method="post">
        <h1 class="main-title">Admin Login Page</h1>
        <h3>Hi Admin</h3><br>
        <input class = "login" required placeholder="Username/Email..." type="text" name="user"><br>
            <input class = "login" required placeholder="Password..." type="password" name="pwd"><br>
            <br>
            <br>
            <button class="submit-btn" type="submit" name="submit">Login</button>
        </div>
      </form>
    </div>

</section>


<!-- <script src="./assets/js/about.js"></script> -->

<?php include("footer.php"); ?>