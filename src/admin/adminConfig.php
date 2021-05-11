<!-- This file checks if logged in user is not admin -->
<?php
    if ($_SESSION["user_type"] !== 'admin') {
        header("location: ./index.php");
        exit();
    }
?>