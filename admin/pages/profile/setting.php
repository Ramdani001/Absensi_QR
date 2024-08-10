<?php
include('../inc/config.php');
$query_profil = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '" . $_SESSION['username'] . "'");
$data_profil = mysqli_fetch_array($query_profil);
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
        <span>Atur Profil</span>
      </div>
      <h2 class="az-content-title">Atur Profil</h2>
      <?php
        if (@$_POST['simpan']) {
          include 'edit_proccess.php';
        }
      ?>
      <?php
        if (@$_POST['simpan_akun']) {
          include 'edit_proccess_account.php';
        }
      ?>
      <form method="post" role="form" enctype="multipart/form-data">
      <div class="row">

        <input type="hidden" class="form-control" name="id_admin" id="id_admin" value="<?php echo $data_profil['id_admin'];?>">

        <div class="col-lg-6 col-md-6 form-group">
          <label>Nama Depan</label>
          <input type="text" class="form-control" name="nama_1" id="nama_1" value="<?php echo $data_profil['nama_1']; ?>">
        </div>

        <div class="col-lg-6 col-md-6 form-group">
          <label>Nama Belakang</label>
          <input type="text" class="form-control" name="nama_2" id="nama_2" value="<?php echo $data_profil['nama_2']; ?>">
        </div>

        <div class="col-lg-6 col-md-6 form-group">
          <label>Pas Photo</label>
          <br></br>
          <input type="hidden" name="uploadphoto_old" value="<?php echo $data_profil['foto'];?>">
          <img src="../<?php echo $data_profil['foto'];?>" alt="" style="max-width:150px; max-height: 150px;"><br></br>
          <input type="file" class="form-control" id="uploadphoto" name="uploadphoto">
        </div>

        <input type="hidden" class="form-control" name="username" id="username" value="<?php echo $data_profil['username'];?>">
        <input type="hidden" class="form-control" name="password" id="password" value="<?php echo $data_profil['password'];?>">

        <div class="col-lg-12 col-md-12 form-group">
          <input class="btn btn-az-primary" type="submit" name="simpan" value="Simpan">
          <button type="reset" class="btn btn-danger">Reset</button>
          <a href="?page=profile" class="btn btn-secondary">Batal</a>
        </div>

      </div>  
      </form>
      <form method="post" role="form" enctype="multipart/form-data">
      <div class="row">

        <input type="hidden" class="form-control" name="id_admin" id="id_admin" value="<?php echo $data_profil['id_admin'];?>">
        <input type="hidden" class="form-control" name="nama_1" id="nama_1" value="<?php echo $data_profil['nama_1'];?>">
        <input type="hidden" class="form-control" name="nama_2" id="nama_2" value="<?php echo $data_profil['nama_2'];?>">
        <input type="hidden" class="form-control" name="foto" id="foto" value="<?php echo $data_profil['foto'];?>">

        <div class="col-lg-6 col-md-6 form-group">
          <label>Nama Pengguna</label>
          <input type="text" class="form-control" name="username" id="username" value="<?php echo $data_profil['username'];?>" readonly>
          <small><i>* Nama Pengguna tidak dapat diubah.</i></small>
        </div>

        <div class="col-lg-6 col-md-6 form-group">
          <label>Kata Sandi Baru</label>
          <input type="password" class="form-control" name="password" id="password">
        </div>

        <div class="col-lg-12 col-md-12 form-group">
          <input class="btn btn-az-primary" type="submit" name="simpan_akun" value="Simpan">
          <button type="reset" class="btn btn-danger">Reset</button>
          <a href="?page=profile" class="btn btn-secondary">Batal</a>
        </div>       

      </div>  
      </form>

    </div><!-- content-body -->

  </div><!-- container -->
</div><!-- content -->