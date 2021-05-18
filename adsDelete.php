<?php 
 //By IT20654962
  include './src/dbh.php';
  
     $adID=$_GET['id'];
	 $sqlstmt="DELETE 
	           FROM Advertisement_payment
			   WHERE adID=$adID;";
	if(mysqli_query($conn,$sqlstmt)){
		header("Location:adsInventory.php");
	}else{
		echo "Erro cannot delete ad because".$conn->error;
		
	}		   

?>