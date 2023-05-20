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
  <title>Input data</title>
      <center>
        <h1>Tambah Film</h1>
      <center>
      <form method="POST" action="data_simpan.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label>Judul Film</label>
          <input type="text" name="judul" />
        </div>
        <div>
          <label>Genre</label>
         <input type="text" name="genre" />
        </div>
        <div>
          <label>Tahun Liris</label>
         <input type="date" name="tahun" />
        </div>
        <div>
          <label>Sutradara</label>
         <input type="text" name="sutradara"  />
        </div>
        <div>
          <label>Poster Film</label>
         <input type="file" name="foto" />
        </div>
        <div>
         <button type="submit">SIMPAN</button>
        </div>
        </section>
      </form>
  </body>
</html>