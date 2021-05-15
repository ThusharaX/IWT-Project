<?php
    // Dynamic Header
    $title = 'About'; include("header.php");
?>

<!-- <link rel="stylesheet" href="./assets/css/about.css"> -->

<!-- Thushara -->
<!-- Type your code here -->
<section>
    <h1 class="main-title">Admin Login Page</h1>
    <form class = "box" action = "./src/admin/adminLogin.src.php" method="POST">
            <h3>Hi Admin</h3><br>
            <input class = "login" required placeholder="Username/Email..." type="text" name="user"><br>
            <input class = "login" required placeholder="Password..." type="password" name="pwd"><br>
            <br>
            <br>
            <button class = "log" type="submit" name="submit">Login</button>

            <b class = "forgetpassword">Forgot password?</b>
        </form>
</section>


<!-- <script src="./assets/js/about.js"></script> -->

<?php include("footer.php"); ?>