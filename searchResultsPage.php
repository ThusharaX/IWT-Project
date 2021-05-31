<!--IT20664558 D.M.P.D.Daundasekara-->
<?php
    // Dynamic Header
    $title = 'Search Result'; include("header.php");
?>
<link rel="stylesheet" href="./assets/css/searchResults.css">
<section class="slider">

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
		if((isset($_SESSION['id']))) {
			echo "click the title for view more details...";
		}
	


 
 ?><table border=0 cellpadding="50" cellspacing="100" align="center"><?php
  $r=0;


   $sql=("SELECT * FROM advertisement WHERE title LIKE '%$search%'" );
  
   $res=mysqli_query($conn,$sql) ;
   if(mysqli_num_rows($res)>0)
   {
	while($row=mysqli_fetch_array($res))
   {
      
	 if($r%4==0)
	 {
		
		echo"<tr>";
	 }
	    echo"<td>"  ?><div class ="card">
		
	  <br><?php
	    echo "
                    ".(isset($_SESSION['id'])?"<a href='./adDetailsPage.php?adID=". $row['adID'] ."'><p>". $row['title'] ."</p></a>":"<p>". $row['title'] ."</p>")."
                    
                    <p>". $row['publishDateTime'] ."</p>
                    ";
				echo "<br>";
	   

		?><img class= "image" src="<?php echo $row['addimageLoc'];?>" > 
	
		
	<?php echo "<h3 class='des'>".$row['addDescription']. "</h3>"; ?>
	
	<br>
	
	
                    	
	<?php	
                    
   if($r%4==3)
	{
		echo "</tr>";
 	}
 	$r++; 
	
	
 }


 }
 
else{
	echo "<h4>No advertisment to show</h4>";
 	}


 }
 echo "</div>";
 echo "</table>";
?>

</section>

<script src="./assets/js/searchResults.js"></script>


<?php include("footer.php"); 
