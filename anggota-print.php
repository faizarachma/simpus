<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Print Anggota</title>
	</head>

	<body>
		<?php
		include 'koneksi.php';

		$id = $_GET['id'];

		$query = mysqli_query($koneksi, "SELECT * FROM tbanggota WHERE idanggota = '".$id."'");
		$anggota = mysqli_fetch_array($query);
		$foto = (@$anggota['foto']) ?: 'default.png' ;
		?>
		<div class="kartu">
			<img src="upload/<?=$foto?>" width="200">
			<table>
				<tr>
					<td>ID Anggota</td>
					<td>: <?=$anggota['kdanggota']?></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>: <?=$anggota['nama']?></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>: <?=$anggota['jeniskelamin']?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>: <?=$anggota['alamat']?></td>
				</tr>
			</table>
		</div>

		<script type="text/javascript">
			window.print();
		</script>
	</body>
</html>