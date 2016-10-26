<?php
// connect ke DB
include("connect.php");

// validasi query string 'page'
if(isset($_GET['page'])){
	$curr_page = $_GET['page'];
	if($curr_page <= 1) $curr_page = 1;
}
else{
	$curr_page = 1;
}


// PAGINATION
// hitung jumlah row
// validasi jika table kosong
$res = mysql_query("SELECT * FROM msbarang");
if($res){
	$row_num = mysql_num_rows($res);	
}
else{
	$row_num = 0;
}
// set jumlah row per page
$data_per_page = 2;
// set jumlah page yang ditampilkan
$page_to_show = 5;
// hitung jumlah page
$page_num = $row_num % $data_per_page != 0 ? floor($row_num/$data_per_page) + 1 : $row_num/$data_per_page;
// hitung batas awal dan akhir
$start = ($curr_page-1) * $data_per_page;

// query data
$result = mysql_query("SELECT * FROM msbarang LIMIT $start, $data_per_page");
?>
<!DOCTYPE html>
<html>
<head>
	<title>AMDP Inventory</title>
</head>
<body>

	<h2>List Barang</h2>
	<a href="tambah_barang.php">+ Tambah</a>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>Nama</th>
			<th>Deskripsi</th>
			<th>Jumlah</th>
			<th>Action</th>
		</tr>
		<?php
		// jika ada data, maka tampilkan semua data
		if($result){
			while($row = mysql_fetch_array($result)){
			?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['nama']; ?></td>
				<td><?php echo $row['deskripsi']; ?></td>
				<td><?php echo $row['qty']; ?></td>
				<td>
					<a href="edit_barang.php?id=<?php echo $row['id'];?>">Edit</a>
					<a href="hapus_barang.php?id=<?php echo $row['id'];?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?');">Hapus</a>
				</td>
			</tr>
			<?php
			}
		}
		// jika tidak ada, beri pesan
		else{
			echo "<tr><td colspan='5'>No data available yet</td></tr>";
		}
		?>
	</table>
	<?php 
	// tampilkan pesan sukses
	if(isset($_GET['success'])){
		$success = $_GET['success'];
		if($success == 1){
			echo "Barang berhasil dihapus.";
		}
		else{
			echo "Barang gagal dihapus.";	
		}
		echo "<br>";
	}

	// mengatur start dan end page yang ditampilkan
	if ($curr_page < round($page_to_show/2)){
		$start = 1;
	}
	else if ($curr_page > $page_num - round($page_to_show/2)){
		$start = $page_num - 4;
	}
	else{
		$start = $curr_page - floor($page_to_show/2);
	}
	$end = $start + 4;

	// jika ada data, cetak page number
	if($row_num > 0){
		echo "Page: ";

		// tampilkan first dan prev
		if ($curr_page > 1){
			echo "<a href='list_barang.php?page=1'>First</a>&nbsp;";
			$prev = $curr_page - 1;
			echo "<a href='list_barang.php?page=$prev'>&lt;</a>";
		}

		// tampilkan nomor halaman
		for ($i=$start; $i<=$end; $i++) { 
		?>
			<a href="list_barang.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
		<?php
		}
		
		// tampilkan next dan last
		if($curr_page < $page_num){
			$next = $curr_page + 1;
			echo "<a href='list_barang.php?page=$next'>&gt;</a>&nbsp;";
			echo "<a href='list_barang.php?page=$page_num'>Last</a>";
		}
	}	
	?>
</body>
</html>