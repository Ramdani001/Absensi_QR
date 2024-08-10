<?php
include("../inc/config.php");
$id=isset($_GET['id_person']) ? $_GET['id_person']: null;
$sql = mysqli_query($koneksi,"SELECT * FROM person WHERE id_person='$id'");
$tampil = mysqli_fetch_array($sql);
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
        <span>Data Akun</span>
        <span>Ubah Akun</span>
      </div>
      <h2 class="az-content-title">Ubah Akun</h2>
      <?php
        if (@$_POST['simpan']) {
          include 'edit_proccess.php';
        }
      ?>
      <form method="post" role="form" enctype="multipart/form-data">
      <div class="row">

        <div class="col-lg-12 col-md-12 form-group">
          <label>No. Induk</label>
          <input type="text" class="form-control" name="no_induk" id="no_induk" value="<?php echo $tampil['no_induk']; ?>" readonly>
        </div>

        <div class="col-lg-6 col-md-6 form-group">
          <label>Nama Depan</label>
          <input type="text" class="form-control" name="nama_1" id="nama_1" value="<?php echo $tampil['nama_1']; ?>">
        </div>

        <div class="col-lg-6 col-md-6 form-group">
          <label>Nama Belakang</label>
          <input type="text" class="form-control" name="nama_2" id="nama_2" value="<?php echo $tampil['nama_2']; ?>">
        </div>

        <div class="col-lg-6 col-md-6 form-group">
          <label>Alamat Email</label>
          <input type="text" class="form-control" name="alamat_email" id="alamat_email" value="<?php echo $tampil['alamat_email']; ?>">
        </div>

        <input type="hidden" name="generated_code" value="<?php echo $tampil['generated_code'];?>">

        <div class="col-lg-12 col-md-12 form-group">
          <input class="btn btn-az-primary" type="submit" name="simpan" value="Simpan">
          <button type="reset" class="btn btn-danger">Reset</button>
          <a href="?page=user" class="btn btn-secondary">Batal</a>
        </div>       

      </div>  
      </form>

    </div><!-- content-body -->

  </div><!-- container -->
</div><!-- content -->