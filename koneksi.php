<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "film";

$kon = mysqli_connect($host, $user, $pass);
if (!$kon)
	die("Gagal Koneksi...");

$hasil = mysqli_select_db($kon, $dbName);
if (!$hasil){
	$hasil = mysqli_query($kon, "CREATE DATABASE $dbName");
	if (!$hasil)
		die("Gagal Buat Database");
	else
		$hasil = mysqli_select_db($kon, $dbName);
		if(!$hasil) die("Gagal Konek Database");
}

$sqlTabelPemain = "create table if not exists film (
				idfilm int auto_increment not null primary key,
				judul varchar (40) not null,
				genre char (40) not null,
				tahun date,
				sutradara varchar (40) not null,
				foto varchar (70) not null default '',
				KEY (judul))";

mysqli_query($kon, $sqlTabelPemain) or die("Gagal Buat Tabel Pemain ");
?>