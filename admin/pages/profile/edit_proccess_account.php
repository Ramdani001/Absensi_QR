<?php
$satu      = mysqli_real_escape_string($koneksi, @$_POST['id_admin']);
$dua       = mysqli_real_escape_string($koneksi, @$_POST['nama_1']);
$tiga      = mysqli_real_escape_string($koneksi, @$_POST['nama_2']);
$empat      = mysqli_real_escape_string($koneksi, @$_POST['foto']);
$lima      = mysqli_real_escape_string($koneksi, @$_POST['username']);
$enam       = mysqli_real_escape_string($koneksi, @$_POST['password']);

$query_data_login = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$lima' ");
$hasil_data_login = mysqli_num_rows($query_data_login);
$query_login    = mysqli_query($koneksi, "SELECT * FROM `admin` WHERE id_admin ='$satu' ");
$data_login     = mysqli_fetch_array($query_login);
$password_sekarang  = $data_login['password'];

if(!empty($_POST['password'])) {
  //update passwordnya
  // jangan lupa di has dulu seblm di update
  $query_password = mysqli_query($koneksi, "UPDATE `admin` SET `password` = MD5('$enam') WHERE `admin`.`id_admin` ='$satu' ;") or die (mysqli_error());
  ?>
  <div class="alert alert-block alert-success">
    <button type="button" class="close" data-dismiss="alert">
        <i class="fas fa-times"></i>
    </button>
    <i class="fas fa-check-circle green"></i> Berhasil memperbarui Kata Sandi.
    <br>Dalam 2 detik halaman akan dialihkan.
  </div>
  <meta http-equiv="refresh" content="2; url=../inc/logout.php">
  <?php
} else if (empty($_POST['password'])) {
  ?>
  <div class="alert alert-block alert-danger">
    <button type="button" class="close" data-dismiss="alert">
      <i class="fas fa-times"></i>
    </button>
    <i class="fas fa-info-circle red"></i>
    Perubahan Kata Sandi tidak boleh kosong.
  </div>
  <?php
} else {
  ?>
  <div class="alert alert-block alert-danger">
    <button type="button" class="close" data-dismiss="alert">
      <i class="fas fa-times"></i>
    </button>
    <i class="fas fa-info-circle red"></i>
    Perubahan data gagal, periksa kembali.
  </div>
  <?php
}
?>