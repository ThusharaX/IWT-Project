<?php
    
    if (isset($_POST["submit"])) {
        $username = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $user_type = $_POST["user_type"];

        require_once 'dbh.php';
        require_once 'functions.src.php';
        
        loginUser($conn, $username, $pwd, $user_type);
        
        
    }
    else {
        header("location: ../index.php");
    }

?>