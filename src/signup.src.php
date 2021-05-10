<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $repwd = $_POST["repwd"];
    $user_type = $_POST["user_type"];

    require_once 'dbh.php';
    require_once 'functions.src.php';

    createUser($conn, $name, $email, $username, $pwd, $user_type);

}
else {
    header("location: ../index.php");
}

?>