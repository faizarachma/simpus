<div class="p-3">
	<?php
	// baca mode form
	$mode = $_GET['mode'];

	var_dump($mode);
	if($mode == 'add'){
		$judul = 'Tambah Data Buku';

		// baca record terakhir "tbbuku", untuk melihat kdbuku terakhir
		$query = mysqli_query($koneksi, "SELECT kdbuku FROM tbbuku ORDER BY kdbuku DESC");
		$buku = mysqli_fetch_array($query);

		if(@$buku['kdbuku']){
			$kdbuku = "BK".(substr($buku['kdbuku'], 2) + 1);
		}
		else{
			$kdbuku = "BK".date("y")."0001";		
		}
		$foto = 'default.png';
	}
	else{
		$judul = 'Data Buku';

		$id = $_GET['id'];

		// baca data anggota berdasarkan $_GET['id'] / idanggota
		$query = mysqli_query($koneksi, "SELECT * FROM tbbuku WHERE idbuku = '".$id."'");
		$buku = mysqli_fetch_array($query);

		$kdbuku = $buku['kdbuku'];
	}
	?>
	<h2 class="mb-3"><?=$judul?></h2>
	<div class="card">
		<div class="card-body">
			<form action="buku-aksi.php?mode=<?=$mode?>" method="POST" enctype="multipart/form-data">

				
			<?php if($mode == "edit"){?>
				<input type="hidden" name="id" value="<?php echo $id?>">
				<input type="hidden" name="status" value="<?php echo $buku['status']?>">
				<?php  } ?>

				
				<div class="form-group row">
					<label for="kdbuku" class="col-lg-2 col-form-label">Kode Buku</label>
					<div class="col-lg-3">
						<input type="text" name="kdbuku" value="<?=$kdbuku?>" class="form-control" id="kdbuku" readonly>
					</div>
				</div>

				<div class="form-group row">
					<label for="judulbuku" class="col-lg-2 col-form-label">Judul Buku</label>
					<div class="col-lg-6">
						<input type="text" name="judulbuku" value="<?=@$buku['judulbuku']?>" class="form-control" id="judulbuku">
					</div>
				</div>

				<div class="form-group row">
					<label for="kategori" class="col-lg-2 col-form-label">Kategori</label>
					<div class="col-lg-6">
						<input type="text" name="kategori" value="<?=@$buku['kategori']?>" class="form-control" id="kategori">
					</div>
				</div>

				<div class="form-group row">
					<label for="pengarang" class="col-lg-2 col-form-label">Pengarang</label>
					<div class="col-lg-6">
						<input type="text" name="pengarang" value="<?=@$buku['pengarang']?>" class="form-control" id="pengarang">
					</div>
				</div>

				<div class="form-group row">
					<label for="penerbit" class="col-lg-2 col-form-label">Penerbit</label>
					<div class="col-lg-6">
						<input type="text" name="penerbit" value="<?=@$buku['penerbit']?>" class="form-control" id="penerbit">
					</div>
				</div>

				<div class="form-group row">
					<label for="stok" class="col-lg-2 col-form-label">Stok Buku</label>
					<div class="col-lg-6">
						<input type="text" name="stok" value="<?=@$buku['stok']?>" class="form-control" id="stok">
					</div>
				</div>

				<div class="form-group row">
					<label for="nama" class="col-lg-2 col-form-label"><a href="index.php?page=buku-list"><i class="fa fa-arrow-left"></i> kembali</a></label>
					<div class="col-lg-6">
					<?php if($mode == "edit"){?>
						<input type="hidden" name="idbuku" value="<?=$buku['idbuku']?>">
						<?php }?>
						<button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-save"></i> Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>