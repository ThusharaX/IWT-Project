<?php
    // Dynamic Header
    $title = 'Vendor Signup'; include("header.php");
?>

<link rel="stylesheet" href="./assets/css/searchResults.css">

<?php

	if (isset($_GET['search'])) {
		echo "<h1>Search Result for ". $_GET["search"] ."...</h1>";

		$search = mysqli_real_escape_string($conn,$_GET['search']);

		if($search === "") {
			echo "<h3>All Advertisements</h3><br>";
		}

		if(!(isset($_SESSION['id']))) {
			echo "Please login to view Advertisement details...";
		}
	
		$sql = "SELECT * FROM Advertisement WHERE title LIKE '%$search%'";
		
		$res = $conn->query($sql);
	
		if ($res->num_rows > 0) {
			while ($row = $res->fetch_assoc()) {
				echo "
                    ".(isset($_SESSION['id'])?"<a href='./adDetailsPage.php?adID=". $row['adID'] ."'><p>". $row['title'] ."</p></a>":"<p>". $row['title'] ."</p>")."
                    
                    <p>". $row['publishDateTime'] ."</p>
                    ";
				echo "<br>";
			}
		}
	}
?>



 
<?php

// $con=mysqli_connect("localhost","root","","wedding_planning");
   
//    if (isset($_GET['submit'])){


 
 ?>
 
 <!-- <table border=0 cellpadding="50" cellspacing="100" align="center"> -->
 
 <?php
//   $r=0;

//   $search=mysqli_real_escape_string($con,$_GET['search']);
//    $sql=("SELECT * FROM advertisment WHERE title LIKE '%$search%'" );
  
//    $res=mysqli_query($con,$sql) ;
//    if(mysqli_num_rows($res)>0)
//    {
// 	while($row=mysqli_fetch_array($res))
//    {
      
// 	 if($r%4==0)
// 	 {
		
// 		echo"<tr>";
// 	 }
// 	    echo"<td>"  
	?>
		
	<!-- <div class ="card">
		
	  <br> -->
	  
	<?php
	    // echo  "<p>".$row['title'] ." </p> ";
	?>
	   

	<!-- <img src=" -->
		<?php
			// echo $row['addimageLoc'];
		?>
	<!-- " height="150" width="300">  -->
		
	<?php
		// echo "<h3 class='des'>".$row['addDescription']. "</h3>";
	?>
	
	<!-- <br> -->
	
	<?php
		// echo "<a href='./feedback.php?Ad_ID=$row[Ad_ID]' id='btn'>view More</a> "
	?>
		
	<!-- </form> -->
	
 
    
    
 <!-- <div> -->
  
    <?php
   

// 	if($r%4==3)
// 	{
// 		echo "</tr>";
// 	}
// 	$r++; 
	
		
	
// }


// }
// else{
// 	echo "<h4>No advertisment to show</h4>";
// 	}


// }
?>



<script src="./assets/js/searchResults.js"></script>

<?php include("footer.php"); ?>