<?php
$title = 'Delete'; include("../../header.php");

include_once("./customerConfig.php");

if (isset($_GET["choiceID"])) {

    $choiceID = $_GET["choiceID"];

    include_once("../dbh.php");

    $sql = mysqli_query($conn, "DELETE
                                FROM Choice
                                WHERE choiceID='" . $choiceID . "' 
                                 ");

    header("location: ../../customerDashboard.php");
}
else {
    header("location: ../../index.php");
}

?>