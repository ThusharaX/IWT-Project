<?php
    // Dynamic Header
    $title = 'Approve'; include("header.php");
    // Check if user is an admin
    include("./src/admin/adminConfig.php");
?>

<link rel="stylesheet" href="./assets/css/deleteUser.css">

<!-- Thushara -->
<!-- Type your code here -->
<section>
    <h1 class="main-title">Do you really want to Approve this Advertisement?</h1>

    <?php
        include_once("./src/dbh.php");
        include_once("./src/functions.src.php");
        
        echo '<form class"update_form" action="./src/admin/approveAdvertisement.src.php" method="post">
                <input hidden value="' . $_GET['adID'] .'" required type="text" name="adID"><br>
                <button"><a href="./admin.php">Go Back</a></button>
                <button type="submit" name="approve">Approve</button>
            </form>';
    ?>

</section>


<script src="./assets/js/deleteUser.js"></script>

<?php include("footer.php"); ?>