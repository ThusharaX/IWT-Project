<?php

if (isset($_POST["submit"])) {

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $username = $_POST["user"];
    $pwd = $_POST["pwd"];
    $repwd = $_POST["repwd"];
    // $user_type = $_POST["user_type"];

    require_once '../dbh.php';
    require_once '../functions.src.php';

    // customerSignup($conn, $name, $email, $username, $pwd, $user_type);

    // Niki
    // This function creates new user in Database
    // function customerSignup($conn, $name, $email, $username, $pwd, $user_type) {

    $uidExists = uidExists($conn, $username, $username, 'vendor');

    if ($uidExists === true) {
        header("location: ../../vendorSignup.php?error=usernameAlreadyExists");
        exit();
    }
    
    // $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $hashedPwd = hash('sha256', $pwd);


    $sql = "INSERT INTO Vendor (id, pro_pic, fname, lname, username, password, email, company, mobile, address, role) 
            VALUES ('', '', '$fname', '$lname', '$username', '$hashedPwd', '$email', '', '', '', 'vendor');";
    
    if (mysqli_query($conn, $sql)) {
        // echo "<script>alert ('Successfully Sign Up')</script>";
        header("location: ../../login.php");
    }
    else {
        echo "<script>alert ('Something went wrong :-(')</script>";
    }
    mysql_close($conn);
// }



}
else {
    header("location: ../../index.php");
}

?>