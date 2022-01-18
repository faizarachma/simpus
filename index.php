<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">

		<title>Sistem Infromasi Perpustakaan</title>
	</head>
	<body>
		<?php
		session_start();
		if(!@$_SESSION['id_admin']){
			header('Location: login.php');
		}
		?>
		<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
			<div class="container">
				<a class="navbar-brand" href="#"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="index.php">Beranda</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Data Master
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="index.php?page=anggota-list">Anggota</a>
								<a class="dropdown-item" href="index.php?page=buku-list">Buku</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?page=transaksi-list">Transaksi</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Laporan
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="index.php?page=lap-peminjaman">Daftar Peminjaman</a>
								<a class="dropdown-item" href="index.php?page=lap-pengembalian">Daftar Pengembalian</a>
							</div>
						</li>
					</ul>

					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?=$_SESSION['sesi'];?>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="logout.php">Log Out</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<?php
					// panggil fungsi koneksi ke database
					include "koneksi.php";
	
					if(@$_GET['page']){
						$page = $_GET['page'];

						include $page.".php";
					}
					else{
						include "beranda.php";						
					}
					?>
				</div>
			</div>
		</div>

		<!-- Optional JavaScript; choose one of the two! -->
		<script src="assets/js/jquery-3.5.1.slim.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
	</body>
</html>