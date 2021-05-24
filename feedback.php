<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Ranhuya - View feedback</title>
    <link rel="stylesheet" href="./assets/css/feedback.css">
	
</head>
<body>
    <!-- <?php include("header.html"); ?> -->



<?php
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
 
// Check if user is a customer
  //  include("./src/customer/customerConfig.php");
// Display selected user data based on id
// Getting id from url
 

$Ad_ID = $_GET['Ad_ID'];



// Fetech user data based on id



// Fetech user data based on id




?>



<form class ="form1"  method="post" action="feedback.php" onsubmit ="return validate()" >
		
			
				Username<br>
				<input type="text" name="c_username"><br>
		 
				<label for="subject">Comments</label><br>
    <textarea id="comment" name="comment" placeholder="Type your comments here..." style="height:300px width 100px"></textarea><br>
			
				How would you rate your experience <br>
	  
    <input list="rating" name="rating">

  <datalist id="rating" >
  	 <option value="1-Awfulj">
    <option value="2-need to improve">
    <option value="3-Neutral">
    <option value="4-Great">
    <option value="5-Fantastic">
  </datalist>
<br><br>
	<input type="hidden" name="Ad_ID" value=<?php echo $_GET['Ad_ID'];?>>
	
				<input type="submit" class="btn" name="Submit" value="SUBMIT">
		
	</form>
	
	



	<?php



		

	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$c_username = $_POST['c_username'];
		$comment = $_POST['comment'];
		$rating = $_POST['rating'];
	//	$coustomer_ID=$_POST
		
		

				
		// Insert user data into table
	$result = mysqli_query($conn, "INSERT INTO feedback(c_username,comment,rating,Ad_ID) VALUES('$c_username','$comment','$rating','$Ad_ID')");
		
		// Show message when user added
		
	}
	?>
		

	
  
   <table border=1>

    <tr>
        <th>Userame</th> <th>Comment</th> <th>rating</th> <
    </tr>
    <?php
        
        

        // Fetch all users data from users table
        $sql = "SELECT * FROM feedback  WHERE Ad_ID='$Ad_ID' ORDER BY feedbackID DESC";
        $result = mysqli_query($conn, $sql);


	

      // output data of each row
      if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc())
	
      // output data of each row
     
             while($row=mysqli_fetch_assoc($result)){
              echo "<tr>";
                echo "<td>".$row['c_username']."</td>";
               echo "<td>".$row['comment']."</td>";
                echo "<td>".$row['rating']."</td>";
            }
        }

            ?>
    </table>
      
              <!--< "<a href='feedbackedit.php?feedbackID=$row[feedbackID] AND Ad_ID=$row[Ad_ID]'>Edit</a> | <a href='Deletefeedback.php?feedbackID=$row[feedbackID] AND Ad_ID=$row[Ad_ID]'>Delete</a></td>";*/
               
            
       
       
   
   

    