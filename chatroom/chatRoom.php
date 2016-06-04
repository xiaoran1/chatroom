<!DOCTYPE html>
<html>
<?php 
	//receive window.open pass username
	$username = $_GET["username"];
	$username = trim($username);
	session_start();
	$loginuser = $_SESSION['loginuser'];
?>
<head><meta charset="UTF-8">
<title>login page</title>
</head>
<script type="text/javascript" src='my.js'></script>
<script type="text/javascript">
	window.resizeTo(500, 400);

	window.setInterval("getmessage()",5000);
	function getmessage(){
		var myxhr = getXmlHttpObject();
		if(myxhr){
			var url="getmessagecontroller.php";
			var data="&getter=<?php echo $loginuser;?>&sender=<?php echo $username?>";
			myxhr.open('post',url,true);
			myxhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			//myxhr.overrideMimeType('text/xml');
			//指定处理结果的函数
			myxhr.onreadystatechange=function(){
				if(myxhr.readyState==4){
					if(myxhr.status== 200){
						
						var mesRes = myxhr.responseXML;
						var cons=mesRes.getElementsByTagName("content");
						var sendTimes=mesRes.getElementsByTagName("sendTime");

						if(cons.length>0){
							for (var i = 0; i < cons.length; i++) {
								$('mycontents').value+="<?php echo $username; ?> talk to <?php echo $loginuser; ?>:"
									+cons[i].childNodes[0].nodeValue
									+" "+sendTimes[i].childNodes[0].nodeValue+"\r\n";
							}							
						}						
					}
				}
			}
			//send
			myxhr.send(data);
		}
	}

	function sendmessage(){
		var myxhr = getXmlHttpObject();
		if(myxhr){
			var url="sendmessagecontroller.php";
			//user php data in js
			var data ="con="+ $('con').value+
			"&getter=<?php echo $username;?>&sender=<?php echo $loginuser?>";
			//window.alert(url+" "+data);
			
			myxhr.open("post",url,true);
			myxhr.setRequestHeader('content-type','application/x-www-form-urlencoded');

			myxhr.onreadystatechange=function(){
				if(myxhr.readyState==4){
					if(myxhr.status== 200){
				
					}
				}
			}
			//send
			myxhr.send(data);
		}
	}
	
</script>

<body align="center">
<h1 >chatroom (<?php echo $loginuser;?> is chatting with 
<font color="red"><?php echo $username;?></font>)</h1>
<textarea cols="70" rows="20" id="mycontents"></textarea><br>
<input type="text" id="con"/>
<input type="button" value="send" onclick="sendmessage()"/>
</body>
</html>
