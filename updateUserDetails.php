<?php
    // Dynamic Header
    $title = 'Update'; include("header.php");
    include("./src/admin/adminConfig.php");
?>

<link rel="stylesheet" href="./assets/css/updateUserDetails.css">

<!-- Thushara -->
<!-- Type your code here -->
<section>
    <h1 class="main-title">updateUserDetails Page</h1>

    <?php
        require_once './src/dbh.php';
        require_once './src/functions.src.php';

        $row = getUserDetails($conn, $_GET["username"]);

        echo $row["usersID"];
        echo $row["usersName"];
        echo $row["usersEmail"];
        echo $row["usersType"];

    ?>
</section>


<script src="./assets/js/updateUserDetails.js"></script>

<?php include("footer.php"); ?>