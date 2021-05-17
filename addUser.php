<?php
    // Dynamic Header
    $title = 'Add User'; include("header.php");
    // Check if user is an admin
    include("./src/admin/adminConfig.php");
?>

<link rel="stylesheet" href="./assets/css/addUser.css">

<!-- Thushara -->
<!-- Type your code here -->
<section>
    <h1 class="main-title">Hello Admin please add Customer</h1>
    <br>
    <form action="./src/admin/addUser.src.php" method="post">
        <input required placeholder="First Name..." type="text" name="fname"><br>
        <input required placeholder="Last Name..." type="text" name="lname"><br>
        <input required placeholder="Email..." type="text" name="email"><br>
        <input required placeholder="Username..." type="text" name="username"><br>
        <input required placeholder="Password..." type="password" name="pwd"><br>
        <input required placeholder="Re-Password..." type="password" name="repwd"><br>
        <select class = "login" name="role" id="users">
            <option value="customer">Customer</option>
        </select><br>
        <button type="submit" name="addUser">Add Customer</button>
    </form>
</section>


<section>
    <h1 class="main-title">Hello Admin please add Vendor</h1>
    <br>
    <form action="./src/admin/addUser.src.php" method="post">
        <input required placeholder="First Name..." type="text" name="fname"><br>
        <input required placeholder="Last Name..." type="text" name="lname"><br>
        <input required placeholder="Email..." type="text" name="email"><br>
        <input required placeholder="Username..." type="text" name="username"><br>
        <input required placeholder="Password..." type="password" name="pwd"><br>
        <input required placeholder="Re-Password..." type="password" name="repwd"><br>
        <select class = "login" name="role" id="users">
            <option value="vendor">Vendor</option>
        </select><br>
        <button type="submit" name="addUser">Add Vendor</button>
    </form>
</section>


<section>
    <h1 class="main-title">Hello Admin please add Admin</h1>
    <br>
    <form action="./src/admin/addUser.src.php" method="post">
        <input required placeholder="First Name..." type="text" name="fname"><br>
        <input required placeholder="Last Name..." type="text" name="lname"><br>
        <input required placeholder="Email..." type="text" name="email"><br>
        <input required placeholder="Username..." type="text" name="username"><br>
        <input required placeholder="Password..." type="password" name="pwd"><br>
        <input required placeholder="Re-Password..." type="password" name="repwd"><br>
        <select class = "login" name="role" id="users">
            <option value="admin">Admin</option>
        </select><br>
        <button type="submit" name="addUser">Add Admin</button>
    </form>
</section>



<script src="./assets/js/adduser.js"></script>
<?php include("footer.php"); ?>