<?php
$title = 'Delete'; include("../../header.php");

include_once("./customerConfig.php");

if (isset($_GET["guestID"])) {

    $guestID = $_GET["guestID"];

    include_once("../dbh.php");

    $sql = mysqli_query($conn, "DELETE
                                FROM GuestList
                                WHERE guestID='" . $guestID . "' 
                                 ");

    header("location: ../../customerDashboard.php");
}
else {
    header("location: ../../index.php");
}

?>