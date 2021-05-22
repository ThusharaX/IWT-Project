<link rel="stylesheet" href="../assets/css/searchResults.css">
<form method="GET">
  <label>Search</label>
  <input type="text" name ="search">
  <input type="submit" name ="submit" value="search">
   
 </form>

 
 <?php

$con=mysqli_connect("localhost","root","","wedding_planning");
   if (isset($_GET['submit'])){

  
  
 ?><table border=0 cellpadding="50" cellspacing="50" align="center"><?php
  $r=0;

  $search=mysqli_real_escape_string($con,$_GET['search']);
   $sql=("SELECT * FROM advertisement WHERE title LIKE '%$search%'" );
  
  
	$res=mysqli_query($con,$sql) ;

	if(mysqli_num_rows($res)>0)
    

	{
	
	while($row=mysqli_fetch_array($res))
	{
      
	if($r%4==0)

	{
		
		echo"<tr>";
	}
	echo"<td>" ?> <div class ="card">
		<!--<form method="POST" action="" >
		<input type="text" name=title class="title" value="-->
		<?php echo $row['title'];?>
		
	
		<img src="<?php echo $row['addimageLoc'];?>" height="150" width="280"> 
		
	<?php echo $row['addDescription']; 
	?><br>
	<!-- <input type="submit" name="add to wishlist" value="Add to wishlist">
	</form>-->
  <br><br>
   <div>
   

    <button  id ="btn"  type="button" ><a href="../moredetails.php" >view more details</a> </button><br><br>
    
    <?php
	 
	if($r%4==3)
	{
		echo "</tr>";
	}
	$r++; 
	
		
	
}


}
else{
	echo "No advertisment to show";
	}

}


