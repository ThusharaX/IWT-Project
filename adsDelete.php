<?php 

 //By IT20654962
  include './src/dbh.php';
  //get url from the
     $adID=$_GET['id'];
	 $sqlstmt="DELETE 
	           FROM Advertisement
			   WHERE adID=$adID;";
	if(mysqli_query($conn,$sqlstmt)){
		header("Location:adsInventory.php");
	}else{
		echo "Error cannot delete ad because".$conn->error;
		
	}		   

?>