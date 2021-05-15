<!-- This file checks if logged in user is not vendor -->
<?php
    if ($_SESSION["role"] !== 'vendor') {
        header("location: ./index.php");
        exit();
    }
?>