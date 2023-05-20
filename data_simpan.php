<?php
if(isset($_POST['idfilm'])){
	$idfilm = $_POST['idfilm'] ;
	$foto_lama = $_POST['foto_lama'] ;
	$simpan = "EDIT" ;
}else{
	$simpan = "BARU" ;
}

 $judul		= $_POST['judul'];
 $genre		= $_POST['genre'];
 $tahun	= $_POST['tahun'];
 $sutradara	= $_POST['sutradara'];

$foto = $_FILES['foto']['name'];
$tmpName = $_FILES['foto']['tmp_name'];
$size = $_FILES['foto']['size'];
$type = $_FILES['foto']['type'];

$maxsize = 1500000;
$typeYgBoleh = array("image/jpeg","image/png","image/pjpeg");

$dirFoto = "pict";
if(!is_dir($dirFoto))
mkdir($dirFoto);
$fileTujuanFoto = $dirFoto."/".$foto;

$dirThumb = "thumb";
if(!is_dir($dirThumb))
mkdir($dirThumb);
$fileTujuanThumb = $dirThumb."/t_".$foto;

$dataValid="YA";

if ($size > 0){
if($size > $maxsize){
echo "Ukuran File Terlalu Besar <br/>";
$dataValid="TIDAK";
}
if (!in_array($type, $typeYgBoleh)) {
echo "Type File Tidak Dikenal<br/>";
$dataValid="TIDAK";
}
}

if (strlen(trim($judul))==0) {
echo "Judul Harus Diisi! <br />";
$dataValid = "TIDAK";
}
if (strlen(trim($genre))==0) {
echo "Asal Harus Diisi! <br />";
$dataValid = "TIDAK";
}
if (strlen (trim($tahun))==0) {
echo "Posisi Harus Diisi! <br />";
$dataValid = "TIDAK";
}
if (strlen (trim($sutradara))==0) {
echo "Tinggi Harus Diisi! <br />";
$dataValid = "TIDAK";
}
if ($dataValid == "TIDAK") {
echo "Masih Ada Kesalahan, silahkan perbaiki! </br>";
echo "<input type='button' value='Kembali'
onClick='self.history.back()'>";
exit;
}

 include "koneksi.php";

if($simpan == "EDIT"){
	if($size == 0){
		$foto = $foto_lama;
	}
	$sql = "update film set
			judul = '$judul',
			genre = '$genre',
			tahun = '$tahun',
			sutradara = '$sutradara',
			foto = '$foto'
			where idfilm = '$idfilm'";
}else{
	$sql = "insert into film
			(judul,genre,tahun,sutradara,foto)
			values('$judul','$genre','$tahun','$sutradara','$foto') ";
}


$hasil = mysqli_query($kon, $sql);

if (!$hasil) {
	echo "Gagal Simpan, silahkan diulangi! <br /> ";
	echo mysqli_error($kon);
	echo "<br/> <input type='button' value='Kembali'
	onClick='self.history.back()'>";
	exit;
 } else {
 echo "Simpan data berhasil" ;
 }
 
 if ($size > 0) {
		if (!move_uploaded_file($tmpName, $fileTujuanFoto)) {
		echo "Gagal Upload Gambar..<br/>";
		echo"<a href='data_tampil.php'>Daftar Barang</a>";
		exit;
		} else {
		buat_thumbnail($fileTujuanFoto, $fileTujuanThumb);
		}
}

echo"<br/>File sudah di upload. <br/>";

header("Location:data_tampil.php");

function buat_thumbnail($file_src, $file_dst) {
//hapus jika thumbnail sebelumnya sudah ada
list($w_src,$h_src,$type) = getImageSize($file_src);

switch ($type) {
case 1: // gif -> jpg
$img_src = imagecreatefromgif($file_src);
break;
case 2: // jpeg -> jpg
$img_src = imagecreatefromjpeg($file_src);
break;
case 3: // png -> jpg
$img_src = imagecreatefrompng($file_src);
break;
}

$thumb = 100; //max. size untuk thumb
if ($w_src > $h_src) {
$w_dst = $thumb; //landscape
$h_dst = round($thumb / $w_src * $h_src);
} else {
$w_dst = round($thumb / $h_src*$w_src); //potrait
$h_dst = $thumb;
}

$img_dst = imagecreatetruecolor($w_dst, $h_dst); // resample

imagecopyresampled($img_dst, $img_src, 0,0, 0, 0,$w_dst, $h_dst, $w_src, $h_src);
imagejpeg($img_dst, $file_dst); //simpan thumbnail
//bersihkan memori
imagedestroy($img_src);
imagedestroy($img_dst);
}
?>