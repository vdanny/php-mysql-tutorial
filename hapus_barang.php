<?php  
// connect ke DB
include("connect.php");

// redirect jika tidak ada query string 'id'
if(isset($_GET['id']) == false){
	header('location:list_barang.php');
}

// get id dan query delete
$id = $_GET['id'];
$query = "DELETE FROM msbarang WHERE id=$id";

$result = mysql_query($query);

// redirect dan beri pesan kepada user
if($result){
	header('location:list_barang.php?success=1');
}
else{
	header('location:list_barang.php?success=0');
}


?>