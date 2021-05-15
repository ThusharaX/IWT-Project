<?php

if (isset($_POST["delete"])) {

    $id = $_POST["id"];
    $role = $_POST["role"];

    include_once("../dbh.php");
    include_once("../functions.src.php");

    deleteUser($conn, $id, $role);

    header("location: ../../admin.php");
}
else {
    header("location: ../../index.php");
}

?>