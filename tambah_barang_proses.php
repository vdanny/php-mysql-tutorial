<?php
// connect ke DB
include("connect.php");

// get semua value yang disubmit
$nama = $_GET['nama'];
$deskripsi = $_GET['deskripsi'];
$qty = $_GET['qty'];

// query insert
$result = mysql_query("INSERT INTO msbarang (nama, deskripsi, qty) VALUES('$nama', '$deskripsi', $qty)");

// redirect dan beri pesan kepada user
if($result){
	header("location:tambah_barang.php?success=1");
}
else{
	header("location:tambah_barang.php?success=0");	
}
?>