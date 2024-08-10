<?php
$satu       = mysqli_real_escape_string($koneksi,@$_POST['id_admin']);
$dua        = mysqli_real_escape_string($koneksi,@$_POST['nama_1']);
$tiga       = mysqli_real_escape_string($koneksi,@$_POST['nama_2']);

$nama_file = $_FILES['uploadfoto']['name'];
$ext = pathinfo($nama_file, PATHINFO_EXTENSION);
$nama_gambar_baru = $nama_file;
$ukuran_file = $_FILES['uploadfoto']['size'];
$tipe_file = $_FILES['uploadfoto']['type'];
$tmp_file = $_FILES['uploadfoto']['tmp_name'];
$path = "img/user/". $nama_gambar_baru;
$pathdb = "img/user/". $nama_gambar_baru;

$lima       = mysqli_real_escape_string($koneksi,@$_POST['username']);
$enam       = mysqli_real_escape_string($koneksi,@$_POST['password']);

if ($tipe_file == "image/jpg" || $tipe_file == "image/jpeg" || $tipe_file == "image/png") { // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
    if ($ukuran_file <= 3000000) {
        if (move_uploaded_file($tmp_file, $path)) { // Cek apakah gambar berhasil diupload / tidak
            $query = mysqli_query($koneksi,"INSERT INTO admin VALUES ('$satu', '$dua', '$tiga',  '$pathdb', '$lima', md5('$enam'));");
            if ($query) {
                ?>
                <div class="alert alert-block alert-success">
                    <i class="fas fa-check-circle green"></i> Data Berhasil Ditambahkan.
                </div>
                <meta http-equiv="refresh" content="2; url=login.php">
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
?>