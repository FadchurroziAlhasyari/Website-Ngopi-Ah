<?php
	error_reporting(0);
	include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
	$a = mysqli_fetch_object($kontak);
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
        		<li><a href="transaksi.php">Transaksi</a>
				<li><a href="login.php">Login</a></li>
			</ul>
		</div>
	</header>

	<div class="search">
		<div class="container">
			<form action="produk.php">
				<input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
				<input type="hidden" name="kategori" value="<?php echo $_GET['kategori'] ?>">
				<input type="submit" name="cari" value="Cari produk">
			</form>
		</div>
	</div>

	<div class="section">
		<div class="container">
			<h3>Produk</h3><br>
			<div class="box">
				<?php
					if ($_GET['search'] != '' || $_GET['kategori'] != ''){
						$where = "AND product_name LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['kategori']."%' ";
					}

					$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC");
					if (mysqli_num_rows($produk) > 0) {
						while ($p = mysqli_fetch_array($produk)) {
				?>
				<div class="col-4">

					<img src="produk/<?php echo $p['product_image'] ?>">
					<p class="nama"><?php echo $p['product_name'] ?></p><br>
					<p class="harga">Rp.<?php echo number_format($p['product_price']) ?></p>
				</div>

				<?php
					}} else { ?>
						<p>Product tidak ada</p>
				<?php } ?>
			</div>
		</div>
	</div>
<br>
<br>
	<br><div class="footer">
		<div class="container">
<br>
			<h4><small>Copyright &copy; 2021 - Kedai Ngopi Ah <br> Jln. Mantrijeron, No.11, Yogyakarta <br> 081254407087</small></h4>
		</div>
	</div>

</body>
</html>