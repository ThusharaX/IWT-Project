<?php

// Thushara
// This function checks if username already in the database
function uidExists($conn, $username, $email, $role) {

    if ($role === 'customer') {
        $sql = mysqli_query($conn, "SELECT * FROM Customer 
                        WHERE c_username ='" . $username . "' 
                        OR c_email ='" . $email . "';
                        ");    
    } else if ($role === 'vendor') {
        $sql = mysqli_query($conn, "SELECT * FROM Vendor 
                        WHERE v_username ='" . $username . "' 
                        OR v_email ='" . $email . "';
                        ");    
    } else if ($role === 'admin') {
        $sql = mysqli_query($conn, "SELECT * FROM Admin
                        WHERE a_username ='" . $username . "' 
                        OR a_email ='" . $email . "';
                        ");    
    }
    
    $row  = mysqli_fetch_array($sql);

    if (is_array($row)) {
        return true;
    }
    else {

        return false;
    }

    mysqli_close($conn);
}


// Thushara
// Get User Deatails
function getUserDetails($conn, $id, $role) {

    if ($role === 'customer') {
        $sql = mysqli_query($conn, "SELECT *
                                    FROM Customer
                                    WHERE customerID='" . $id . "' 
                                     ");
    } else if ($role === 'vendor') {
        $sql = mysqli_query($conn, "SELECT *
                                    FROM Vendor
                                    WHERE vendorID='" . $id . "' 
                                     ");
    } else if ($role === 'admin') {
        $sql = mysqli_query($conn, "SELECT *
                                    FROM Admin
                                    WHERE adminID='" . $id . "' 
                                     ");
    }
    
       
    $row  = mysqli_fetch_array($sql);

    mysqli_close($conn);

    return $row;
}


// Thushara
// Update User Deatails
function updateUserDetails($conn, $fname, $lname, $email, $username, $role, $id) {

    // I have to skip this step
    
    // $uidExists = uidExists($conn, $username, $username, $role);

    // if ($uidExists === true) {
    //     header("location: ../../updateUserDetails.php?id=$id&role=$role&error=usernameAlreadyExists");
    //     exit();
    // }

    if ($role === 'customer') {
        $sql = mysqli_query($conn, "UPDATE Customer SET
        `c_fname` = '$fname',
        `c_lname` = '$lname',
        `c_email` = '$email',
        `c_username` = '$username',
        `role` = '$role'
        WHERE customerID='" . $id . "'
        ");
    } else if($role === 'vendor') {
        $sql = mysqli_query($conn, "UPDATE Vendor SET
        `v_fname` = '$fname',
        `v_lname` = '$lname',
        `v_email` = '$email',
        `v_username` = '$username',
        `role` = '$role'
        WHERE vendorID='" . $id . "'
        ");
    } else if($role === 'admin') {
        $sql = mysqli_query($conn, "UPDATE Admin SET
        `a_fname` = '$fname',
        `a_lname` = '$lname',
        `a_email` = '$email',
        `a_username` = '$username',
        `role` = '$role'
        WHERE adminID='" . $id . "'
        ");
    }

    mysqli_close($conn);
}

// Thushara
// Get User Deatails
function deleteUser($conn, $id, $role) {

    if ($role === 'customer') {
        $sql = mysqli_query($conn, "DELETE
                                FROM Customer
                                WHERE customerID='" . $id . "' 
                                 ");
    } else if($role === 'vendor') {
        $sql = mysqli_query($conn, "DELETE
                                FROM Vendor
                                WHERE vendorID='" . $id . "' 
                                 ");
    } else if($role === 'admin') {
        $sql = mysqli_query($conn, "DELETE
                                FROM Admin
                                WHERE adminID='" . $id . "' 
                                 ");
    }

    mysqli_close($conn);
}


// Thushara
// This function add new user in to Database
function addUser($conn, $fname, $lname, $email, $username, $pwd, $role) {

    $uidExists = uidExists($conn, $username, $username, $role);

    if ($uidExists === true) {
        header("location: ../../addUser.php?error=usernameAlreadyExists");
        exit();
    }
    
    // $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $hashedPwd = hash('sha256', $pwd);

    if ($role === 'customer') {
        $sql = "INSERT INTO Customer (customerID, c_fname, c_lname, c_dob, c_username, c_imgLoc, role, c_password, c_email, c_partner) 
            VALUES ('', '$fname', '$lname', '', '$username', '', '$role', '$hashedPwd', '$email', '');";
    } else if ($role === 'vendor') {
        $sql = "INSERT INTO Vendor (vendorID, v_company, v_username, v_imgLoc, v_fname, v_lname, role, v_password, v_mobile, v_address, v_email) 
            VALUES ('', '', '$username', '', '$fname', '$lname', '$role', '$hashedPwd', '', '', '$email');";
    } else if ($role === 'admin') {
        $sql = "INSERT INTO Admin (adminID, a_fname, a_lname, a_username, a_imgLoc, role, a_password, a_email) 
            VALUES ('', '$fname', '$lname', '$username', '', 'admin', '$hashedPwd', '$email');";
    }

    // $sql = "INSERT INTO users (usersID, usersName, usersEmail, usersUid, usersPwd, usersType) VALUES ('', '$name', '$email', '$username', '$hashedPwd', '$user_type');";
    
    if (mysqli_query($conn, $sql)) {
        // echo "<script>alert ('Successfully Sign Up')</script>";
        header("location: ../../admin.php");
    }
    else {
        echo "<script>alert ('Something went wrong :-(')</script>";
    }

    mysql_close($conn);
}


// customerLogin
function customerLogin($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username, $username, 'customer');

        if ($uidExists === false) {
            header("location: ../login.php?error=wrongusername");
            exit();
        }

        $sql = mysqli_query($conn, "SELECT *
                                        FROM Customer
                                        WHERE c_username='" . $username . "' 
                                        OR c_email ='" . $username . "'
                                        ");
        
        $row  = mysqli_fetch_array($sql);

        // if ($user_type !== $row['usersType']) {
        //     header("location: ../login.php?error=invalidusertype");
        //     exit();
        // }

        $pwdHashed = $row['c_password'];
        // $checkPwd = password_verify($pwd, $pwdHashed);

        if (hash('sha256', $pwd) === $pwdHashed) {
            $checkPwd = true;
        } else {
            $checkPwd = false;
        }

        if ($checkPwd === false) {
            header("location: ../login.php?error=wrongpassword");
            exit();
        }

        else if ($checkPwd === true) {
            session_start();
            $_SESSION["id"] = $row['customerID'];
            $_SESSION["username"] = $row['c_username'];
            $_SESSION["fname"] = $row['c_fname'];
            $_SESSION["lname"] = $row['c_lname'];
            $_SESSION["email"] = $row['c_email'];
            $_SESSION["username"] = $row['c_username'];
            $_SESSION["role"] = $row['role'];

            header("location: ../customerDashboard.php");
            exit();

        mysqli_close($conn);
        }
        
    }



// vendorLogin
function vendorLogin($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username, $username, 'vendor');

        if ($uidExists === false) {
            header("location: ../login.php?error=wrongusername");
            exit();
        }

        $sql = mysqli_query($conn, "SELECT *
                                        FROM Vendor
                                        WHERE v_username='" . $username . "' 
                                        OR v_email ='" . $username . "'
                                        ");
        
        $row  = mysqli_fetch_array($sql);

        // if ($user_type !== $row['usersType']) {
        //     header("location: ../login.php?error=invalidusertype");
        //     exit();
        // }

        $pwdHashed = $row['v_password'];
        // $checkPwd = password_verify($pwd, $pwdHashed);

        if (hash('sha256', $pwd) === $pwdHashed) {
            $checkPwd = true;
        } else {
            $checkPwd = false;
        }

        if ($checkPwd === false) {
            header("location: ../login.php?error=wrongpassword");
            exit();
        }

        else if ($checkPwd === true) {
            session_start();
            $_SESSION["id"] = $row['vendorID'];
            $_SESSION["username"] = $row['v_username'];
            $_SESSION["fname"] = $row['v_fname'];
            $_SESSION["lname"] = $row['v_lname'];
            $_SESSION["email"] = $row['v_email'];
            $_SESSION["role"] = $row['role'];

            header("location: ../vendorDashboard.php");
            exit();

        mysqli_close($conn);
        }
        
    }


function addAnnouncement($conn, $title, $annDescription, $publish_date, $adminID, $role) {

    $sql = "INSERT INTO Announcement
                (annID, adminID, title, user_type, publish_date, annDescription) 
            VALUES
                ('', '$adminID', '$title', '$role', '$publish_date', '$annDescription');
            ";
    
    if (mysqli_query($conn, $sql)) {
        // echo "<script>alert ('Successfully Sign Up')</script>";
        header("location: ../../admin.php");
    }
    else {
        echo "<script>alert ('Something went wrong :-(')</script>";
    }

    mysql_close($conn);
}































    // Niki
// This function creates new user in Database
// function createUser($conn, $name, $email, $username, $pwd, $user_type) {

//     $uidExists = uidExists($conn, $username, $username);

//     if ($uidExists === true) {
//         header("location: ../customerSignup.php?error=usernameAlreadyExists");
//         exit();
//     }
    
//     $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

//     $sql = "INSERT INTO users (usersID, usersName, usersEmail, usersUid, usersPwd, usersType) VALUES ('', '$name', '$email', '$username', '$hashedPwd', '$user_type');";
    
//     if (mysqli_query($conn, $sql)) {
//         // echo "<script>alert ('Successfully Sign Up')</script>";
//         header("location: ../login.php");
//     }
//     else {
//         echo "<script>alert ('Something went wrong :-(')</script>";
//     }
//     mysql_close($conn);
// }

// Niki
// This function log in user in to website
// function loginUser($conn, $username, $pwd, $user_type) {
//     $uidExists = uidExists($conn, $username, $username);

//     if ($uidExists === false) {
//         header("location: ../customerSignup.php?error=wrongusername");
//         exit();
//     }

//     $sql = mysqli_query($conn, "SELECT *
//                                     FROM users
//                                     WHERE usersUid='" . $username . "' 
//                                     OR usersEmail ='" . $username . "'
//                                      ");
       
//     $row  = mysqli_fetch_array($sql);

//     if ($user_type !== $row['usersType']) {
//         header("location: ../login.php?error=invalidusertype");
//         exit();
//     }

//     $pwdHashed = $row['usersPwd'];
//     $checkPwd = password_verify($pwd, $pwdHashed);

//     if ($checkPwd === false) {
//         header("location: ../login.php?error=wrongpassword");
//         exit();
//     }

//     else if ($checkPwd === true) {
//         session_start();
//         $_SESSION["id"] = $row['usersID'];
//         $_SESSION["name"] = $row['usersName'];
//         $_SESSION["email"] = $row['usersEmail'];
//         $_SESSION["user_type"] = $row['usersType'];

//         if ($user_type === "admin") {
//             header("location: ../admin.php");
//             exit();
//         }
//         else if ($user_type === "customer") {
//             header("location: ../customerDashboard.php");
//             exit();
//         }
//         else if ($user_type === "vendor") {
//             header("location: ../vendorDashboard.php");
//             exit();
//         }

//         header("Location: ../index.php");
//         exit();
//     }

//     mysqli_close($conn);
// }
?>





