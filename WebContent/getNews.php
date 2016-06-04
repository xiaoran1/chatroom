<?php 
	header('content-type:text/html;charset="utf-8"');
	error_reporting(0);
	$news = array(
		array('title'=>'sdfsf','date'=>'2016-1-5'),	
		array('title'=>'ssvvvvs','date'=>'2016-1-5'),
		array('title'=>'wwww','date'=>'2016-1-5'),
		array('title'=>'zzzzz','date'=>'2016-1-5'),
		array('title'=>'bbbb','date'=>'2016-1-5'),
		array('title'=>'nnnnn','date'=>'2016-1-5'),
		array('title'=>'11111111','date'=>'2016-1-5'),
);
	
echo json_encode($news);
?>