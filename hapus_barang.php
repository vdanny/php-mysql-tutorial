<?php  

include("connect.php");

if(isset($_GET['id']) == false){
	header('location:list_barang.php');
}

$id = $_GET['id'];
$query = "DELETE FROM msbarang WHERE id=$id";

$result = mysql_query($query);

if($result){
	header('location:list_barang.php?success=1');
}
else{
	header('location:list_barang.php?success=0');
}


?>