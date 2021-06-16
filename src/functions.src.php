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


// IT20665234
// Silva D.T.T
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


// IT20665234
// Silva D.T.T
// Update User Deatails
function updateUserDetails($conn, $fname, $lname, $email, $username, $role, $id) {

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


// IT20665234
// Silva D.T.T
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


// IT20665234
// Silva D.T.T
// This function add new user in to Database
function addUser($conn, $fname, $lname, $email, $username, $pwd, $role) {

    $uidExists = uidExists($conn, $username, $username, $role);

    if ($uidExists === true) {
        header("location: ../../addUser.php?error=usernameAlreadyExists");
        exit();
    }
    
    
    $hashedPwd = hash('sha256', $pwd);

    if ($role === 'customer') {
        $sql = "INSERT INTO Customer (customerID, c_fname, c_lname, c_dob, c_username, c_imgLoc, role, c_password, c_email, c_partner) 
            VALUES ('', '$fname', '$lname', '', '$username', 'defaultProfilePic.jpg', '$role', '$hashedPwd', '$email', '(Your Partner)');";
    } else if ($role === 'vendor') {
        $sql = "INSERT INTO Vendor (vendorID, v_company, v_username, v_imgLoc, v_fname, v_lname, role, v_password, v_mobile, v_address, v_email) 
            VALUES ('', '', '$username', 'defaultProfilePic.jpg', '$fname', '$lname', '$role', '$hashedPwd', '', '', '$email');";
    } else if ($role === 'admin') {
        $sql = "INSERT INTO Admin (adminID, a_fname, a_lname, a_username, a_imgLoc, role, a_password, a_email) 
            VALUES ('', '$fname', '$lname', '$username', 'defaultProfilePic.jpg', 'admin', '$hashedPwd', '$email');";
    }

    // $sql = "INSERT INTO users (usersID, usersName, usersEmail, usersUid, usersPwd, usersType) VALUES ('', '$name', '$email', '$username', '$hashedPwd', '$user_type');";
    
    if (mysqli_query($conn, $sql)) {
        // echo "<script>alert ('Successfully Sign Up')</script>";
        header("location: ../../admin.php");
    }
    else {
        echo "<script>alert ('Something went wrong :-(')</script>";
    }

    mysqli_close($conn);
}

// IT20916626
// Gangoda G.G.W.N
// customerLogin
function customerLogin($conn, $username, $pwd) {
    // Done by Thushara
    $uidExists = uidExists($conn, $username, $username, 'customer');

    if ($uidExists === false) {
        header("location: ../customer-login.php?error=wrongusername");
        exit();
    }

    $sql = mysqli_query($conn, "SELECT *
                                    FROM Customer
                                    WHERE c_username='" . $username . "' 
                                    OR c_email ='" . $username . "'
                                    ");
    
    // ==================
    $row  = mysqli_fetch_array($sql);

    // Get Hashed password
    $pwdHashed = $row['c_password'];

    // Password validation
    if (hash('sha256', $pwd) === $pwdHashed) {
        $checkPwd = true;
    } else {
        $checkPwd = false;
    }

    if ($checkPwd === false) {
        header("location: ../customer-login.php?error=wrongpassword");
        exit();
    }

    else if ($checkPwd === true) {
        session_start();
        $_SESSION["id"] = $row['customerID'];
        $_SESSION["username"] = $row['c_username'];
        $_SESSION["fname"] = $row['c_fname'];
        $_SESSION["lname"] = $row['c_lname'];
        $_SESSION["email"] = $row['c_email'];
        $_SESSION["role"] = $row['role'];

        header("location: ../customerDashboard.php");
        exit();

    mysqli_close($conn);
    }
        
}


// IT20916626
// Gangoda G.G.W.N
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

        $pwdHashed = $row['v_password'];

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


// IT20652050
// Muhandiram K.M.G.K.W
function addAnnouncement($conn, $title, $annDescription, $publish_date, $adminID, $role) {

    $sql = "INSERT INTO Announcement
                (annID, adminID, title, user_type, publish_date, annDescription) 
            VALUES
                ('', '$adminID', '$title', '$role', '$publish_date', '$annDescription');";
    
    if (mysqli_query($conn, $sql)) {
        header("location: ../../admin.php");
    }
    else {
        echo "<script>alert ('Something went wrong :-(')</script>";
    }

    mysqli_close($conn);
}


?>





