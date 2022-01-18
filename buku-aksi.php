<?php
include "koneksi.php";

// ambil/baca data dari form action
$mode 			= $_GET['mode'];

// ambil/baca data dari form
$idbuku			= @$_POST['idbuku'];
$kdbuku 		= @$_POST['kdbuku'];
$judulbuku 		= @$_POST['judulbuku'];
$pengarang 		= @$_POST['pengarang'];
$kategori		= @$_POST['kategori'];
$penerbit		= @$_POST['penerbit'];
$stok 			= @$_POST['stok'];
$status			= @$_POST['status'];

if($mode == 'add'){

	if($stok == 1){
		$status = "Dipinjam";
	}else if($stok > 1){
		$status = "Tersedia";
		var_dump($status);
	}else{
		$status = "Stok habis";
	}
	$query = "
		INSERT INTO tbbuku (kdbuku, judulbuku, kategori,pengarang, penerbit, status, stokbuku) 
		VALUES ('$kdbuku', '$judulbuku', '$kategori', '$pengarang', '$penerbit', '$status', '$stok')";
	$check = mysqli_query($koneksi, $query);

 	
}else if($mode=="edit"){
	if($stok == 1){
		$status = "Tersedia";
	}else if($stok > 1){
		$status = "Dipinjam";
		var_dump($status);
	}else{
		$status = "Stok habis";
	}

	$query = "UPDATE tbbuku SET
		kdbuku 			= '$kdbuku',
		judulbuku 		= '$judulbuku',
		kategori 		= '$kategori',
		pengarang		= '$pengarang',
		penerbit 		= '$penerbit',
		status 			= '$status',
		stokbuku 		= '$stok'
		WHERE idbuku 	= '$idbuku'";
	$check = mysqli_query($koneksi, $query);


	
}else{
	$idbuku = $_GET['id'];

	$query = mysqli_query($koneksi, "SELECT judulbuku FROM tbbuku WHERE idbuku = '".$idbuku."'");
	$buku = mysqli_fetch_array($query);

	$query = "DELETE FROM tbbuku WHERE idbuku = '".$idbuku."'";
	$check = mysqli_query($koneksi, $query);
}

if($check){
	// mengarahkan ke halaman list buku
	header("location: index.php?page=buku-list");
}
else{
	echo "Pesan error: ". mysqli_error($koneksi);
}
?>