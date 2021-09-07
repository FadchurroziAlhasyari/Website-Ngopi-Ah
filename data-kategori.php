<?php
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Kategori| Kedai Ngopi Ah</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@300&display=swap" rel="stylesheet">
</head>
<body>

	<header>
		<div class="container">
			<h1><a href="profile.php"><img src="img/logo-ngopiah.png" width="150px" max-height="100px"></a></h1>
			<ul>
				<li><a href="profile.php">Profile</a></li>
				<li><a href="data-kategori.php">Data Kategori</a></li>
				<li><a href="data-produk.php">Data Produk</a></li>
				<li><a href="logout.php">Keluar</a></li>
			</ul>
		</div>
	</header>

	<div class="section">
		<div class="container">
			<h3>Data Kategori</h3><br>
			<div class="box">
				<p><a href="tambah-kategori.php">Tambah Data</a></p>
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="60px">No</th>
							<th>Kategori</th>
							<th width="150px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$kategori = mysqli_query ($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
							if (mysqli_num_rows($kategori) > 0) {
						
							while ($row = mysqli_fetch_array($kategori)) {
							
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['category_name'] ?></td>
							<td>
								<a href="edit-kategori.php?id=<?php echo $row['category_id'] ?>">Edit</a> || <a href="proses-hapus.php?idk=<?php echo $row['category_id'] ?>" onclick="return confirm('Yakin mau di hapus say')">Hapus</a>
							</td>
						</tr>
						<?php }} else { ?>
							<tr>
								<td colspan="3">Tidak ada data</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<footer>
		<br>
<br>
	<br><div class="footer">
		<div class="container">
<br>
			<h4><small>Copyright &copy; 2021 - Kedai Ngopi Ah <br> Jln. Mantrijeron, No.11, Yogyakarta <br> 081254407087</small></h4>
		</div>
	</div>

	</footer>
</body>
</html>