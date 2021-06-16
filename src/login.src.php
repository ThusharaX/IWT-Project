<?php
    
    if (isset($_POST["submit"])) {
        $username = $_POST["user"];
        $pwd = $_POST["pwd"];
        $role = $_POST["user_type"];
        
        // DB connection
        include_once("dbh.php");

        // User define functions
        include_once("functions.src.php");
        
        if ($role === 'customer') {
            customerLogin($conn, $username, $pwd);
        } else if ($role === 'vendor') {
            vendorLogin($conn, $username, $pwd);
        }
        else {
            header("location: ../login.php?error=invalidRole");
        }
        
        
    }
    else {
        header("location: ../index.php");
    }

?>