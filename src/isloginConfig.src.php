<!-- This file checks if user is logged in -->
<?php
    if (isset($_SESSION["id"])) {
        if($_SESSION["role"] === 'admin') {
            header("location: ./admin.php");
        } else if($_SESSION["role"] === 'vendor') {
            header("location: ./vendorDashboard.php");
        } else if($_SESSION["role"] === 'customer') {
            header("location: ./customerDashboard.php");
        } else 
        // header("location: ./index.php");
        exit();
    }
?>