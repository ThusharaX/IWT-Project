<!--IT20664558 D.M.P.D.Daundasekara-->
<?php
// include database connection file
include_once("./src/dbh.php");    
                
include("./src/customer/customerConfig.php"); 
  $adID = $_GET['adID'];  
  $customerID=$_SESSION['id'];   

// Get id from URL to delete that feedback
$feedbackID = $_GET['feedbackID'];

// Delete feedback row from table based on given id
$result = mysqli_query($conn, "DELETE  FROM feedback WHERE feedbackID=$feedbackID AND customerID=$_SESSION[id] ");





// After delete redirect to feedback, so that latest feedback list will be displayed.
header("Location: feedback.php?feedbackID=$row[feedbackID] & adID=$row[adID] & customerID= $_SESSION[id]  ");

?>

