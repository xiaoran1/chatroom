<?php 
header('content-type:test/html;charset="utf-8"');
error_reporting(0);

$arr1 = array('leo','mmo','zssss');

//$arr2 = array('ussename'=>'leo','age'=>32);
//echo  'leo,mmo,zssss';

echo json_encode($arr1);

?>