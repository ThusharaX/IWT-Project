<?php
    if (isset($_GET["addAnnouncement"])) {
        $title = $_GET["title"];
        $annDescription = $_GET["annDescription"];
        $publish_date = $_GET["publish_date"];
        $adminID = $_GET["adminID"];
        $role = $_GET["role"];
        
        include_once("../dbh.php");
        include_once("../functions.src.php");
        
        addAnnouncement($conn, $title, $annDescription, $publish_date, $adminID, $role);

        // header("location: ./admin.php?message=announcementSent");
    }

    else {
        header("location: ../../index.php");
    }
?>