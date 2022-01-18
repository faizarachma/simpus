<?php
session_start();
$_SESSION['sesi'] = null;

if(@$_POST['submit']){
	include 'koneksi.php';

	$username = (@$_POST['username']) ?: '';
	$password = (@$_POST['password']) ?: '';

	$query = mysqli_query($koneksi, "SELECT * FROM tbadmin WHERE username = '$username' && password = '$password'");
	$check = mysqli_fetch_array($query);

	if($check['id_admin']){
		$_SESSION['id_admin']	= $check['id_admin'];
		$_SESSION['sesi']		= $check['nm_admin'];

		echo "<script type='text/javascript'>alert('Anda berhasil log In')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	}
	else{		
		echo "<script type='text/javascript'>alert('Anda gagal log In')</script>";
		echo "<meta http-equiv='refresh' content='0; url=login.php'>";
	}
}
else{
	include 'login.php';
}
?>