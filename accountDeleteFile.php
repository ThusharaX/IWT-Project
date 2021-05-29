<?php

       if(isset($_POST["delete"])){
		    require './src/dbh.php';
		    $vID=$_POST["vendorID"];
           //Sql statement to  delete  vendor.	  
		   $sqlstatementDel="DELETE FROM Vendor WHERE vendorID=$vID;";
		   
		   if(mysqli_query($conn,$sqlstatementDel)){
			   //redirect to the login page  after user get deleted
			   header("Location:login.php?userdeleted");
              
              		  
			  
		   }else{
			  echo "Error cannot be deleted user because: ".$conn->error;   
		  }
		   
		   
	     }
?>