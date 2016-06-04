<!DOCTYPE html>
<html>
<head><meta charset="UTF-8">
<title>login page</title>
</head>
<script type="text/javascript" src="my.js"></script>
<script type="text/javascript">
function change1(val, obj) {
	if(val=='over'){
		obj.style.color="red";
		obj.style.cursor="crosshair";
	}else if(val=='out'){
		obj.style.color="black";
	}
}

function opencharroom(obj){
	window.open("chatRoom.php?username="+obj.innerText,"_blank");
}
</script>



<body>
<h1>friend list</h1>
<ul>
	<li onmouseover="change1('over',this)"
		onmouseout="change1('out',this)"
		onclick = "opencharroom(this)">
	kevin</li>
	<li onmouseover="change1('over',this)"
		onmouseout="change1('out',this)"
		onclick = "opencharroom(this)">
	mike</li>
	<li onmouseover="change1('over',this)"
		onmouseout="change1('out',this)"
		onclick = "opencharroom(this)">
	lee</li>
</ul>
</body>
</html>



<?php
