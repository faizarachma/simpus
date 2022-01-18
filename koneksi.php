<?php
// konfigurasi database
$server 		= 'localhost';
$user 			= 'root';
$password		= '';
$database		= 'db_simpus';

$koneksi = mysqli_connect($server, $user, $password, $database) or die ('error');
