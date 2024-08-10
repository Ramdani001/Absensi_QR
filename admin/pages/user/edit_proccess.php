<?php
$simpan = isset($_POST['simpan']);

if ($simpan){

  $no_induk = isset($_POST['no_induk'])? $_POST['no_induk'] : null;
  $nama_depan = isset($_POST['nama_1'])? $_POST['nama_1'] : null;
  $nama_belakang = isset($_POST['nama_2'])? $_POST['nama_2'] : null;
  $alamat_email = isset($_POST['alamat_email'])? $_POST['alamat_email'] : null;

  if ($no_induk == "" || $nama_depan == "" || $nama_belakang == "")
  {
  ?>
  <div class="alert alert-block alert-danger">
    <button type="button" class="close" data-dismiss="alert">
      <i class="fas fa-times"></i>
    </button>
    <i class="fas fa-info-circle red"></i>
    Pastikan semua form terisi.
  </div>
  <?php
  } else {

  $sql = "UPDATE person SET
  no_induk='$no_induk',
  nama_1='$nama_depan',
  nama_2='$nama_belakang',
  alamat_email='$alamat_email'
  WHERE id_person='$id'";

    if (mysqli_query($koneksi,$sql)) {
      ?>
      <div class="alert alert-block alert-success">
          <i class="fas fa-check-circle green"></i> Perubahan data berhasil.
      </div>
      <meta http-equiv="refresh" content="2; url=?page=user">
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
  }
}
?>