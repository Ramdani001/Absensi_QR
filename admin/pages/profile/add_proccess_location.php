<?php
// $satu      = mysqli_real_escape_string($koneksi, @$_POST['id_info']);
$satu      = rand(1, 100);
$dua       = mysqli_real_escape_string($koneksi, @$_POST['nama_perusahaan']);
$tiga      = mysqli_real_escape_string($koneksi, @$_POST['deskripsi_perusahaan']);
$empat     = mysqli_real_escape_string($koneksi, @$_POST['alamat_perusahaan']);
$lima      = mysqli_real_escape_string($koneksi, @$_POST['kec_perusahaan']);
$enam      = mysqli_real_escape_string($koneksi, @$_POST['kab_perusahaan']);
$tujuh     = mysqli_real_escape_string($koneksi, @$_POST['prov_perusahaan']);
$delapan   = mysqli_real_escape_string($koneksi, @$_POST['kode_pos']);
$sembilan  = mysqli_real_escape_string($koneksi, @$_POST['web_perusahaan']);

$nama_file = $_FILES['uploadfoto']['name'];
$ext = pathinfo($nama_file, PATHINFO_EXTENSION);
$nama_gambar_baru = $nama_file;
$ukuran_file = $_FILES['uploadfoto']['size'];
$tipe_file = $_FILES['uploadfoto']['type'];
$tmp_file = $_FILES['uploadfoto']['tmp_name'];
$path = "../img/user/". $nama_gambar_baru;
$pathdb = "img/user/". $nama_gambar_baru;

if ($tipe_file == "image/jpg" || $tipe_file == "image/jpeg" || $tipe_file == "image/png") {
    if ($ukuran_file <= 3000000) {
        if (move_uploaded_file($tmp_file, $path)) { // Cek apakah gambar berhasil diupload / tidak
            $query = mysqli_query($koneksi,"INSERT INTO info VALUES ('$satu', '$dua', '$tiga',  '$empat', '$lima', '$enam', '$tujuh', '$delapan', '$sembilan', '$pathdb');");
            if ($query) {
                ?>
                <div class="alert alert-block alert-success">
                    <i class="fas fa-check-circle green"></i> Data Berhasil Ditambahkan.
                </div>
                <meta http-equiv="refresh" content="2; url=?page=profile">
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