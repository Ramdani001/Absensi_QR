<?php
// $satu       = mysqli_real_escape_string($koneksi,@$_POST['id_person']);
$satu       = rand(1, 100);
$dua        = mysqli_real_escape_string($koneksi,@$_POST['no_induk']);
$tiga       = mysqli_real_escape_string($koneksi,@$_POST['nama_1']);
$empat      = mysqli_real_escape_string($koneksi,@$_POST['nama_2']);
$alamat_email      = mysqli_real_escape_string($koneksi,@$_POST['alamat_email']);
$lima       = mysqli_real_escape_string($koneksi,@$_POST['generated_code']);


$nama_file = $_FILES['foto_ang']['name'];
$ext = pathinfo($nama_file, PATHINFO_EXTENSION);
$nama_gambar_baru = $nama_file;
$ukuran_file = $_FILES['foto_ang']['size'];
$tipe_file = $_FILES['foto_ang']['type'];
$tmp_file = $_FILES['foto_ang']['tmp_name'];
$path = "../img/profile/". $nama_gambar_baru;
$pathdb = "img/profile/". $nama_gambar_baru;


$query = mysqli_query($koneksi,"INSERT INTO person VALUES ('$satu', '$dua', '$nama_gambar_baru','$tiga',  '$empat', '$alamat_email' ,'$lima');");
if ($tipe_file == "image/jpg" || $tipe_file == "image/jpeg" || $tipe_file == "image/png") {
    if ($ukuran_file <= 3000000) {
        if (move_uploaded_file($tmp_file, $path)){
            if ($query) {
                ?>
                <div class="alert alert-block alert-success">
                    <i class="fas fa-check-circle green"></i> Data Berhasil Ditambahkan.
                </div>
                <meta http-equiv="refresh" content="2; url=?page=user">
                <?php
            } else {
                // Jika Gagal, Lakukan :
                ?>
                <div class="alert alert-block alert-danger">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="fas fa-times"></i>
                    </button>
                    <i class="fas fa-info-circle red"></i>
                    Data gagal tersimpan, cek kembali data saat pengisian.
                </div>
            <?php
            }
        }else {
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
    }
}else {
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

?>