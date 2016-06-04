<?php
	require_once 'SqlHelper.class.php';
	class MessageService{
		function addMessage($sender,$getter,$con){
			//组织一个sql
			$sql = "insert into message 
			(sender,getter,content,sendTime)
			values
			('$sender','$getter','$con',now())";
			//file_put_contents("mylog.log", "sql=".$sql."\r\n",FILE_APPEND);
			$sqlHelper = new SqlHelper();
			return $sqlHelper->execute_dml($sql);
		}
		
		//获取数据
		function getMessage($sender,$getter){
			//组织一个sql
			$sql = "select * from message where
			getter = '$getter' 
			and sender = '$sender'
			and isGet=0";
			$sqlHelper = new SqlHelper();	
			$messages = $sqlHelper->execute_dql2($sql);		
			//返回给客户端的信息格式			
			$messageinfo = "<meses>";	
			foreach ($messages as $message){
				$messageinfo.="<mesid>{$message['id']}</mesid>
					<sender>{$message['sender']}</sender>
					<getter>{$message['getter']}</getter>
					<content>{$message['content']}</content>
					<sendTime>{$message['sendTime']}</sendTime>";			
			} 
			$messageinfo.="</meses>";
			//file_put_contents("mylog.log", "messageinfo=".$messageinfo."\r\n",FILE_APPEND);
			
			$sql = "update message set isGet=1 where 
					getter = '$getter' 
					and sender = '$sender'";
			$sqlHelper->execute_dml($sql);
			
			$sqlHelper->close_connect();
			return $messageinfo;
		}
	}