<?php 
// Param 1 : nama host
// Param 2 : username
// Param 3 : password
$connection = mysql_connect('localhost', 'root', '');
if(!$connection){
	die('Could not connect: '.mysql_error());
}
mysql_select_db('amdp_training');
?>