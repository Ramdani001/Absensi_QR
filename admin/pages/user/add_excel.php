<?php
include_once('../inc/config.php');
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


if (isset($_REQUEST['input_file'])) {
  $file = $_FILES['file-excel']['tmp_name'];
  $extension = pathinfo($_FILES['file-excel']['name'], PATHINFO_EXTENSION);
  if ($extension == 'xlsx'  || $extension == 'xls' || $extension == 'csv') {
    $obj = PhpOffice\PhpSpreadsheet\IOFactory::load($file);
    $data = $obj->getSheet(0)->toArray();

    foreach ($data as $value) {
      $no_induk = $value[0];
      $nama1 = $value[1];
      $nama2 = $value[2];
      $generated_code = $value[3];

      $sql = mysqli_query($koneksi, "INSERT INTO person set no_induk = '$no_induk', nama_1 = '$nama1', nama_2 = '$nama2', generated_code = '$generated_code'");
      if ($sql) {
        $msg = "File Imported Successfully";
      } else {
        $msg = "File Import Failed";
      }
    }
  } else {
    $msg = "Invalid File";
  }
}
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
        <span>Tambah Akun</span>
      </div>
      <h2 class="az-content-title">Tambah Akun</h2>
      <form method="post" role="form" enctype="multipart/form-data">
        <div class="row">

          <div class="col-lg-12 col-md-12 form-group">
            <label>File Excel</label>
            <input type="file" class="form-control" id="fileuser" name="file-excel" required>
          </div>

          <div class="col-lg-12 col-md-12 form-group">
            <input class="btn btn-az-primary" type="submit" name="input_file" value="Impor">
            <a href="?page=user" class="btn btn-secondary">Batal</a>
          </div>
          <p class="error">
            <?php if (!empty($msg)) {
              echo $msg;
            } ?>
          </p>
        </div>
      </form>

    </div><!-- content-body -->

  </div><!-- container -->
</div><!-- content -->