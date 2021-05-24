<link rel="stylesheet" href="./assets/css/searchResults.css">
<form method="GET">
  <label>Search</label>
  <input type="text" name ="search">
  <input type="submit" name ="submit" value="search">
   
 </form>

 
 <?php

$con=mysqli_connect("localhost","root","","wedding_planning");
   
   if (isset($_GET['submit'])){


 
 ?><table border=0 cellpadding="50" cellspacing="100" align="center"><?php
  $r=0;

  $search=mysqli_real_escape_string($con,$_GET['search']);
   $sql=("SELECT * FROM advertisment WHERE title LIKE '%$search%'" );
  
   $res=mysqli_query($con,$sql) ;
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
	    echo  "<p>".$row['title'] ." </p> ";?>
	   

		<img src="<?php echo $row['addimageLoc'];?>" height="150" width="300"> 
		
	<?php echo "<h3 class='des'>".$row['addDescription']. "</h3>"; ?>
	
	<br>
	
	<?php echo "<a href='./feedback.php?Ad_ID=$row[Ad_ID]' id='btn'>view More</a> "?>
		
	</form>
	
 
    
    
 <div>
  
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

