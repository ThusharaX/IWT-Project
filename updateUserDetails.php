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
        require_once './src/dbh.php';
        require_once './src/functions.src.php';

        $row = getUserDetails($conn, $_GET["id"]);

        // Display Old details of user
        echo '<form class"update_form" action="./src/admin/updateUser.src.php" method="post">
                <input hidden value="' . $row["usersID"] .'" required type="text" name="uid"><br>
                <input value="' . $row["usersName"] .'" required placeholder="Full Name..." type="text" name="name"><br>
                <input value="' . $row["usersUid"] .'" required placeholder="Username..." type="text" name="username"><br>
                <input value="' . $row["usersEmail"] .'" required placeholder="Email..." type="email" name="email"><br>
                <select name="user_type" id="users">
                    <option value="customer" '.(($row["usersType"]=='customer')?'selected="selected"':"").'>Customer</option>
                    <option value="vendor" '.(($row["usersType"]=='vendor')?'selected="selected"':"").'>Vendor</option>
                    <option value="admin" '.(($row["usersType"]=='admin')?'selected="selected"':"").'>Admin</option>
                </select><br>
                <button type="submit" name="update">Update</button>
            </form>';
    ?>

</section>


<script src="./assets/js/updateUserDetails.js"></script>

<?php include("footer.php"); ?>