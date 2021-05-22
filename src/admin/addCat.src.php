<?php
include_once("../dbh.php");

if (isset($_POST["addCat"]) && isset($_FILES["cat_imgLoc"])) {

    $cat_imgLoc = $_FILES ["cat_imgLoc"];
    $catName = $_POST["catName"];
    $catDescription = $_POST["catDescription"];
    $price = $_POST["price"];

    $img_name = $_FILES['cat_imgLoc']['name'];
    $img_size = $_FILES['cat_imgLoc']['size'];
    $tmp_name = $_FILES['cat_imgLoc']['tmp_name'];
    $error = $_FILES['cat_imgLoc']['error'];

    if($error === 0) {
        if($img_size > 125000) {
            header("location: ../../addCategory.php?error=fileTooLarge");
        }
        else {
            $img_extention = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_extention = strtolower($img_extention);

            $allowed_extentions = array("jpg", "jpeg", "png", "gif");

            if(in_array($img_extention, $allowed_extentions)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_extention;
                $upload_path = '../../Uploads/categories/'.$new_img_name;
                move_uploaded_file($tmp_name, $upload_path);
            }
            else {
                header("location: ../../addCategory.php?error=invalidFormat");
            }
        }

    } else {
        header("location: ../../addCategory.php?error=unknownErrorOccurred");
    }


    echo $new_img_name;
    // Add Category
    $sql = "INSERT INTO Category
                (catID, catName, cat_imgLoc, catDescription, price) 
            VALUES
                ('', '$catName', '$new_img_name', '$catDescription', '$price');";
    
    if (mysqli_query($conn, $sql)) {
        // echo "<script>alert ('Successfully Sign Up')</script>";
        header("location: ../../admin.php");
    }
    else {
        echo "<script>alert ('Something went wrong :-(')</script>";
    }
    
    mysql_close($conn);

}
else {
    header("location: ../../index.php");
}

?>