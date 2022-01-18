<?php
include "koneksi.php";

// ambil/baca data dari form action
$mode 			= $_GET['mode'];

// ambil/baca data dari form
$idtransaksi 	= @$_POST['idtransaksi'];
$kdtransaksi 	= @$_POST['kdtransaksi'];
$idanggota 		= @$_POST['idanggota'];
$idbuku 		= @$_POST['idbuku'];


if($mode == 'pinjam'){
	$status_anggota = "Sedang Meminjam";
	$status_buku = "Dipinjam";
	$tanggal_pinjam = date('Y-m-d');

	// query update status data anggota yang pinjam buku
	mysqli_query($koneksi, "UPDATE tbanggota SET status = '$status_anggota' WHERE idanggota = '$idanggota'");

	// query update status data buku yang dipinjam
	mysqli_query($koneksi, "UPDATE tbbuku SET status = '$status_buku' WHERE idbuku = '$idbuku'");

	// query input data transaksi ke database
	$check = mysqli_query($koneksi, "INSERT INTO tbtransaksi (kdtransaksi, idanggota, idbuku, tanggal_pinjam) VALUES ('$kdtransaksi', '$idanggota', '$idbuku', '$tanggal_pinjam')");

}
else{
	$idtransaksi = $_POST['idtransaksi'];

	$status_anggota = "Tidak Meminjam";
	$status_buku = "Tersedia";
	echo $tanggal_kembali = date('Y-m-d');

	// query update status data anggota yang pinjam buku
	mysqli_query($koneksi, "UPDATE tbanggota SET status = '$status_anggota' WHERE idanggota = '$idanggota'");

	// query update status data buku yang dipinjam
	mysqli_query($koneksi, "UPDATE tbbuku SET status = '$status_buku' WHERE idbuku = '$idbuku'");

	// query update data transaksi pengembalian buku
	$check = mysqli_query($koneksi, "UPDATE tbtransaksi SET tanggal_kembali = '$tanggal_kembali' WHERE idtransaksi = '$idtransaksi'");
}

if($check){
	// mengarahkan ke halaman list anggota
	header("location: index.php?page=transaksi-list");
}
else{
	echo "Pesan error: ". mysqli_error($koneksi);
}
?>