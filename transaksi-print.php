<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Print Anggota</title>
	<style type="text/css">
		.text-center {
			text-align: center;
		}
	</style>
</head>

<body>
	<?php
	include 'koneksi.php';

	$id = $_GET['id'];

	$query = mysqli_query($koneksi, "
		SELECT * FROM tbtransaksi 
		JOIN tbanggota ON tbanggota.idanggota = tbtransaksi.idanggota
		JOIN tbbuku ON tbbuku.idbuku = tbtransaksi.idbuku
		WHERE idtransaksi = '".$id."'
		");
	$transaksi = mysqli_fetch_array($query);
	?>
	<div class="kartu">
		<h2 class="text-center">Nota Pinjam Buku</h2>
		<p>Tanggal Pinjam : <?=date('d F Y', strtotime($transaksi['tanggal_pinjam']))?></p>
		<br/>
		<table>
			<tr>
				<td>ID Anggota</td>
				<td>: <?=$transaksi['kdanggota']?></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>: <?=$transaksi['nama']?></td>
			</tr>
			<tr>
				<td>Kode Buku</td>
				<td>: <?=$transaksi['kdbuku']?></td>
			</tr>
			<tr>
				<td>Judul Buku</td>
				<td>: <?=$transaksi['judulbuku']?></td>
			</tr>
		</table>
		<br/>
		<p class="text-center">------</p>
		<p class="text-center">terima kasih</p>
	</div>

	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>