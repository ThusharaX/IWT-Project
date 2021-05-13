<?php

  $con=new mysqli("localhost","root","","addcommercials");

  if($con->connect_error){
	  die ("connection failed: ".$con->connect_error);
	  
  }

?>
  
