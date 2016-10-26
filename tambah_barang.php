<!DOCTYPE html>
<html>
<head>
	<title>AMDP Inventory</title>
</head>
<body>

	<h1>Tambah Barang</h1>

	<form method="get" action="tambah_barang_proses.php">
	<table>
		<tr>
			<td>Nama</td>
			<td>
				<input type="text" name="nama">
			</td>
		</tr>
		<tr>
			<td>Deskripsi</td>
			<td>
				<input type="text" name="deskripsi">
			</td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td>
				<input type="text" name="qty">
			</td>
		</tr>
		<tr>
			<td>
				<a href="list_barang.php">Kembali</a>
			</td>
			<td>
				<input type="submit" value="Tambah">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php 
				// tampilkan pesan berhasil/gagal
				if($_GET['success']){
					$success = $_GET['success'];
					if($success == 1){
						echo "Barang berhasil ditambahkan.";
					}
					else{
						echo "Barang gagal ditambahkan.";	
					}
				}
				?>
			</td>
		</tr>
	</table>
	</form>

</body>
</html>