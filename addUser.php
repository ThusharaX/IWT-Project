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
    <h1 class="main-title">Hello Admin please add user</h1>
    <br>
    <form action="./src/admin/addUser.src.php" method="post">
        <input required placeholder="Full Name..." type="text" name="name"><br>
        <input required placeholder="Email..." type="text" name="email"><br>
        <input required placeholder="Username..." type="text" name="uid"><br>
        <input required placeholder="Password..." type="password" name="pwd"><br>
        <input required placeholder="Re-Password..." type="password" name="repwd"><br>
        <select class = "login" name="user_type" id="users">
            <option value="customer">Customer</option>
            <option value="vendor">Vendor</option>
            <option value="admin">Admin</option>
        </select><br>
        <button type="submit" name="addUser">Add User</button>
    </form>
</section>



<script src="./assets/js/adduser.js"></script>
<?php include("footer.php"); ?>