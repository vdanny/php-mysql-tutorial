<?php
include("connect.php");

$nama = $_GET['nama'];
$deskripsi = $_GET['deskripsi'];
$qty = $_GET['qty'];

$result = mysql_query("INSERT INTO msbarang (nama, deskripsi, qty) VALUES('$nama', '$deskripsi', $qty)");

if($result){
	header("location:tambah_barang.php?success=1");
}
else{
	header("location:tambah_barang.php?success=0");	
}
?>