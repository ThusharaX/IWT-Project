<?php

try {

	$db=new mysqli("local host", "root","","wedding");

}catch(Expection $exc){
	echo $exc->getTraceAsString();

}

if(isset($_POST['name'] && $_POST['phone']) && isset($_POST['email']) && isset($_POST['subject'] )){
	
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$comment=$_POST['comment'];

	$is_insert= $db->query("INSERT INTO 'data' ('name',phone','email','comment') VALUES('$name','$phone','$email','$comment')");

	if ($is_insert==TRUE){
		echo"<h4> thanks,your response submited</h4>";
		exit();
	}
}
?>