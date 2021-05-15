<?php
    
    if (isset($_POST["submit"])) {
        $username = $_POST["user"];
        $pwd = $_POST["pwd"];

        include_once("../dbh.php");
        include_once("../functions.src.php");
        
        // loginUser($conn, $username, $pwd, $user_type);
        
        $uidExists = uidExists($conn, $username, $username, 'admin');

        if ($uidExists === false) {
            header("location: ../../adminLogin.php?error=wrongusername");
            exit();
        }

        $sql = mysqli_query($conn, "SELECT *
                                        FROM Admin
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
            header("location: ../../login.php?error=wrongpassword");
            exit();
        }

        else if ($checkPwd === true) {
            session_start();
            $_SESSION["id"] = $row['id'];
            $_SESSION["fname"] = $row['fname'];
            $_SESSION["lname"] = $row['lname'];
            $_SESSION["email"] = $row['email'];
            $_SESSION["role"] = $row['role'];

            header("location: ../../admin.php");
            exit();

        mysqli_close($conn);
        }
        
    }
    else {
        header("location: ../../index.php");
    }

?>