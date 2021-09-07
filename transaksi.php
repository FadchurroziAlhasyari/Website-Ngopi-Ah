<?php
	error_reporting(0);
	include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
	$a = mysqli_fetch_object($kontak);

	$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard | Kedai Ngopi Ah</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@300&display=swap" rel="stylesheet">
</head>
<body>

	<header>
		<div class="container">
			<h1><a href="index.php"><img src="img/logo-ngopiah.png" width="150px" max-height="100px"></a></h1>
			<ul>
				<li><a href="dashboard.php">Menu</a></li>
				<li><a href="produk.php">Produk</a></li>
				<li><a href="transaksi.php">Transaksi</a></li>
				<li><a href="login.php">Login</a></li>
			</ul>
		</div>
	</header>

<center><br>
	<div class="box-login">
		<h2>Transaksi via whattsapp</h2><br>
		<div class="transaksi"></div>
		<form action="" method="POST">
			<input type="text" name="name" placeholder="Nama pemesan" class="input-control">
			<input type="text" name="pesan" placeholder="Kategori makanan" class="input-control">
			<input type="text" name="pesan2" placeholder="Produk makanan" class="input-control">
			<input type="text" name="alamat" placeholder="Alamat pemesan" class="input-control">
			<input type="text" name="nohp" placeholder="No. Hp pemesan" class="input-control">
			<center><a href="https://wa.me/628521234567"><input type="submit" name="submit" value="Pesan" class="btn"></center></a>
		</form>
	</div>
</center>
<br>
	<br><div class="footer">
		<div class="container">
<br>
			<h4><small>Copyright &copy; 2021 - Kedai Ngopi Ah <br> Jln. Mantrijeron, No.11, Yogyakarta <br> 081254407087</small></h4>
		</div>
	</div>

</body>
</html>