<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Print Anggota</title>
	</head>

	<body>
		<div class="">
			<h2 class="">Data Anggota</h2>

			<table class="">
				<tr>
					<th>No.</th>
					<th>ID Anggota</th>
					<th>Nama</th>
					<th>Foto</th>
					<th>JK</th>
					<th>Alamat</th>
					<th>Status</th>
				</tr>

				<?php
				include 'koneksi.php';
				
				$query = mysqli_query($koneksi, "SELECT * FROM tbanggota");

				foreach($query as $ky => $val){
					$no = $ky + 1;
					$foto = (!@$val['foto']) ? 'default.png' : $val['foto'];
					$nama_kode = $val['nama'].' ['.$val['kdanggota'].']';
					?>
					<tr>
						<td><?=$no?>.</td>
						<td><?=$val['kdanggota']?></td>
						<td><?=$val['nama']?></td>
						<td><img src="upload/<?=$foto?>" width="100"></td>
						<td><?=$val['jeniskelamin']?></td>
						<td><?=$val['alamat']?></td>
						<td><?=$val['status']?></td>
					</tr>
					<?php
				}
				?>
			</table>
		</div>

		<script type="text/javascript">
			window.print();
		</script>
	</body>
</html>