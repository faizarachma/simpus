<?php
include "koneksi.php";

// ambil/baca data dari form action
$mode 			= $_GET['mode'];

// ambil/baca data dari form
$idanggota 		= @$_POST['idanggota'];
$kdanggota 		= @$_POST['kdanggota'];
$nama 			= @$_POST['nama'];
$jeniskelamin 	= @$_POST['jeniskelamin'];
$alamat 		= @$_POST['alamat'];
$foto_lama 		= @$_POST['foto_lama'];
$status 		= @$_POST['status'];



if($mode == 'add'){
	$foto = $_FILES['foto']['name'];
	if(@$foto){
		$lokasi_foto = $_FILES['foto']['tmp_name'];
		$ext_file = end(explode('.', $foto));
		$file_foto = $kdanggota.".".$ext_file;

		move_uploaded_file($lokasi_foto, "./upload/".$file_foto);
	}
	else{
		$file_foto = '';
	}
	$status = "Tidak Meminjam";

	$query = "
		INSERT INTO tbanggota (kdanggota, nama, jeniskelamin, alamat, status, foto) 
		VALUES ('$kdanggota', '$nama', '$jeniskelamin', '$alamat', '$status', '$file_foto')";
	$check = mysqli_query($koneksi, $query);
}
else if($mode == 'edit'){
	$foto = $_FILES['foto']['name'];
	if(@$foto){
		$lokasi_foto = $_FILES['foto']['tmp_name'];
		$ext_file = end(explode('.', $foto));
		$file_foto = $kdanggota.".".$ext_file;

		$_foto_lama = "./upload/".$foto_lama;
		if(file_exists($_foto_lama)){
			unlink($_foto_lama);
		}
		move_uploaded_file($lokasi_foto, "./upload/".$file_foto);
	}
	else{
		$file_foto = '';
	}

	$query = "UPDATE tbanggota SET
		kdanggota = '$kdanggota',
		nama = '$nama',
		jeniskelamin = '$jeniskelamin',
		alamat = '$alamat',
		status = '$status',
		foto = '$file_foto'
		WHERE idanggota = '$idanggota'";
	$check = mysqli_query($koneksi, $query);
}
else{
	$idanggota = $_GET['id'];

	$query = mysqli_query($koneksi, "SELECT foto FROM tbanggota WHERE idanggota = '".$idanggota."'");
	$anggota = mysqli_fetch_array($query);

	$foto = "./upload/".$anggota['foto'];
	if(file_exists($foto)){
		unlink($foto);
	}

	$query = "DELETE FROM tbanggota WHERE idanggota = '".$idanggota."'";
	$check = mysqli_query($koneksi, $query);
}

if($check){
	// mengarahkan ke halaman list anggota
	header("location: index.php?page=anggota-list");
}
else{
	echo "Pesan error: ". mysqli_error($koneksi);
}
?>