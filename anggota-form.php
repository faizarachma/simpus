<div class="p-3">
	<?php



	// baca mode form
	$mode = $_GET['mode'];


	if($mode == 'add'){
		$judul = 'Tambah Data Anggota';

		// baca record terakhir "tbanggota", untuk melihat kdanggota terakhir
		$query = mysqli_query($koneksi, "SELECT kdanggota FROM tbanggota ORDER BY kdanggota DESC");
		$anggota = mysqli_fetch_array($query);

		
		if(@$anggota['kdanggota']){
			// substr(AG202222, 2) -> 202222 di ambil data ke 2[array] / urutan ke 3;
			$kdanggota = "AG".(substr($anggota['kdanggota'], 2) + 1);
		}
		else{
			$kdanggota = "AG".date("y")."0001";		
		}
		$foto = 'default.png';
	}
	else if($mode == 'edit'){
		$judul = 'Ubah Data Anggota';

		$id = $_GET['id'];

		// baca data anggota berdasarkan $_GET['id'] / idanggota
		$query = mysqli_query($koneksi, "SELECT * FROM tbanggota WHERE idanggota = '".$id."'");
		$anggota = mysqli_fetch_array($query);

		$foto = $anggota['foto'];
		$kdanggota = $anggota['kdanggota'];
	}

		

	?>
	<h2 class="mb-3"><?=$judul?></h2>
	<div class="card">
		<div class="card-body">
			<form action="anggota-aksi.php?mode=<?=$mode?>" method="POST" enctype="multipart/form-data">
			
			<?php if($mode == "edit"){?>
			<input type="hidden" name="status" value="<?php echo $anggota['status']?>">
			<?php }?>
				<div class="form-group row">
					<label for="foto" class="col-lg-2 col-form-label">Foto</label>
					<div class="col-lg-6">
						<img src="upload/<?=$foto?>" width="100"><br/>
						<input type="hidden" name="foto_lama" value="<?=$foto?>" id="foto">
						<input type="file" name="foto" value="" id="foto">
					</div>
				</div>

				<div class="form-group row">
					<label for="kdanggota" class="col-lg-2 col-form-label">ID Anggota</label>
					<div class="col-lg-3">
						<input type="text" name="kdanggota" value="<?=$kdanggota?>" class="form-control" id="kdanggota" readonly>
					</div>
				</div>

				<div class="form-group row">
					<label for="nama" class="col-lg-2 col-form-label">Nama</label>
					<div class="col-lg-6">
						<input type="text" name="nama" value="<?=@$anggota['nama']?>" class="form-control" id="nama">
					</div>
				</div>

				<div class="form-group row">
					<label for="jeniskelamin-l" class="col-lg-2 col-form-label">Jenis Kelamin</label>
					<div class="col-lg-5">
						<div class="form-check">
							<input class="form-check-input" name="jeniskelamin" type="radio" value="Pria" id="jeniskelamin-p" <?=(@$anggota['jeniskelamin'] == 'Pria' ? 'checked' : '')?>>
							<label class="form-check-label" for="jeniskelamin-p">
								Pria
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" name="jeniskelamin" type="radio" value="Wanita" id="jeniskelamin-w" <?=(@$anggota['jeniskelamin'] == 'Wanita' ? 'checked' : '')?>>
							<label class="form-check-label" for="jeniskelamin-w">
								Wanita
							</label>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label for="alamat" class="col-lg-2 col-form-label">Alamat</label>
					<div class="col-lg-6">
						<textarea name="alamat" class="form-control" rows="2"><?=@$anggota['alamat']?></textarea>
					</div>
				</div>

				<div class="form-group row">
					<label for="nama" class="col-lg-2 col-form-label"><a href="index.php?page=anggota-list"><i class="fa fa-arrow-left"></i> kembali</a></label>
					<div class="col-lg-6">
						<?php if($mode=="edit"){?>
						<input type="hidden" name="idanggota" value="<?=$anggota['idanggota']?>">
						<?php } ?>
						<button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-save"></i> Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>