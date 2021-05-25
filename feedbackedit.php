


  
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



// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$feedbackID = $_POST['feedbackID'];
	$c_username=$_POST['c_username'];
	$comment=$_POST['comment'];
	$rating=$_POST['rating'];
	
		
	// update user data
	$result = mysqli_query($conn, "UPDATE feedback SET c_username='$c_username',comment='$comment',rating='$rating' WHERE feedbackID='$feedbackID'  ");
	
	// Redirect to homepage to display updated user in list
	header("Location: Moredetails.php?feedbackID=$row[feedbackID]Ad_ID=$row[Ad_ID] ");

}
?>
<?php
// Display selected user data based on id
// Getting id from url
$Ad_ID = $_GET['Ad_ID'];
$feedbackID = $_GET['feedbackID'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM feedback WHERE feedbackID='$feedbackID' ");

while($row = mysqli_fetch_array($result))
{
	$c_username = $row['c_username'];
	$comment = $row['comment'];
	$rating = $row['rating'];
	
}
?>
<html>
<head>	
	<title>Edit feedback Data</title>
</head>

<body>
	<a href="Moredetails.php">back</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="Moredetails.php">
		<table border="0">
			<tr> 
				<td>Userame</td>
				<td><input type="text" name="c_username" value="<?php echo $c_username;?>"></td>
			</tr>
			<tr> 
				<td>comment</td>
		<td><input type id="comment" name="comment"  value="<?php echo $comment;?>"  ></textarea>
		</td>
			</tr>
			<tr> 
				<td>How would you rate your experience</td>
				<td><input list="rating" name="rating"value="<?php echo $rating;?>"></td>
 			<td> <datalist id="rating" >
  	 		<option value="1-Awful">
    		<option value="2-need to improve">
   			 <option value="3-Neutral">
    		<option value="4-Great">
    		<option value="5-Fantastic">
  			</datalist> </td>
			</tr>
			<tr>
				<td><input type="hidden" name="feedbackID" value=<?php echo $_GET['feedbackID'];?>></td>
				
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>

