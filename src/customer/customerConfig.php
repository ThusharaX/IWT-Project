<!-- This file checks if logged in user is not customer -->
<?php
    if ($_SESSION["user_type"] !== 'customer') {
        header("location: ./index.php");
        exit();
    }
?>