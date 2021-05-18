<!-- This file checks if user is logged in -->
<?php
    if (isset($_SESSION["id"])) {
        header("location: ./index.php");
        exit();
    }
?>