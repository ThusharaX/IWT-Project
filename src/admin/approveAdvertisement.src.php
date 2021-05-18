<?php

if (isset($_POST["approve"])) {

    $adID = $_POST["adID"];

    include_once("../dbh.php");

    
    $sql = mysqli_query($conn, "UPDATE Advertisement
                                SET `status` = 1
                                WHERE adID='" . $adID . "' 
                                 ");

    mysqli_close($conn);


    header("location: ../../admin.php");
}
else {
    header("location: ../../index.php");
}

?>