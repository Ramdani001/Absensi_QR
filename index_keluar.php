<?php
@session_start();
include('inc/config.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Beranda - Website Absensi Kode QR</title>

    <!-- vendor css -->
    <link href="lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="css/azia.css">
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="css/sweet-alert.css" />

  </head>
  <body>

    <div class="az-header">
      <div class="container">
        <div class="az-header-left">
          <a class="az-logo"><span></span> logo</a>
        </div><!-- header-left -->

        <div class="az-header-right">
          <?php
            include('inc/cek_login.php');
            if (!isset($_SESSION['log'])) {
                echo '
                <a href="register.php" class="btn btn-az-primary" style="margin-right: 15px;">
                <i class="fas fa-user-plus"></i> Daftar</a>
                <a href="login.php" class="btn btn-az-primary">
                <i class="fas fa-sign-in-alt"></i> Masuk</a>';
            } else {
                $query_profil2 = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '" . $_SESSION['username'] . "'");
                $data_profil2 = mysqli_fetch_array($query_profil2);
                echo '
                <a href="admin/index.php?page=home" class="btn btn-az-primary" style="margin-right: 15px;">
                <i class="fas fa-user-cog"></i> Panel Admin</a>
                <a href="#" onclick="keluar()" class="btn btn-az-primary"><i class="fas fa-sign-out-alt"></i> Keluar</a>';
            };
          ?>
          </div>
        </div><!-- header-right -->

      </div><!-- container -->
    </div><!-- header -->

    <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="az-content-body">

          <ul class="nav nav-pills mb-3 ">
            <li class="nav-item"><a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Absen Masuk</a>
            </li>
            <li class="nav-item"><a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Absen Keluar</a>
            </li>
          </ul>

          <div class="row row-sm mg-b-20">

            <div class="col-lg-5 col-md-5 ht-lg-100p">
              <div class="card card-dashboard-one">
                <div class="card-header">
                  <div>
                    <h6 class="card-title">Absen</h6>
                    <p class="card-text">Pindai Kode QR anda di sini untuk absensi kehadiran/kepulangan anda.</p>
                  </div>
                </div><!-- card-header -->
                <div class="card-body" style="margin-left: 20px; margin-right: 20px;">
                 <form action="inc/cek_absen_klr.php" method="POST" id="posKeluar">
                  <div class="scanner-con">
                    <video id="interactive" class="viewport" width="100%"></video>
                  </div>
                  <input type="hidden" id="detected-qr-code" name="qr_code">
                </form>
                <br>
                <small><i>*Bila layar pindai tidak muncul, izinkan akses terlebih dahulu.</i></small>
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- col -->

            <div class="col-lg-7 col-md-7 ht-lg-100p">
              <div class="tab-content br-n pn">

                <div id="navpills-1" class="tab-pane active">
                  <div class="card card-dashboard-one">
                    <div class="card-header">
                      <div>
                        <h6 class="card-title">Daftar Absensi Kehadiran</h6>
                      </div>
                    </div><!-- card-header -->
                    <div class="card-body" style="margin-left: 20px; margin-right: 20px;">
                      <div class="table-responsive">
                        <table class="table table-striped mg-b-0">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>No. Induk</th>
                              <th>Nama Lengkap</th>
                              <th>Tanggal</th>
                              <th>Waktu</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM absen LEFT JOIN person ON absen.id_person = person.id_person WHERE jenis = 'm'ORDER BY id_absen DESC LIMIT 10");
                            $no = 1;
                            while ($data = @mysqli_fetch_array($query))
                            {
                            ?>
                            <tr>
                              <th scope="row"><?php echo "$no"; ?></th>
                              <td><?php echo $data['no_induk'] ;?></td>
                              <td><?php echo $data['nama_1']; echo"&nbsp;"; echo $data['nama_2'];?></td>
                              <td><?php echo $data['tanggal'] ;?></td>
                              <td><?php echo $data['waktu'] ;?></td>
                            </tr>
                            <?php
                            $no++;
                            };
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <div id="navpills-2" class="tab-pane">
                  <div class="card card-dashboard-one">
                    <div class="card-header">
                      <div>
                        <h6 class="card-title">Daftar Absensi Kepulangan</h6>
                      </div>
                    </div><!-- card-header -->
                    <div class="card-body" style="margin-left: 20px; margin-right: 20px;">
                      <div class="table-responsive">
                        <table class="table table-striped mg-b-0">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>No. Induk</th>
                              <th>Nama Lengkap</th>
                              <th>Tanggal</th>
                              <th>Waktu</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM absen LEFT JOIN person ON absen.id_person = person.id_person WHERE jenis = 'k' ORDER BY id_absen DESC LIMIT 10");
                            $no = 1;
                            while ($data = @mysqli_fetch_array($query))
                            {
                            ?>
                            <tr>
                              <th scope="row"><?php echo "$no"; ?></th>
                              <td><?php echo $data['no_induk'] ;?></td>
                              <td><?php echo $data['nama_1']; echo"&nbsp;"; echo $data['nama_2'];?></td>
                              <td><?php echo $data['tanggal'] ;?></td>
                              <td><?php echo $data['waktu'] ;?></td>
                            </tr>
                            <?php
                            $no++;
                            };
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div> 
                </div>

              </div><!-- tab-content -->
            </div><!-- col -->
          
          </div><!-- row -->
  
        </div><!-- content-body -->
      </div>
    </div><!-- content -->

    <div class="az-footer ht-40">
      <div class="container ht-100p pd-t-0-f">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Hak Cipta © <?php echo date("Y"); ?></span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Website Absensi Kode QR</span>
      </div><!-- container -->
    </div><!-- footer -->


    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/ionicons/ionicons.js"></script>
    <script src="js/azia.js"></script>
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <!-- Sweet Alert -->
    <script src="js/sweet-alert.min.js"></script>
    <script type="text/javascript">
        function keluar() {
        Swal.fire({
          title: 'Peringatan',
          text: 'Apakah anda yakin ingin keluar?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#ff5e5e',
          cancelButtonColor: '#5b47fb',
          confirmButtonText: 'Ya, keluar!',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
              var keluar = "inc/logout.php";
              window.location.href = keluar;
          }
        })
        }
    </script>
    <!-- instascan Js -->
    <script src="js/instascan.min.js"></script>
    <script>
      let scanner;
      function startScanner() {
        scanner = new Instascan.Scanner({ video: document.getElementById('interactive') });

        scanner.addListener('scan', function (content) {
          $("#detected-qr-code").val(content);
          console.log(content);
          scanner.stop();
          document.querySelector(".scanner-con").style.display = 'none';
          if (scanner.stop) {
            document.getElementById("posKeluar").submit();
          }
        });

        Instascan.Camera.getCameras()
          .then(function (cameras) {
              if (cameras.length > 0) {
                  scanner.start(cameras[0]);
              } else {
                  console.error('Tidak ada kamera yang ditemukan.');
                  alert('Tidak ada kamera yang ditemukan.');
              }
          })
          .catch(function (err) {
              console.error('Kesalahan akses kamera:', err);
              alert('Kesalahan akses kamera: ' + err);
          });
      }
      document.addEventListener('DOMContentLoaded', startScanner);
    </script>
  </body>
</html>
