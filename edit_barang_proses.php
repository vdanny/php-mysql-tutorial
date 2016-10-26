<?php 
// connect ke DB
include "connect.php";

// get semua value yang disubmit
$id = $_GET['id'];
$nama = $_GET['nama'];
$deskripsi = $_GET['deskripsi'];
$qty = $_GET['qty'];

// query update
$result = mysql_query("UPDATE msbarang SET nama = '$nama', deskripsi = '$deskripsi', qty = $qty WHERE id = $id");

// redirect dan beri pesan kepada user
if($result){
	header("location:edit_barang.php?id=$id&success=1");
}
else{
	header("location:edit_barang.php?id=$id&success=0");
}

?>