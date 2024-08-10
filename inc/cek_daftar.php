<?php
$satu       = rand(1, 100);
$dua        = @$_POST['no_induk'];
$tiga       = @$_POST['nama_1'];
$empat      = @$_POST['nama_2'];
$lima       = @$_POST['generated_code'];

$query = mysqli_query($koneksi,"INSERT INTO person VALUES ('$satu', '$dua', '' ,'$tiga', '$empat', '$lima')");
 
// var_dump($lima);
// die();

if ($query) {
    ?>
    <div class="alert alert-block alert-success">
        <i class="fas fa-check-circle green"></i>
        Data Berhasil Ditambahkan.
    </div>
    <meta http-equiv="refresh" content="2; url=index.php">
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
?>