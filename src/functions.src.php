<?php

// This function checks if username already in the database
function uidExists($conn, $username, $email) {
    $sql = mysqli_query($conn, "SELECT * FROM users 
                        WHERE usersUid ='" . $username . "' 
                        OR usersEmail ='" . $email . "';
                        ");

    $row  = mysqli_fetch_array($sql);

    if (is_array($row)) {
        return true;
    }
    else {
        return false;
    }
}

// This function creates new user in Database
function createUser($conn, $name, $email, $username, $pwd, $user_type) {
    
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (usersID, usersName, usersEmail, usersUid, usersPwd, usersType) VALUES ('', '$name', '$email', '$username', '$hashedPwd', '$user_type');";
    
    if (mysqli_query($conn, $sql)) {
        // echo "<script>alert ('Successfully Sign Up')</script>";
        header("location: ../login.php");
    }
    else {
        echo "<script>alert ('Something went wrong :-(')</script>";
    }
    mysql_close($conn);
}

// This function log in user in to website
function loginUser($conn, $username, $pwd, $user_type) {
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location: ../customerSignup.php?error=wrongusername");
        exit();
    }

    $sql = mysqli_query($conn, "SELECT *
                                    FROM users
                                    WHERE usersUid='" . $username . "' 
                                    OR usersEmail ='" . $username . "'
                                     ");
       
    $row  = mysqli_fetch_array($sql);

    if ($user_type !== $row['usersType']) {
        header("location: ../login.php?error=invalidusertype");
        exit();
    }

    $pwdHashed = $row['usersPwd'];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wrongpassword");
        exit();
    }

    else if ($checkPwd === true) {
        session_start();
        $_SESSION["id"] = $row['usersID'];
        $_SESSION["name"] = $row['usersName'];
        $_SESSION["email"] = $row['usersEmail'];
        $_SESSION["user_type"] = $row['usersType'];

        if ($user_type === "admin") {
            header("location: ../admin.php");
            exit();
        }
        else if ($user_type === "vendor") {
            header("location: ../vendorDashboard.php");
            exit();
        }

        header("Location: ../index.php");
        exit();
    }
}

?>