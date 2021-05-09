<?php
    // Dynamic Header
    $title = 'Login'; include("header.php");
?>

<link rel="stylesheet" href="./assets/css/login.css">

<!-- Niki -->
<!-- Type your code here -->
<section>
    <h1 class="main-title">Login Page</h1>
    <form action="" method="post">
        <label for="cars">Who are you?</label><br>
        <select name="users" id="users">
            <option value="customer">Customer</option>
            <option value="vendor">Vendor</option>
            <option value="admin">Admin</option>
        </select><br>
        <input placeholder="Email" type="email" name="email" id=""><br>
        <input placeholder="Password" type="password" name="password" id=""><br>
        <button type="submit">Login</button>
    </form>
</section>


<script src="./assets/js/login.js"></script>

<?php include("footer.php"); ?>
