<?php

if (isset($_POST["delete"])) {

    $catID = $_POST["catID"];

    include_once("../dbh.php");

    
    $sql = mysqli_query($conn, "DELETE
                                FROM Category
                                WHERE catID='" . $catID . "' 
                                 ");

    mysqli_close($conn);


    header("location: ../../admin.php");
}
else {
    header("location: ../../index.php");
}

?>