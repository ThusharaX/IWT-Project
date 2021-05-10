<?php

function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../customerSignup.php?error=stmtfaild");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


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

function loginUser($conn, $username, $pwd, $user_type) {
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location: ../customerSignup.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wrongpassword");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];

        if ($user_type === "admin") {
            header("location: ../admin.php");
            exit();
        }
        header("location: ../index.php");
        exit();
    }
}

?>




<!-- Extra -->

<!-- 
// function uidExists($conn, $username, $email) {
//     $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
//     $stmt = mysqli_stmt_init($conn);
//     if (mysqli_stmt_prepare($stmt, $sql)) {
//         header("location: ../customerSignup.php?error=stmtfaild");
//         exit();
//     }

//     mysqli_stmt_bind_param($stmt, "ss", $username, $email);
//     mysqli_stmt_execute($stmt);

//     $resultData = mysqli_stmt_get_resultd($stmt);

//     if (mysqli_fetch_assoc($resultData)) {
//         # code...
//     }
//     else {
//         $result = false;
//         return $result;
//     }

//     mysqli_stmt_close($stmt);
// }

// function createUser($conn, $name, $email, $username, $pwd, $user_type) {
//     $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd, usersType) VALUES (?, ?, ?, ?, ?);";
//     $stmt = mysqli_stmt_init($conn);
//     if (mysqli_stmt_prepare($stmt, $sql)) {
//         header("location: ../customerSignup.php?error=stmtfaild");
//         exit();
//     }

//     $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

//     mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $username, $hashedPwd, $user_type);
//     mysqli_stmt_execute($stmt);
//     mysqli_stmt_close($stmt);
//     header("location: ../login.php?error=none");
//     exit();
// } -->
