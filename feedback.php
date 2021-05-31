<!--IT20664558 D.M.P.D.Daundasekara-->
<?php 

       
include("header.php");
// Check if user is a customer
include("./src/customer/customerConfig.php"); 
$adID = $_GET['adID'];  
 $customerID=$_SESSION['id'];   
                
?>

<h1 class="add"> We welcome feedback from our customers <br> it helps us to continually improve. </h1>

 <link rel="stylesheet" href="./assets/css/feedback.css">

<table class="table" border=1>
<div class="feedback-details">
    <tr>
        <th>customerID</th> 
		<th>Comment</th> 
		<th>rating</th> 
    </tr>
  
        
       <?php
      
      // Getting id from url
$adID = $_GET['adID'];



        // Fetch all  feedbacks from feedback table
        $sql = "SELECT * FROM feedback  WHERE adID='$adID' ORDER BY feedbackID DESC";
        $result = mysqli_query($conn, $sql);

    

   
     if ($result->num_rows > 0) {
           
	
      // output feedback of each row
     
            while($row=mysqli_fetch_assoc($result)){
              echo "<tr>";
               echo "<td>".$row['customerID']."</td>";
               echo "<td>".$row['fbdescription']."</td>";
               echo "<td>".$row['rating']."</td>";
			   echo "</tr>";
            }
        }


            ?>
			
    </table>
	</div>
	

        <br>
   
    
    <div class=form1>
    <form class ="form"  method="post" action="" onsubmit ="return validate()" >

		

   			<br><br>
<label for="subject">Comments</label><br>
    <textarea id="fbdescription" name="fbdescription" placeholder="Type your comments here..." style="height:300px width 100px"></textarea><br><br>
			
				How would you rate your experience <br>
	  
	
    <input list="rating" name="rating">

  <datalist id="rating" >
  	 <option value="1-Awfulj">
    <option value="2-need to improve">
    <option value="3-Neutral">
    <option value="4-Great">
    <option value="5-Fantastic">
  </datalist> <br><br>

   		<input type="submit" class="btn" name="submit" value="SUBMIT">
 
	
		</form>
	
		</div>		

  <br>

<?php
if(isset($_POST['submit']))
	 {

  $fbdescription = $_POST['fbdescription'];
  $rating = $_POST['rating'];


  $result = mysqli_query($conn, "INSERT INTO feedback(customerID,adID,rating,fbdescription) VALUES($customerID,$adID,'$rating','$fbdescription')");
		
		//Insert feedback data into table
	if(mysqli_query($conn,$result)){
		
		// Show message 
	echo "<div class='done'>your feedback submited successfully....Thank you for your feedback.!!!<br>";
  }
}
		
		?>
<div class="fb">
<table class="table" border=1>
  <th> your Comment</th> 
		<th> your rating</th> 
    <th>Edit</th>
<?php
 
    
    $sql = "SELECT * FROM feedback  WHERE adID=$adID  AND customerID=$customerID";
        $result = mysqli_query($conn, $sql);

    

      //output feedback of each row
     if ($result->num_rows > 0) {
           
	
     
            while($row=mysqli_fetch_assoc($result)){
          
              $row['customerID'];
             echo "<tr>";
             echo "<td>".$row['fbdescription']."</td>";
             echo "<td>".$row['rating']."</td>";
       
               	
                 echo "<td><a href='./feedbackedit.php?feedbackID=".$row['feedbackID']."&adID=". $row['adID'] ."&customerID=". $_SESSION['id'] ."'><button>Click here</button></a></td>";
                 echo "<td><a href='./Deletefeedback.php?feedbackID=".$row['feedbackID']."&adID=".  $row['adID'] ."&customerID=". $_SESSION['id'] ."'><button>Delete</button></a></td>";
                 echo "</tr>";
            }
          }
            ?>
            </table>
		</div>
		           
               
  
  <?php include("footer.php"); ?>   
   
       
   
   

    