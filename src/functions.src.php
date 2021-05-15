<?php

// Thushara
// This function checks if username already in the database
function uidExists($conn, $username, $email, $role) {

    if ($role === 'customer') {
        $sql = mysqli_query($conn, "SELECT * FROM Customer 
                        WHERE username ='" . $username . "' 
                        OR email ='" . $email . "';
                        ");    
    } else if ($role === 'vendor') {
        $sql = mysqli_query($conn, "SELECT * FROM Vendor 
                        WHERE username ='" . $username . "' 
                        OR email ='" . $email . "';
                        ");    
    } else if ($role === 'admin') {
        $sql = mysqli_query($conn, "SELECT * FROM Admin
                        WHERE username ='" . $username . "' 
                        OR email ='" . $email . "';
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
                                    WHERE id='" . $id . "' 
                                     ");
    } else if ($role === 'vendor') {
        $sql = mysqli_query($conn, "SELECT *
                                    FROM Vendor
                                    WHERE id='" . $id . "' 
                                     ");
    } else if ($role === 'admin') {
        $sql = mysqli_query($conn, "SELECT *
                                    FROM Admin
                                    WHERE id='" . $id . "' 
                                     ");
    }
    
       
    $row  = mysqli_fetch_array($sql);

    mysqli_close($conn);

    return $row;
}


// Thushara
// Update User Deatails
function updateUserDetails($conn, $fname, $lname, $email, $username, $role, $id) {

    $uidExists = uidExists($conn, $username, $username, $role);

    if ($uidExists === true) {
        header("location: ../../updateUserDetails.php?id=$uid&error=usernameAlreadyExists");
        exit();
    }

    if ($role === 'cutomer') {
        $sql = mysqli_query($conn, "UPDATE Customer SET
        `fname` = '$fname',
        `lname` = '$lname',
        `email` = '$email',
        `username` = '$username',
        `role` = '$role'
        WHERE id=$id");
    } else if($role === 'vendor') {
        $sql = mysqli_query($conn, "UPDATE Vendor SET
        `fname` = '$fname',
        `lname` = '$lname',
        `email` = '$email',
        `username` = '$username',
        `role` = '$role'
        WHERE id=$id");
    } else if($role === 'admin') {
        $sql = mysqli_query($conn, "UPDATE Admin SET
        `fname` = '$fname',
        `lname` = '$lname',
        `email` = '$email',
        `username` = '$username',
        `role` = '$role'
        WHERE id=$id");
    }


    mysqli_close($conn);
}

// Thushara
// Get User Deatails
function deleteUser($conn, $id, $role) {

    if ($role === 'customer') {
        $sql = mysqli_query($conn, "DELETE
                                FROM Customer
                                WHERE id='" . $id . "' 
                                 ");
    } else if($role === 'vendor') {
        $sql = mysqli_query($conn, "DELETE
                                FROM Vendor
                                WHERE id='" . $id . "' 
                                 ");
    } else if($role === 'admin') {
        $sql = mysqli_query($conn, "DELETE
                                FROM Admin
                                WHERE id='" . $id . "' 
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
        $sql = "INSERT INTO Customer (id, pro_pic, fname, lname, dob, username, password, email, partner, role) 
            VALUES ('', '', '$fname', '$lname', '', '$username', '$hashedPwd', '$email', '', 'customer');";
    } else if ($role === 'vendor') {
        $sql = "INSERT INTO Vendor (id, pro_pic, fname, lname, username, password, email, company, mobile, address, role) 
            VALUES ('', '', '$fname', '$lname', '$username', '$hashedPwd', '$email', '', '', '', 'vendor');";
    } else if ($role === 'admin') {
        $sql = "INSERT INTO Admin (id, pro_pic, fname, lname, username, password, email, role) 
            VALUES ('', '', '$fname', '$lname', '$username', '$hashedPwd', '$email', 'admin');";
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
                                        WHERE username='" . $username . "' 
                                        OR email ='" . $username . "'
                                        ");
        
        $row  = mysqli_fetch_array($sql);

        // if ($user_type !== $row['usersType']) {
        //     header("location: ../login.php?error=invalidusertype");
        //     exit();
        // }

        $pwdHashed = $row['password'];
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
            $_SESSION["id"] = $row['id'];
            $_SESSION["fname"] = $row['fname'];
            $_SESSION["lname"] = $row['lname'];
            $_SESSION["email"] = $row['email'];
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
                                        WHERE username='" . $username . "' 
                                        OR email ='" . $username . "'
                                        ");
        
        $row  = mysqli_fetch_array($sql);

        // if ($user_type !== $row['usersType']) {
        //     header("location: ../login.php?error=invalidusertype");
        //     exit();
        // }

        $pwdHashed = $row['password'];
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
            $_SESSION["id"] = $row['id'];
            $_SESSION["fname"] = $row['fname'];
            $_SESSION["lname"] = $row['lname'];
            $_SESSION["email"] = $row['email'];
            $_SESSION["role"] = $row['role'];

            header("location: ../vendorDashboard.php");
            exit();

        mysqli_close($conn);
        }
        
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





