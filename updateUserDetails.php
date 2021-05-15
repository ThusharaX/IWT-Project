<?php
    // Dynamic Header
    $title = 'Update'; include("header.php");
    // Check if user is an admin
    include("./src/admin/adminConfig.php");
?>

<link rel="stylesheet" href="./assets/css/updateUserDetails.css">

<!-- Thushara -->
<!-- Type your code here -->
<section>
    <h1 class="main-title">Update User Details</h1>

    <?php
        include_once("./src/dbh.php");
        include_once("./src/functions.src.php");

        $row = getUserDetails($conn, $_GET["id"], $_GET["role"]);

        // Display Old details of user
        echo '<form class"update_form" action="./src/admin/updateUser.src.php" method="post">
                <input hidden value="' . $row["id"] .'" required type="text" name="id"><br>
                <input value="' . $row["fname"] .'" required placeholder="First Name..." type="text" name="fname"><br>
                <input value="' . $row["lname"] .'" required placeholder="Last Name..." type="text" name="lname"><br>
                <input value="' . $row["username"] .'" required placeholder="Username..." type="text" name="username"><br>
                <input value="' . $row["email"] .'" required placeholder="Email..." type="email" name="email"><br>
                <input hidden value="' . $row["role"] .'" type="text" name="role"><br>
                
                <button type="submit" name="update">Update</button>
            </form>';

            // <select name="user_type" id="users">
            //     <option value="customer" '.(($row["usersType"]=='customer')?'selected="selected"':"").'>Customer</option>
            //     <option value="vendor" '.(($row["usersType"]=='vendor')?'selected="selected"':"").'>Vendor</option>
            //     <option value="admin" '.(($row["usersType"]=='admin')?'selected="selected"':"").'>Admin</option>
            // </select><br>
    ?>

</section>


<script src="./assets/js/updateUserDetails.js"></script>

<?php include("footer.php"); ?>