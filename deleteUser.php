<?php
    // Dynamic Header
    $title = 'Delete'; include("header.php");
    // Check if user is an admin
    include("./src/admin/adminConfig.php");
?>

<link rel="stylesheet" href="./assets/css/deleteUser.css">

<!-- Thushara -->
<!-- Type your code here -->
<section>
    <h1 class="main-title">Do you really want to Delete this User?</h1>

    <?php
        include_once("./src/dbh.php");
        include_once("./src/functions.src.php");

        $row = getUserDetails($conn, $_GET["id"], $_GET["role"]);

        // Display Old details of user
        echo '<form class"update_form" action="./src/admin/deleteUser.src.php" method="post">
                <input hidden value="' . $row["id"] .'" required type="text" name="id"><br>
                <input hidden value="' . $row["role"] .'" required type="text" name="role"><br>
                <button"><a href="./admin.php">Go Back</a></button>
                <button type="submit" name="delete">Delete</button>
            </form>';
    ?>

</section>


<script src="./assets/js/deleteUser.js"></script>

<?php include("footer.php"); ?>