<?php
require "template/header.php";
$judul_film="";

if(isset($_POST["judul_film"]))
	$judul_film = $_POST["judul_film"] ;
	
include "koneksi.php";
$sql = "select * from film where judul like '%".$judul_film."%'
		order by idfilm desc ";
$hasil = mysqli_query($kon, $sql);
if (!$hasil)
	die("Gagal query..".mysqli_error($kon));
?>
	<div class="container">
	<div class="text-center mb-4">
	<h1>DATA FILM BIOSKOP</h1>
</div>
<a href="data_isi.php" class='btn mb-3 btn-primary'>Tambah Data</a>
<div class="table-responsive">
<table class="table table-striped ">
	<tr>
	<th> POSTER </th>
	<th> JUDUL FILM </th>
	<th> GENRE </th>
	<th> TAHUN RILIS</th>
	<th> SUTRADARA </th>
	<th class="text-center"> AKSI</th>
	</tr>
	<?php
		$no = 0;
		while ($row = mysqli_fetch_assoc($hasil)){
	echo " <tr> ";
	echo " <td> <a href='pict/{$row['foto']} ' />
			<img src='pict/{$row['foto']} ' width='100' class='img-fluid' />
			</a></td> " ;
	echo " <td> ".$row['judul']."</td> ";
	echo " <td> ".$row['genre']."</td> ";
	echo " <td> ".$row['tahun']."</td> ";
	echo " <td> ".$row['sutradara']."</td> ";
	echo "<td class='text-center'>";
	echo "<a href='data_update.php?idfilm=".$row['idfilm']."' class='btn mx-3 btn-warning'>Edit</a>";
	echo "<a href='data_hapus.php?idfilm=".$row['idfilm']."' class='btn btn-danger'>Hapus</a>";
	echo "</td>";
	echo " </tr>";
	}
?>
</table>
</div>
	</div>
<?php
require "template/footer.php";
?>