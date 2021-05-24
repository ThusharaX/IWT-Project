<?php

if (isset($_GET["adID"]) && ($_GET["cID"])) {
    $customerID = $_GET["cID"];
    $adID = $_GET["adID"];

    require_once '../dbh.php';

    $sql = "INSERT INTO Choice (choiceID, adID, CID) 
            VALUES ('', '$adID', '$customerID');";

    if (mysqli_query($conn, $sql)) {
        // echo "<script>alert ('Successfully Sign Up')</script>";
        header("location: ../../customerDashboard.php");
    }
    else {
        echo "<script>alert ('Something went wrong :-(')</script>";
    }

    mysqli_close($conn);
}
else {
    header("location: ../../index.php");
}

?>