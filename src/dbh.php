<?php

// LocalHost

// $dbServername = "localhost";
// $dbUsername = 'root';
// $dbPassword = "";
// $dbName = "wedding_planning";

// Online DB

$dbServername = "eu-cdbr-west-03.cleardb.net";
$dbUsername = 'bd0f458241cbc8';
$dbPassword = "7533def2";
$dbName = "heroku_f0ea7a7c5a22a47";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());

    echo "<h1 style='padding-top: 100px'>Please Check the dbh.php file</h1>";
}

?>
