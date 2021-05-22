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

    $uidExists = uidExists($conn, $username, $username, 'customer');

    if ($uidExists === true) {
        header("location: ../../customerSignup.php?error=usernameAlreadyExists");
        exit();
    }
    
    // $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $hashedPwd = hash('sha256', $pwd);

    $sql = "INSERT INTO Customer (customerID, c_fname, c_lname, c_dob, c_username, c_imgLoc, role, c_password, c_email, c_partner) 
            VALUES ('', '$fname', '$lname', '', '$username', '', 'customer', '$hashedPwd', '$email', '');";
    
    if (mysqli_query($conn, $sql)) {
        // echo "<script>alert ('Successfully Sign Up')</script>";
        header("location: ../../customer-login.php");
    }
    else {
        echo "<script>alert ('Something went wrong :-(')</script>";
    }
    mysqli_close($conn);
// }



}
else {
    header("location: ../../index.php");
}

?>