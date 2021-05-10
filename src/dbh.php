<?php

$dbServername = "localhost";
$dbUsername = 'root';
$dbPassword = "";
$dbName = "wedding_planning";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>