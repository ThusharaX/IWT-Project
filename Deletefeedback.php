<?php
// include database connection file

    $servername = "localhost";
        $username = "root";
    $password = "";
    $dbname = "wedding_planning";
// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Get id from URL to delete that user
$feedbackID = $_GET['feedbackID'];

// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM feedback WHERE feedbackID=$feedbackID");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:Moredetails.php");
?>

