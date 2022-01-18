<div class="p-3">
	<h2 class="mb-3">Data Anggota</h2>

	<div class="float-right mb-3">
		<div class="btn-group" role="group" aria-label="Basic example">
			<a href="index.php?page=transaksi-form&mode=pinjam" class="btn btn-light"><i class="fa fa-plus"></i> Transaksi</a>
		</div>
	</div>

	<table class="table table-striped">
		<tr>
			<th>No.</th>
			<th>ID Transaksi</th>
			<th>ID Anggota</th>
			<th>Nama</th>
			<th>ID Buku</th>
			<th>Judul Buku</th>
			<th>Tanggal Pinjam</th>
			<th>Opsi</th>
		</tr>

		<?php
		$query = mysqli_query($koneksi, "
			SELECT * FROM tbtransaksi 
			JOIN tbanggota ON tbanggota.idanggota = tbtransaksi.idanggota
			JOIN tbbuku ON tbbuku.idbuku = tbtransaksi.idbuku
			WHERE tanggal_kembali = '0000-00-00'
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
				<td class="text-right">
					<div class="btn-group" role="group" aria-label="Basic example">
						<a href="transaksi-print.php?id=<?=$val['idtransaksi']?>" class="btn btn-sm btn-info" target="_blank">
							<i class="fa fa-address-card"></i> Cetak Nota
						</a>
						<a href="index.php?page=transaksi-form&mode=kembali&id=<?=$val['idtransaksi']?>" class="btn btn-sm btn-success">
							<i class="fa fa-edit"></i> Pengembalian
						</a>
					</div>
				</td>
			</tr>
			<?php
		}
		?>
	</table>
</div>