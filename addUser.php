<?php
    // Dynamic Header
    $title = 'Add User'; include("header.php");
    // Check if user is an admin
    include("./src/admin/adminConfig.php");
?>

<link rel="stylesheet" href="./assets/css/addUser.css">

<!-- Thushara -->
<!-- Type your code here -->

<?php
    if($_GET["role"] === 'customer') {
        echo "<section>
                <div class='login-form'>
                    <h1 class='main-title'>Hello Admin please add Customer</h1>
                    <br>
                    <form action='./src/admin/addUser.src.php' method='post'>
                        <input required placeholder='First Name...' type='text' name='fname'><br>
                        <input required placeholder='Last Name...' type='text' name='lname'><br>
                        <input required placeholder='Email...' type='text' name='email'><br>
                        <input required placeholder='Username...' type='text' name='username'><br>
                        <input required placeholder='Password...' type='password' name='pwd'><br>
                        <input required placeholder='Re-Password...' type='password' name='repwd'><br>
                        <input hidden required name='role' value='customer'>
                        <button class='submit-btn' type='submit' name='addUser'>Add Customer</button>
                    </form>
                </div>
            </section>";
    }
    else if($_GET["role"] === 'vendor') {
        echo "<section>
                <div class='login-form'>
                    <h1 class='main-title'>Hello Admin please add Vendor</h1>
                    <br>
                    <form action='./src/admin/addUser.src.php' method='post'>
                        <input required placeholder='First Name...' type='text' name='fname'><br>
                        <input required placeholder='Last Name...' type='text' name='lname'><br>
                        <input required placeholder='Email...' type='text' name='email'><br>
                        <input required placeholder='Username...' type='text' name='username'><br>
                        <input required placeholder='Password...' type='password' name='pwd'><br>
                        <input required placeholder='Re-Password...' type='password' name='repwd'><br>
                        <input hidden required name='role' value='vendor'>
                        <button class='submit-btn' type='submit' name='addUser'>Add Vendor</button>
                    </form>
                </div>
            </section>";
    }
    else if($_GET["role"] === 'admin') {
        echo "<section>
                <div class='login-form'>
                    <h1 class='main-title'>Hello Admin please add Admin</h1>
                    <br>
                    <form action='./src/admin/addUser.src.php' method='post'>
                        <input required placeholder='First Name...' type='text' name='fname'><br>
                        <input required placeholder='Last Name...' type='text' name='lname'><br>
                        <input required placeholder='Email...' type='text' name='email'><br>
                        <input required placeholder='Username...' type='text' name='username'><br>
                        <input required placeholder='Password...' type='password' name='pwd'><br>
                        <input required placeholder='Re-Password...' type='password' name='repwd'><br>
                        <input hidden required name='role' value='admin'>
                        <button class='submit-btn' type='submit' name='addUser'>Add Admin</button>
                    </form>
                </div>
            </section>";
    }
    else {
        header("location: ./admin.php");
    }
?>











<script src="./assets/js/adduser.js"></script>
<?php include("footer.php"); ?>