<?php
    
    if (isset($_POST["update"])) {
        $lname = $_POST["lname"];
        $fname = $_POST["fname"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $role = $_POST["role"];
        $id = $_POST["id"];

        include_once("../dbh.php");
        include_once("../functions.src.php");
        
        updateUserDetails($conn, $fname, $lname, $email, $username, $role, $id);

        header("location: ../../admin.php");
        
    }
    else {
        header("location: ../index.php");
    }

?>