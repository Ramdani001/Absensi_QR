<?php
include 'inc/config.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Daftar Akun Admin - Website Absensi Kode QR</title>

    <!-- vendor css -->
    <link href="lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/typicons.font/typicons.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="css/azia.css">

  </head>
  <body class="az-body">

    <div class="az-signup-wrapper">
      <div class="az-column-signup">
        <h1 class="az-logo"><span>logo</span></h1>
        <div class="az-signup-header">
          <h2>Mulai Sekarang</h2>
          <h4>Pendaftarannya gratis dan hanya membutuhkan waktu satu menit.</h4>
          <?php
          if (@$_POST['daftar']) {
            include 'inc/cek_daftar_admin.php';
          }
          ?>
          <form method="post" role="form" enctype="multipart/form-data">
          <div class="row">

            <div class="col-lg-6 col-md-6 form-group">
              <label>Nama Depan</label>
              <input type="text" class="form-control" name="nama_1" id="nama_1" placeholder="Masukan nama depan anda" required>
            </div>

            <div class="col-lg-6 col-md-6 form-group">
              <label>Nama Belakang</label>
              <input type="text" class="form-control" name="nama_2" id="nama_2" placeholder="Masukan nama belakang anda" required>
            </div>

            <div class="col-lg-12 col-md-12 form-group">
              <label>Pas Photo</label>
              <input type="file" class="form-control" id="uploadfoto" name="uploadfoto" required>
            </div>

            <div class="col-lg-6 col-md-6 form-group">
              <label>Nama Pengguna</label>
              <input type="text" class="form-control" name="username" id="username" required>
            </div>

            <div class="col-lg-6 col-md-6 form-group">
              <label>Kata Sandi</label>
              <input type="password" class="form-control" name="password" id="password" required>
            </div>

            <div class="col-lg-12 col-md-12 form-group">
              <input class="btn btn-az-primary btn-block" type="submit" name="daftar" value="Buat Akun">
            </div>       

          </div>  
          </form>
        </div>

        <div class="az-signup-footer">
          <p>Sudah punya akun? <a href="login.php">Masuk</a></p>
          <p>Kembali ke halaman <a href="index.php">Beranda</a></p>
        </div>

      </div>
    </div>

    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/ionicons/ionicons.js"></script>
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/azia.js"></script>
  </body>
</html>
