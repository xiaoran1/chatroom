<?php 
	//receive username and password
	$loginUser = $_POST['username'];
	$pwd = $_POST['password'];
	echo($pwd);
	if($pwd=="123"){
		session_start();
		$_SESSION['loginuser']=$loginUser;
		header("Location: friendList.php");
	}else{
		header("Location: login.php");
	}
?>