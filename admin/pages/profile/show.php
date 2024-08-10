<?php
include('../inc/config.php');
$query_profil = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '" . $_SESSION['username'] . "'");
$data_profil = mysqli_fetch_array($query_profil);

$query_profil2 = mysqli_query($koneksi, "SELECT * FROM info");
$data_profil2 = mysqli_fetch_array($query_profil2);
?>

<div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
  <div class="container">

    <div class="az-content-left az-content-left-components">
      <div class="component-item">
        <label>Data Akun</label>
        <nav class="nav flex-column">
          <a href="?page=user" class="nav-link">Akun</a>
          <a href="?page=user&action=add_form" class="nav-link">Tambah Akun</a>
          <a href="?page=user&action=add_form_admin" class="nav-link">Tambah Akun Admin</a>
        </nav>
        <label>Data Absensi</label>
        <nav class="nav flex-column">
          <a href="?page=absence" class="nav-link">Absensi</a>
        </nav>
        <label>Laporan Data</label>
        <nav class="nav flex-column">
          <a href="?page=report_data" class="nav-link">Laporan</a>
        </nav>
        <label>Profil</label>
        <nav class="nav flex-column">
          <a href="?page=profile" class="nav-link">Lihat Profil</a>
          <a href="?page=profile&action=setting" class="nav-link">Atur Profil</a>
          <a href="?page=profile&action=location" class="nav-link">Atur Kop Laporan</a>
        </nav>
      </div><!-- component-item -->
    </div><!-- content-left -->

    <div class="az-content-body pd-lg-l-40 d-flex flex-column">

      <div class="az-content-breadcrumb">
        <span>Profil</span>
        <span>Lihat Profil</span>
      </div>
      <h2 class="az-content-title">Lihat Profil</h2>

      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3">
           <center>
             <img class="circle-rounded" src="../<?php echo $data_profil['foto'] ;?>" alt="Profile Picture">
           </center>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9">
           <div class="az-content-label mg-b-5">Nama Depan</div>
           <p class="mg-b-20"><?php echo $data_profil['nama_1'];?></p>
           <div class="az-content-label mg-b-5">Nama Belakang</div>
           <p class="mg-b-20"><?php echo $data_profil['nama_2'];?></p>
        </div>
      </div>
      <hr class="mg-y-30">
      <?php
      $query = mysqli_query($koneksi, "SELECT * FROM info");
      $data = mysqli_fetch_array($query);
      $hasil = mysqli_num_rows($query);
      if ($hasil == 0) {
      ?>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="az-content-label mg-b-5">Nama Perusahaan</div>
            <p class="mg-b-20">Data belum diisi.</p>
            <div class="az-content-label mg-b-5">Kecamatan</div>
            <p class="mg-b-20">Data belum diisi.</p>
            <div class="az-content-label mg-b-5">Kode Pos</div>
            <p class="mg-b-20">Data belum diisi.</p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="az-content-label mg-b-5">Deskripsi Perusahaan</div>
            <p class="mg-b-20">Data belum diisi.</p>
            <div class="az-content-label mg-b-5">Kabupaten/Kota</div>
            <p class="mg-b-20">Data belum diisi.</p>
            <div class="az-content-label mg-b-5">Situs Web Perusahaan</div>
            <p class="mg-b-20">Data belum diisi.</p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="az-content-label mg-b-5">Alamat</div>
            <p class="mg-b-20">Data belum diisi.</p>
            <div class="az-content-label mg-b-5">Provinsi</div>
            <p class="mg-b-20">Data belum diisi.</p>
            <div class="az-content-label mg-b-5">Logo Perusahaan</div>
            <p class="mg-b-20">Data belum diisi.</p>
          </div>
        </div>
      <?php
      } else {
      ?>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="az-content-label mg-b-5">Nama Perusahaan</div>
            <p class="mg-b-20"><?php echo $data_profil2['nama_perusahaan'];?></p>
            <div class="az-content-label mg-b-5">Kecamatan</div>
            <p class="mg-b-20"><?php echo $data_profil2['kec_perusahaan'];?></p>
            <div class="az-content-label mg-b-5">Kode Pos</div>
            <p class="mg-b-20"><?php echo $data_profil2['kode_pos'];?></p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="az-content-label mg-b-5">Deskripsi Perusahaan</div>
            <p class="mg-b-20"><?php echo $data_profil2['deskripsi_perusahaan'];?></p>
            <div class="az-content-label mg-b-5">Kabupaten/Kota</div>
            <p class="mg-b-20"><?php echo $data_profil2['kab_perusahaan'];?></p>
            <div class="az-content-label mg-b-5">Situs Web Perusahaan</div>
            <p class="mg-b-20"><?php echo $data_profil2['web_perusahaan'];?></p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="az-content-label mg-b-5">Alamat</div>
            <p class="mg-b-20"><?php echo $data_profil2['alamat_perusahaan'];?></p>
            <div class="az-content-label mg-b-5">Provinsi</div>
            <p class="mg-b-20"><?php echo $data_profil2['prov_perusahaan'];?></p>
            <div class="az-content-label mg-b-5">Logo Perusahaan</div>
            <img style="max-width:150px; max-height: 150px;" src="../<?php echo $data_profil2['logo_perusahaan'] ;?>" alt="Logo Perusahaan">
          </div>
        </div>
      <?php
      }
      ?>

    </div><!-- content-body -->

  </div><!-- container -->
</div><!-- content -->