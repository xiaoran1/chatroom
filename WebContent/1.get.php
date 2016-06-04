<?php 
	echo "sdsdsd";
	echo 1;
	header('content-type:text/html;charset="utf-8"');
	error_reporting(0);
	
	$username = $_POST['username'];

	$age = $_POST['age'];
	
	echo "your name: {$username}, age is: {$age}";

?>