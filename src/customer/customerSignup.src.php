<?php

if (isset($_POST["submit"])) {

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $username = $_POST["user"];
    $pwd = $_POST["pwd"];
    $repwd = $_POST["repwd"];

    require_once '../dbh.php';
    require_once '../functions.src.php';


    $uidExists = uidExists($conn, $username, $username, 'customer');

    if ($uidExists === true) {
        header("location: ../../customerSignup.php?error=usernameAlreadyExists");
        exit();
    }
    

    $hashedPwd = hash('sha256', $pwd);

    $sql = "INSERT INTO Customer (customerID, c_fname, c_lname, c_dob, c_username, c_imgLoc, role, c_password, c_email, c_partner) 
            VALUES ('', '$fname', '$lname', '', '$username', 'defaultProfilePic.jpg', 'customer', '$hashedPwd', '$email', '(Your Partner)')
            ;";
    
    if (mysqli_query($conn, $sql)) {
        header("location: ../../customer-login.php");
    }
    else {
        echo "<script>alert ('Something went wrong :-(')</script>";
    }
    mysqli_close($conn);



}
else {
    header("location: ../../index.php");
}

?>