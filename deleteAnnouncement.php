<?php
    // Dynamic Header
    $title = 'Delete'; include("header.php");
    // Check if user is an admin
    include("./src/admin/adminConfig.php");
?>

<link rel="stylesheet" href="./assets/css/deleteUser.css">

<!-- Gaween -->
<!-- Type your code here -->
<section>
    <h1 class="main-title">Do you really want to Delete this Announcement?</h1>

    <?php
        include_once("./src/dbh.php");

        // $row = getUserDetails($conn, $_GET["id"], $_GET["role"]);

        
        echo '<form class"update_form" action="./src/admin/deleteAnnouncement.src.php" method="post">
                <input hidden value="' . $_GET['annID'] .'" required type="text" name="annID"><br>
                <button"><a href="./admin.php">Go Back</a></button>
                <button type="submit" name="delete">Delete</button>
            </form>';
    ?>

</section>


<script src="./assets/js/deleteUser.js"></script>

<?php include("footer.php"); ?>