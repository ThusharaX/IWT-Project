<?php
  

  


  require 'configure.php';
?>
<!DOCTYPE html>
<html>
<head>
<style>
*{
	padding:0px;
	margin:0px;
	box-sizing:border-box;
}
	body{
		display:block;
		
	
	}table{
	   border-color:blue;
	   width:288px;
	   margin-bottom:5px;
	}tr{
		overflow-wrap: break-word;
	
	}tbody{
		width:100%;
		 word-break: break-word;
	}
	a{
		text-decoration: none;
		color: pink;
        display: block;
        text-align: center;
        padding: 14px 16px
	
	 	background:blue;
	}
	

</style>
</head>
<body>
<h1>Advertisement Inventory</h1>
 <ul>
   <li><a href="accountDetails.php">Account Details</a></li>
   <li><a href="addCommercialsPage.php">Add Advertisement</a></li>
   <li><a href="addInventory.php">Ads Inventory</a></li>
   <li><a href="addCommercialsPage.php">Add Advertisement</a></li>
 </ul>
<form method="POST" action="">
   <input  type="submit" name="result" value="View advertisements">

</form>

<?php
 if(isset($_POST['result'])){
   global $con;
   $sqlstmt="SELECT *FROM  COMMERCIAL";

   $result=mysqli_query($con,$sqlstmt);
   if($result->num_rows>0){

       while($row=$result->fetch_array()){
         echo "<table border='1px solid'>";
		  echo "<tr><td>".'<img src="data:image;base64,'.base64_encode($row['img']).'"height="200" width="100%"/>'."</td></tr>";
		 
          echo "<tr><td>".$row['addTitle']."</td></tr>";			
          echo "<tr><td>".$row['category']."</td></tr>";
         
          echo "<tr><td>".$row['adddes']."</td></tr>";
          echo "<tr><td>".$row['number']."</td></tr>";
          echo "<tr><td>".$row['email']."</td></tr>";          
          echo "<tr><td><a href='www.youtube.com'>Edit</a></td></tr>";
         echo "<tr><td><a href='www.google.com' class='button'>Delete</a></td></tr>";
		  echo "</table>";
       }
   }
 }
  $con->close();

?>


</body>
</html>