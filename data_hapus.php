<?php
include "template/header.php";
$idfilm = $_GET['idfilm'];
include "koneksi.php";
$sql = "select * from film where idfilm = '$idfilm'";
$hasil = mysqli_query($kon,$sql);
if (!$hasil) die('Gagal query...'); 

$data = mysqli_fetch_array($hasil);
$judul = $data['judul'];
$genre = $data['genre'];
$tahun = $data['tahun'];
$sutradara = $data['sutradara'];
$foto = $data['foto'];

echo "<h2>Konfirmasi Hapus</h2>";
echo "Foto : <img src='pict/".$foto."'/><br/><br/>";
echo "APAKAH DATA INI AKAN DIHAPUS? <br/>";
echo "<a href='data_hapus.php?idfilm=$idfilm&hapus=1'>YA</a>";
echo "&nbsp;&nbsp;";
echo "<a href='data_tampil.php'>TIDAK</a><br/><br/>";

if (isset($_GET['hapus'])) {
	$sql = "delete from film where idfilm = '$idfilm'";
	$hasil = mysqli_query($kon,$sql);
	if (!$hasil) {
		echo "Gagal Hapus Film: $nama..<br/>";
		echo "<a href='data_tampil.php'>Kembali ke Daftar Film</a>";
	}else{
		$gbr = "pict/$foto";
		if (file_exists($gbr)) unlink($gbr); 
		$gbr = "pict/$foto";
		if (file_exists($gbr)) unlink($gbr); 
		header('location:data_tampil.php');
		}
	}
?>