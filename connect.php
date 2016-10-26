<?php 
// Param 1 : hostname
// Param 2 : username
// Param 3 : password
$connection = mysql_connect('localhost', 'root', '');
if(!$connection){
	// beri pesan error jika gagal connect ke DB
	die('Could not connect: '.mysql_error());
}
// pilih DB jika berhasil connect
mysql_select_db('amdp_training');
?>