<?php
    
    if (isset($_POST["update"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $user_type = $_POST["user_type"];
        $uid = $_POST["uid"];

        require_once '../dbh.php';
        require_once '../functions.src.php';
        
        updateUserDetails($conn, $name, $email, $username, $user_type, $uid);

        header("location: ../../admin.php");
        
    }
    else {
        header("location: ../index.php");
    }

?>