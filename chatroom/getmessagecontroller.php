<?php
require_once 'MessageService.class.php';

header('Content-Type: text/xml ;charset=utf-8');
header("Cache-Control: no-cache"); // HTTP/1.1

$sender = $_POST['sender'];
$getter = $_POST['getter'];

//file_put_contents("mylog.log", $getter."--".$sender."\r\n",FILE_APPEND);
$messageService = new MessageService();
$res = $messageService->getMessage($sender, $getter);
//file_put_contents("mylog.log", $res."\r\n",FILE_APPEND);
echo $res;

?>