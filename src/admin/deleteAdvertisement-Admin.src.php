<?php

if (isset($_POST["delete"])) {

    $adID = $_POST["adID"];

    include_once("../dbh.php");

    
    $sql = mysqli_query($conn, "DELETE
                                FROM Advertisement
                                WHERE adID='" . $adID . "' 
                                 ");

    mysqli_close($conn);


    header("location: ../../admin.php");
}
else {
    header("location: ../../index.php");
}

?>