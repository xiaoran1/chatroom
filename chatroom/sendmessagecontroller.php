<?php
	require_once 'MessageService.class.php';
	$sender = $_POST['sender'];
	$getter = $_POST['getter'];
	$con = $_POST['con'];
	
	//file_put_contents("mylog.log", $sender."-".$getter."-".$con."\r\n",FILE_APPEND);
	$messageService = new MessageService();
	$res = $messageService->addMessage($sender, $getter, $con);
	if (res==1){
		echo "success";
	}else{
		echo "err";
	}
	
?>