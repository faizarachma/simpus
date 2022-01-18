<div class="p-3">
	<?php
	// baca mode form
	$mode = $_GET['mode'];

	if($mode == 'pinjam'){
		$judul = 'Tambah Data Transaksi';

		// baca record terakhir "tbtransaksi", untuk melihat kdtransaksi terakhir
		$query = mysqli_query($koneksi, "SELECT kdtransaksi FROM tbtransaksi ORDER BY kdtransaksi DESC");
		$anggota = mysqli_fetch_array($query);

		if(@$anggota['kdtransaksi']){
			// substr(TR202222, 2) -> 202222 di ambil data ke 2[array] / urutan ke 3;
			$kdtransaksi = "TR".(substr($anggota['kdtransaksi'], 2) + 1);
		}
		else{
			$kdtransaksi = "TR".date("y")."0001";		
		}

		$status_anggota = 'Tidak Meminjam';
		$status_buku = 'Tersedia';
	}
	else{
		$judul = 'Pengembalian Buku';

		$id = $_GET['id'];

		// baca data transaksi berdasarkan $_GET['id'] / idtransaksi
		$query = mysqli_query($koneksi, "SELECT * FROM tbtransaksi WHERE idtransaksi = '".$id."'");
		$transaksi = mysqli_fetch_array($query);

		$kdtransaksi = $transaksi['kdtransaksi'];

		$status_anggota = 'Sedang Meminjam';
		$status_buku = 'Dipinjam';

	}

	// panggil data anggota untuk di pilih di transaksi
	$anggota = mysqli_query($koneksi, "SELECT * FROM tbanggota WHERE status = '$status_anggota'");

	// panggil data buku untuk di pilih di transaksi
	$buku = mysqli_query($koneksi, "SELECT * FROM tbbuku WHERE status ='$status_buku'");
	?>
	<h2 class="mb-3"><?=$judul?></h2>
	<div class="card">
		<div class="card-body">
			<form action="transaksi-aksi.php?mode=<?=$mode?>" method="POST">
				<div class="form-group row">
					<label for="kdtransaksi" class="col-lg-2 col-form-label">KD Transaksi</label>
					<div class="col-lg-3">
						<input type="text" name="kdtransaksi" value="<?=$kdtransaksi?>" class="form-control" id="kdtransaksi" readonly>
					</div>
				</div>

				<div class="form-group row">
					<label for="nama" class="col-lg-2 col-form-label">ID Anggota</label>
					<div class="col-lg-6">
						<select name="idanggota" class="form-control">
							<?php
							foreach ($anggota as $key => $value) {
								// code...
								?>
								<option value="<?=$value['idanggota']?>"><?=$value['nama']?></option>
								<?php
							}
							?>							
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label for="nama" class="col-lg-2 col-form-label">ID Buku</label>
					<div class="col-lg-6">
						<select name="idbuku" class="form-control">
							<?php
							foreach ($buku as $key => $value) {
								// code...
								?>
								<option value="<?=$value['idbuku']?>"><?=$value['judulbuku']?></option>
								<?php
							}
							?>							
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label for="nama" class="col-lg-2 col-form-label"><a href="index.php?page=transaksi-list"><i class="fa fa-arrow-left"></i> kembali</a></label>
					<div class="col-lg-6">
						<input type="hidden" name="idtransaksi" value="<?=@$transaksi['idtransaksi']?>">
						<button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-save"></i> Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>