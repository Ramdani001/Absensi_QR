<?php
@session_start();
include('inc/config.php');

if (isset($_POST['masuk'])) {
    $user = addslashes($_POST['username']);
    $pass = addslashes($_POST['password']);
    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$user' AND password = md5('$pass')");
    $hasil = mysqli_num_rows($query);
    $data = mysqli_fetch_array($query);

    if ($hasil == 1) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['log'] = "Logged";
        header('location: admin/index.php?page=home');
        exit(); 
    } else {
        ?>
        <div class="alert alert-block alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fas fa-times"></i>
            </button>
            <center>
            <strong>Login Gagal</strong></center>
            <i class="fas fa-info-circle red"></i> Periksa kembali Nama Pengguna dan Kata Sandi anda!
        </div>
        <?php
    }
}
