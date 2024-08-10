<?php
@session_start();
include 'inc/config.php';

if(!isset($_SESSION['log'])){
  
} else {
  header('location:index.php');
};

?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Masuk Akun - Website Absensi Kode QR</title>

    <!-- vendor css -->
    <link href="lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/typicons.font/typicons.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="css/azia.css">

  </head>
  <body class="az-body">

    <div class="az-signin-wrapper">
      <div class="az-card-signin">
        <h1 class="az-logo"><span>logo</span></h1>
        <div class="az-signin-header">
          <h2>Selamat datang kembali admin!</h2>
          <h4>Tolong masuk untuk melanjutkan</h4>
          <?php
          if (isset($_POST['masuk'])) {
              include 'inc/cek_login.php';
          }
          ?>
          <form method="post">
          <div class="row">
  
            <div class="col-lg-12 col-md-12 form-group">
              <label>Nama Pengguna</label>
              <input type="text" class="form-control" placeholder="Masukan nama pengguna anda" name="username" id="username">
            </div>

            <div class="col-lg-12 col-md-12 form-group">
              <label>Kata Sandi</label>
              <input type="password" class="form-control" placeholder="Masukan kata sandi anda" name="password" id="password">
            </div>

            <div class="col-lg-12 col-md-12 form-group">
              <input class="btn btn-az-primary btn-block" type="submit" name="masuk" value="Masuk">
            </div>

          </div>
          </form>
        </div>

        <div class="az-signin-footer">
          <p>Tidak punya akun? <a href="register_admin.php">Buat sebuah akun</a></p>
          <p>Kembali ke halaman <a href="index.php">Beranda</a></p>
        </div>

      </div>
    </div>

    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/ionicons/ionicons.js"></script>
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/azia.js"></script>
    <script>
      $(function(){
        'use strict'

      });
    </script>
  </body>
</html>
