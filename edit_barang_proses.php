<?php 

include "connect.php";

$id = $_GET['id'];
$nama = $_GET['nama'];
$deskripsi = $_GET['deskripsi'];
$qty = $_GET['qty'];

$result = mysql_query("UPDATE msbarang SET nama = '$nama', deskripsi = '$deskripsi', qty = $qty WHERE id = $id");

if($result){
	header("location:edit_barang.php?id=$id&success=1");
}
else{
	header("location:edit_barang.php?id=$id&success=0");
}

?>