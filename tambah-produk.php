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
	<title>Tambah Produk | Kedai Ngopi Ah</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@300&display=swap" rel="stylesheet">
	<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
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
			<h3>Tambah Data Produk</h3><br>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
					<select class="input-control" name="kategori" required>
						<option>--Pilih--</option>
						<?php
							$kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
							while ($r = mysqli_fetch_array($kategori)) {
						?><br/>
						<option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name'] ?></option>
					<?php } ?>
					</select>

					<input type="text" name="nama" placeholder="Nama Produk" class="input-control" required>
					<input type="text" name="harga" placeholder="Harga" class="input-control" required>
					<input type="file" name="gambar" class="input-control" required>
					<textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea>
					<select class="input-control" name="status">
						<option value="">--Pilih--</option>
						<option value="1">Aktif</option>
						<option value="0">Tidak Aktif</option>
					</select> 
					<input type="submit" name="submit" value="Submit" class="btn">
				</form>
				<?php
					if(isset($_POST['submit'])){

						// print_r($_FILES['gambar']);
						// menampung inputan dari form
						$kategori 	= $_POST['kategori'];
						$nama 		= $_POST['nama'];
						$harga  	= $_POST['harga'];
						$deskripsi  = $_POST['deskripsi'];
						$status 	= $_POST['status'];

						// menampung data file yang diupload
						$filename	= $_FILES['gambar']['name'];
						$tmp_name	= $_FILES['gambar']['tmp_name'];

						$type1	= explode('.', $filename);
						$type2	= $type1[1];

						$newname 	= 'produk'.time().$type2;

						// menampung data format file yang di izinkan
						$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

						// validasi format file
						if (!in_array($type2, $tipe_diizinkan)) {
							// jika format file tidak ada di dalam tipe diizinkan
							echo '<script>alert("Format file tidak diizinkan")</script>';
						}else {
						// jika format file sesuai dengan yang ada di dalam array tipe diizinkan
						// proses upload file sekaligus insert ke database
						move_uploaded_file($tmp_name, './produk/'.$newname);

						$insert 	= mysqli_query($conn, "INSERT INTO tb_product VALUES (
										null,
										'".$kategori."',
										'".$nama."',
										'".$harga."',
										'".$deskripsi."',
										'".$newname."',
										'".$status."',
										null
											) ");
						if ($insert) {
							echo '<script>alert("Tambah data berhasil")</script>';
							echo '<script>window.location="data-produk.php"</script>';
						} else {
							echo 'Gagal' .mysqli_error($conn);
						}
					}

				}
				?>
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

	<script>
		CKEDITOR.replace('deskripsi');
	</script>
</body>
</html>