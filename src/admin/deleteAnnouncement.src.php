<?php

if (isset($_POST["delete"])) {

    $annID = $_POST["annID"];

    include_once("../dbh.php");

    
    $sql = mysqli_query($conn, "DELETE
                                FROM Announcement
                                WHERE annID='" . $annID . "' 
                                 ");

    mysqli_close($conn);


    header("location: ../../admin.php");
}
else {
    header("location: ../../index.php");
}

?>