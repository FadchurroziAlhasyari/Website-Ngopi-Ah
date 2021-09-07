<?php
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}

	$kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id = '".$_GET['id']."' ");
	if (mysqli_num_rows($kategori) == 0) {
		echo '<script>window.location="data-kategori.php"</script>';
	}
	$k = mysqli_fetch_object($kategori);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit kategori | Kedai Ngopi Ah</title>
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
			<h3>Edit Data Kategori</h3><br>
			<div class="box">
				<form action="" method="POST">
					<input type="text" name="nama" placeholder="Nama Kategori" class="input-control" value="<?php echo $k->category_name ?>"required>
					<input type="submit" name="submit" value="Submit" class="btn">
				</form>
				
				<?php
				if (isset($_POST['submit'])) {
					
					$nama = ucwords($_POST['nama']);

					$update = mysqli_query($conn, "UPDATE tb_category SET
													category_name = '".$nama."' 
													WHERE category_id = '".$k->category_id."' ");

				if ($update) {
					echo '<script>alert("Edit data berhasil")</script>';
					echo '<script>window.location="data-kategori.php"</script>';
								}else {
									echo 'Gagal'.mysqli_error($conn);
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

	</footer>
</body>
</html>
<?php

include 'db.php';

if (isset($_GET['idk'])) {
	$delete = mysqli_query ($conn, "DELETE FROM tb_category WHERE category_id = '".$_GET['idk']."' ");
	echo '<script>window.location="data-kategori.php"</script>';
}
?>