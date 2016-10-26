<?php 
// redirect jika tidak memiliki query string 'id'
if(isset($_GET['id']) == false){
	header('location:list_barang.php');
}

// connect ke DB
include "connect.php";

// get ID dan query select
$id = $_GET['id'];
$query = "SELECT * FROM msbarang WHERE id = $id";
$result = mysql_query($query);

// jika hasil select NULL, redirect ke page list_barang
if(!$result){
	header('location:list_barang.php');	
}

// convert data ke array dan tampilkan di text field
$row = mysql_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>AMDP Inventory</title>
</head>
<body>

	<h1>Edit Barang</h1>

	<form method="get" action="edit_barang_proses.php">
	<table>
		<tr>
			<td>Nama</td>
			<td>
				<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
				<input type="text" name="nama" value="<?php echo $row['nama']; ?>">
			</td>
		</tr>
		<tr>
			<td>Deskripsi</td>
			<td>
				<input type="text" name="deskripsi" value="<?php echo $row['deskripsi']; ?>">
			</td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td>
				<input type="text" name="qty" value="<?php echo $row['qty']; ?>">
			</td>
		</tr>
		<tr>
			<td>
				<a href="list_barang.php">Kembali</a>
			</td>
			<td>
				<input type="submit" value="Edit">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php 
				// tampilkan pesan berhasil/gagal
				if(isset($_GET['success'])){
					$success = $_GET['success'];
					if($success == 1){
						echo "Barang berhasil diedit.";
					}
					else{
						echo "Barang gagal diedit.";	
					}
				}
				?>
			</td>
		</tr>
	</table>
	</form>

</body>
</html>