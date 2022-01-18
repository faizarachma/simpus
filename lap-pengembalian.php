<div class="p-3">
	<h2 class="mb-3">Laporan Transaksi Peminjaman Buku</h2>

	<table class="table table-striped">
		<tr>
			<th>No.</th>
			<th>ID Transaksi</th>
			<th>ID Anggota</th>
			<th>Nama</th>
			<th>ID Buku</th>
			<th>Judul Buku</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Kembali</th>
		</tr>

		<?php
		$query = mysqli_query($koneksi, "
			SELECT * FROM tbtransaksi 
			JOIN tbanggota ON tbanggota.idanggota = tbtransaksi.idanggota
			JOIN tbbuku ON tbbuku.idbuku = tbtransaksi.idbuku
			WHERE tanggal_kembali != '0000-00-00'
			");

		foreach($query as $ky => $val){
			$no = $ky + 1;
			?>
			<tr>
				<td><?=$no?>.</td>
				<td><?=$val['kdtransaksi']?></td>
				<td><?=$val['kdanggota']?></td>
				<td><?=$val['nama']?></td>
				<td><?=$val['kdbuku']?></td>
				<td><?=$val['judulbuku']?></td>
				<td><?=$val['tanggal_pinjam']?></td>
				<td><?=$val['tanggal_kembali']?></td>
			</tr>
			<?php
		}
		?>
	</table>
</div>