<?php

if (isset($_POST["delete"])) {

    $uid = $_POST["uid"];

    require_once '../dbh.php';
    require_once '../functions.src.php';

    deleteUser($conn, $uid);

    header("location: ../../admin.php");
}
else {
    header("location: ../../index.php");
}

?>