<?php
$idfilm = $_GET["idfilm"];
include "koneksi.php";
$sql = "select * from film where idfilm ='$idfilm'";
$hasil = mysqli_query($kon,$sql);
if(!$hasil) die("Gagal query...");

$data = mysqli_fetch_array($hasil);
$judul = $data["judul"];
$genre = $data["genre"];
$tahun = $data["tahun"];
$sutradara = $data["sutradara"];
$foto = $data["foto"];
?>
<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color:  #148F77;
      }
    button {
          background-color:  #148F77;
          color: #eee;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color:  #148F77;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>
  </head>
  <body>
  <title>Edit data</title>
      <center>
        <h1>Edit DataFilm</h1>
      <center>
      <form method="POST" action="data_simpan.php" enctype="multipart/form-data" >
        <input type="hidden" name="idfilm" value="<?= $idfilm; ?>">
      <section class="base">
        <div>
          <label>Judul Film</label>
          <input type="text" name="judul" value="<?= $judul; ?>" />
        </div>
        <div>
          <label>Genre</label>
         <input type="text" name="genre" value="<?= $genre; ?>" />
        </div>
        <div>
          <label>Sutradara</label>
          <input type="text" name="sutradara" value="<?php echo $sutradara;?>"/>
        </div>
        <div>
          <label>Tahun Liris</label>
         <input type="date" name="tahun" value="<?= $tahun; ?>" />
        </div>
        <div>
          <label>Poster Film</label>
            <input type="file" name="foto" />
            <input type="hidden" name="foto_lama" value="<?php echo $foto;?>"><br>
            <img src="<?php echo "pict/".$foto;?>"width="100px"/>
        <div>
         <button type="submit">SIMPAN</button>
        </div>
        </section>
      </form>
  </body>
</html>