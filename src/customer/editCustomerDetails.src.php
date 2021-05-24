<?php
include_once("../dbh.php");

    if (isset($_POST["save"])) {

        $c_fname = $_POST["c_fname"];
        $c_lname = $_POST["c_lname"];
        $c_dob = $_POST["c_dob"];
        $c_username = $_POST["c_username"];
        $c_imgLoc = $_FILES ["c_imgLoc"];
        
        $c_email = $_POST["c_email"];
        $c_partner = $_POST["c_partner"];
        $customerID = $_POST["customerID"];

        $img_name = $_FILES['c_imgLoc']['name'];
        $img_size = $_FILES['c_imgLoc']['size'];
        $tmp_name = $_FILES['c_imgLoc']['tmp_name'];
        $error = $_FILES['c_imgLoc']['error'];

        if($error === 0) {
            if($img_size > 125000) {
                header("location: ./customerDashboard.php?error=fileTooLarge");
            }
            else {
                $img_extention = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_extention = strtolower($img_extention);
    
                $allowed_extentions = array("jpg", "jpeg", "png", "gif");
    
                if(in_array($img_extention, $allowed_extentions)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_extention;
                    $upload_path = '../../Uploads/customers/'.$new_img_name;
                    move_uploaded_file($tmp_name, $upload_path);
                }
                else {
                    header("location: ./customerDashboard.php?error=invalidFormat");
                }
            }
    
        } else {
            header("location: ./customerDashboard.php?error=unknownErrorOccurred");
        }

        
        
        $sql = mysqli_query($conn, "UPDATE Customer SET
            `c_fname` = '$c_fname',
            `c_lname` = '$c_lname',
            `c_dob` = '$c_dob',
            `c_imgLoc` = '$new_img_name',
            `c_username` = '$c_username',
            `c_email` = '$c_email',
            `c_partner` = '$c_partner'
            WHERE customerID='" . $customerID . "'
        ");

        

        header("location: ../../customerDashboard.php");    
    }
?>