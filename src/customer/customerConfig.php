<!-- This file checks if logged in user is not customer -->
<?php
    if ($_SESSION["role"] !== 'customer') {
        header("location: ./index.php");
        exit();
    }
?>