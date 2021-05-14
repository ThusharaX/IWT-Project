<!-- This file checks if logged in user is not vendor -->
<?php
    if ($_SESSION["user_type"] !== 'vendor') {
        header("location: ./index.php");
        exit();
    }
?>