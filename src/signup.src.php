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

<!-- extra -->
    <!-- // if (uidExists($conn, $username, $email) !== false) {
    //     header("location: ../customerSignup.php?error=usernametaken");
    //     exit();
    // }

    // $sql = "INSERT INTO users (usersID, usersName, usersEmail, usersUid, usersPwd, usersType) VALUES ('', '$name', '$email', '$username', '$pwd', '$user_type');";
    
    // if (mysqli_query($conn, $sql)) {
    //     echo "<script>alert ('Successfully Sign Up')</script>";
    //     header("location: ../login.php");
    // }
    // else {
    //     echo "<script>alert ('Something went wront :-(')</script>";
    // }
    // mysql_close($conn); -->