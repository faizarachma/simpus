<div class="p-3">
	<h2 class="mb-3">Data Buku</h2>

	<div class="float-right mb-3">
		<div class="btn-group" role="group" aria-label="Basic example">
			<a href="index.php?page=buku-form&mode=add" class="btn btn-light"><i class="fa fa-plus"></i>Buku</a>
			<a href="anggota-lap.php" class="btn btn-light" target="_blank"><i class="fa fa-print"></i> Buku</a>
		</div>
	</div>

	<table class="table table-striped">
		<tr>
			<th>No.</th>
			<th>Kode Buku</th>
			<th>Judul Buku</th>
			<th>Kategori</th>
			<th>Pengarang</th>
			<th>Penerbit</th>
			<th>Status</th>
			<th>Stok Buku</th>
			<th>Opsi</th>
		</tr>

		<?php
		include 'koneksi.php';
		$query = mysqli_query($koneksi, "SELECT * FROM tbbuku");

		foreach($query as $ky => $val){
			$no = $ky + 1;
			$nama_kode = $val['judulbuku'].' ['.$val['kdbuku'].']';
			?>
			<tr>
				<td><?=$no?>.</td>
				<td><?=$val['kdbuku']?></td>
				<td><?=$val['judulbuku']?></td>
				<td><?=$val['kategori']?></td>
				<td><?=$val['pengarang']?></td>
				<td><?=$val['penerbit']?></td>
				<td><?=$val['status']?></td>
				<td><?=$val['stokbuku']?></td>
				<td class="text-right">
					<div class="btn-group" role="group" aria-label="Basic example">
						<a href="index.php?page=buku-form&mode=edit&id=<?=$val['idbuku']?>" class="btn btn-sm btn-success">
							<i class="fa fa-edit"></i> Edit
						</a>
						<a href="buku-aksi.php?mode=delete&id=<?=$val['idbuku']?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus <?=$nama_kode ?>')">
							<i class="fa fa-close"></i> Hapus
						</a>
					</div>
				</td>
			</tr>
			<?php
		}
		?>
	</table>
</div>