<?php
$satu      = mysqli_real_escape_string($koneksi, @$_POST['id_admin']);
$dua       = mysqli_real_escape_string($koneksi, @$_POST['nama_1']);
$tiga      = mysqli_real_escape_string($koneksi, @$_POST['nama_2']);

$gambar_name_old = $_POST['uploadphoto_old'];
$gambar_name = $_FILES['uploadphoto']['name'];
  if ($gambar_name){
    $ext = pathinfo($gambar_name, PATHINFO_EXTENSION);
    $nama_gambar_baru = rand(1,10).$gambar_name;
    $ukuran_file = $_FILES['uploadphoto']['size'];
    $tipe_file = $_FILES['uploadphoto']['type'];
    $tmp_file = $_FILES['uploadphoto']['tmp_name'];
    $path = "../img/user/".$nama_gambar_baru;
    $pathdb = "img/user/".$nama_gambar_baru;

    if($tipe_file == "image/jpg" || $tipe_file == "image/png" || $tipe_file == "image/jpeg"){
      if($ukuran_file <= 3000000){ 
        if(move_uploaded_file($tmp_file, $path)){
          $foto = $pathdb;
        } else {
          // Jika gambar gagal diupload, Lakukan :
          ?>
            <div class="alert alert-block alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="fas fa-times"></i>
                </button>
                <i class="fas fa-info-circle red"></i>
                Maaf, ada masalah saat mengunggah file.
            </div>
        <?php
        }
      } else {
        // Jika ukuran file lebih dari 3MB, lakukan :
        ?>
        <div class="alert alert-block alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fas fa-times"></i>
            </button>
            <i class="fas fa-info-circle red"></i>
            Maaf, ukuran file tidak diperbolehkan lebih dari 3MB.
        </div>
      <?php
      }
    } else {
      // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
      ?>
      <div class="alert alert-block alert-danger">
          <button type="button" class="close" data-dismiss="alert">
              <i class="fas fa-times"></i>
          </button>
          <i class="fas fa-info-circle red"></i>
          Maaf, format file harus JPG/JPEG/PNG.
      </div>
    <?php
    }
  } else {
    $foto = $gambar_name_old;
  }

$empat      = mysqli_real_escape_string($koneksi, @$_POST['username']);
$lima       = mysqli_real_escape_string($koneksi, @$_POST['password']);

if ($satu == "" || $dua == "" || $tiga == "" || $empat == ""  || $lima == "") {
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
  $sql = "UPDATE admin SET
  nama_1='$dua',
  nama_2='$tiga',
  foto='$foto',
  username='$empat',
  password='$lima'
  WHERE id_admin='$satu'";

  if (mysqli_query($koneksi,$sql)) {
    ?>
    <div class="alert alert-block alert-success">
        <i class="fas fa-check-circle green"></i> Perubahan data berhasil.
    </div>
    <meta http-equiv="refresh" content="2; url=?page=profile">
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
?>