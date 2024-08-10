<?php
include 'inc/config.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Daftar Akun - Website Absensi Kode QR</title>

    <!-- vendor css -->
    <link href="lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/typicons.font/typicons.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="css/azia.css">

  </head>
  <body class="az-body">

    <div class="az-signup-wrapper">
      <div class="az-column-signup">
        <h1 class="az-logo"><span>logo</span></h1>
        <div class="az-signup-header">
          <h2>Mulai Sekarang</h2>
          <h4>Pendaftarannya gratis dan hanya membutuhkan waktu satu menit.</h4>
          <?php
          if (@$_POST['daftar']) {
            include 'inc/cek_daftar.php';
          }
          ?>
          <form method="post" role="form" enctype="multipart/form-data">
          <div class="row">
            <?php
            // Fungsi membuat Nomor Induk
            $query_id = mysqli_query($koneksi, "SELECT RIGHT(no_induk,5) as kode FROM person ORDER BY no_induk DESC LIMIT 1");
            $count = mysqli_num_rows($query_id);

            if ($count <> 0) {
              // mengambil data nomor induk
              $data_id = mysqli_fetch_assoc($query_id);
              $kode = $data_id['kode'] + 1;
            } else {
              $kode = 1;
            }
            //Buat Kode Induk
            $buat_id = str_pad($kode, 5, "0", STR_PAD_LEFT);
            $no_induk = "USR$buat_id";
            ?>

            <div class="col-lg-12 col-md-12 form-group">
              <label>Nomor Induk</label>
              <input type="text" class="form-control" name="no_induk" id="no_induk" value="<?php echo $no_induk; ?>" readonly required>
            </div>

            <div class="col-lg-6 col-md-6 form-group">
              <label>Nama Depan</label>
              <input type="text" class="form-control" name="nama_1" id="nama_1" placeholder="Masukan nama depan anda" required>
            </div>

            <div class="col-lg-6 col-md-6 form-group">
              <label>Nama Belakang</label>
              <input type="text" class="form-control" name="nama_2" id="nama_2" placeholder="Masukan nama belakang anda" required>
            </div>

            <div class="col-lg-12 col-md-12 form-group">
              <button type="button" class="btn btn-az-primary btn-block qr-generator" onclick="generateQrCode()">Hasilkan Kode QR</button>
              <div class="qr-con text-center" style="display: none;">
                <input type="hidden" class="form-control" id="generatedCode" name="generated_code">
                <p>Ambil foto Kode QR Anda.</p>
                <img class="mb-4" src="" id="qrImg" alt="">
              </div>
            </div>

            <div class="col-lg-12 col-md-12 form-group daftar" style="display: none;">
              <input class="btn btn-az-primary btn-block" type="submit" name="daftar" value="Buat Akun">
            </div>       

          </div>  
          </form>
        </div>

        <div class="az-signup-footer">
          <p>Kembali ke halaman <a href="index.php">Beranda</a></p>
        </div>

      </div>
    </div>

    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/ionicons/ionicons.js"></script>
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/azia.js"></script>
    <script>
      function generateRandomCode(length) {
            const characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            let randomString = '';

            for (let i = 0; i < length; i++) {
                const randomIndex = Math.floor(Math.random() * characters.length);
                randomString += characters.charAt(randomIndex);
            }

            return randomString;
        }

        function generateQrCode() {
            const qrImg = document.getElementById('qrImg');

            let text = generateRandomCode(10);
            $("#generatedCode").val(text);

            if (text === "") {
                alert("Silakan masukkan teks untuk menghasilkan Kode QR.");
                return;
            } else {
                const apiUrl = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${encodeURIComponent(text)}`;

                qrImg.src = apiUrl;
                document.querySelector('.daftar').style.display = '';
                document.querySelector('.qr-con').style.display = '';
                document.querySelector('.qr-generator').style.display = 'none';
            }
        }
    </script>

  </body>
</html>
