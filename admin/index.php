<?php
@session_start();
if (@$_SESSION['username']) {
    header("location:");
} else {
    header("location:../login.php");
}

include('../inc/config.php');

$query_profil = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '".$_SESSION['username']."'");
$data_profil = mysqli_fetch_array($query_profil);

$query = mysqli_query($koneksi, "SELECT COUNT(id_person) AS total FROM person");
$data = mysqli_fetch_array($query);

$query2 = mysqli_query($koneksi, "SELECT COUNT(id_admin) AS total2 FROM admin");
$data2 = mysqli_fetch_array($query2);

$query3 = mysqli_query($koneksi, "SELECT COUNT(waktu) AS total3 FROM absen WHERE jenis = 'm'");
$data3 = mysqli_fetch_array($query3);

$query4 = mysqli_query($koneksi, "SELECT COUNT(waktu) AS total4 FROM absen WHERE jenis = 'k'");
$data4 = mysqli_fetch_array($query4);

@$page =  $_GET['page'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Halaman Admin - Website Absensi Kode QR</title>
    <!-- vendor css -->
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="../lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/azia.css">
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="../css/sweet-alert.css" />
    <!-- Datatables css for this page -->
    <link rel="stylesheet" href="../datatables/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="../datatables/css/dataTables.bootstrap5.min.css">


</head>

<body>

    <div class="az-header">
      <div class="container">

        <div class="az-header-left">
          <a href="index.php" class="az-logo"><span>logo</span></a>
          <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
        </div><!-- header-left -->

        <div class="az-header-menu">
          <div class="az-header-menu-header">
            <a href="index.php" class="az-logo"><span>logo</span></a>
            <a href="" class="close">&times;</a>
          </div><!-- header-menu-header -->
          <ul class="nav" id="active">
            <li class="nav-item <?php if ($page == "home") { ?>active<?php } ?>">
              <a href="?page=home" class="nav-link"><i class="typcn typcn-home-outline"></i> Beranda</a>
            </li>
            <li class="nav-item <?php if ($page == "user") { ?>active<?php } ?>">
              <a href="?page=user" class="nav-link"><i class="typcn typcn-user-outline"></i> Data Akun</a>
            </li>
            <li class="nav-item <?php if ($page == "absence") { ?>active<?php } ?>">
              <a href="?page=absence" class="nav-link"><i class="typcn typcn-clipboard"></i> Data Absensi</a>
            </li>
            <li class="nav-item <?php if ($page == "report_data") { ?>active<?php } ?>">
              <a href="?page=report_data" class="nav-link"><i class="typcn typcn-document"></i> Laporan Data</a>
            </li>
          </ul>
        </div><!-- header-menu -->

        <div class="az-header-right">
          
          <div class="dropdown az-profile-menu">
            <a href="" class="az-img-user"><img src="../<?php echo $data_profil['foto']; ?>" alt=""></a>
            <div class="dropdown-menu">
              <div class="az-dropdown-header d-sm-none">
                <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
              </div>

              <div class="az-header-profile">
                <div class="az-img-user">
                  <img src="../<?php echo $data_profil['foto']; ?>" alt="">
                </div><!-- img-user -->
                <center><h6><?php echo $data_profil['nama_1']; echo "&nbsp"; echo $data_profil['nama_2'];?></h6></center>
                <span>Admin</span>
              </div><!-- header-profile -->

              <a href="?page=profile" class="dropdown-item"><i class="typcn typcn-user-outline"></i> Profil Saya</a>
              <a href="?page=profile&action=setting" class="dropdown-item"><i class="typcn typcn-edit"></i> Atur Profil</a>
              <a href="?page=profile&action=location" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> Atur Kop Laporan</a>
              <button class="dropdown-item" data-toggle="modal" data-target="#hapusAdmin"><i class="typcn typcn-times-outline"></i> Hapus Akun</button>
              <a href="../index.php" class="dropdown-item"><i class="typcn typcn-world-outline"></i> Halaman Web Utama</a>
              <a href="#" onclick="keluar()" class="dropdown-item"><i class="typcn typcn-power-outline"></i> Keluar</a>

            </div><!-- dropdown-menu -->
          </div>
        </div><!-- header-right -->

      </div><!-- container -->
    </div><!-- header -->

    <div class="az-content az-content-dashboard">
      <div class="container">
        <div class="az-content-body">
            <?php
            include '../inc/menu_admin.php';
            ?>
        </div><!-- content-body -->
      </div>
    </div><!-- content -->

    <div class="az-footer ht-40">
      <div class="container ht-100p pd-t-0-f">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Hak Cipta © <?php echo date("Y"); ?></span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Website Absensi Kode QR</span>
      </div><!-- container -->
    </div><!-- footer -->

    <!-- Hapus Akun Admin Modal -->
    <?php
    $q = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '" . $_SESSION['username'] . "'");
    $data_akun = mysqli_fetch_array($q);
    ?> 
    <div class="modal fade" id="hapusAdmin" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Konfirmasi Penghapusan Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php
            if (isset($_POST['hapus_admin'])) {
              include 'pages/user/delete_admin.php';
            }
            ?>
            <form method="POST">
              <div class="row">
                <div class="col-lg-12 col-md-12 form-group">
                  <label>Masukan Kata Sandi akun anda untuk mengkonfirmasi penghapusan.</label>
                  <input type="password" class="form-control" placeholder="Masukan kata sandi anda" name="password" id="password" required>
                </div>
                <div class="col-lg-12 col-md-12 form-group">
                  <input type="hidden" name="id_admin" value="<?php $data_akun['id_admin']; ?>">
                  <input class="btn btn-danger btn-block" type="submit" name="hapus_admin" value="Konfirmasi">
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-az-primary" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>

    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/ionicons/ionicons.js"></script>
    <script src="../js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../js/azia.js"></script>
    <!-- Sweet Alert -->
    <script src="../js/sweet-alert.min.js"></script>
    <!-- Datatables -->
    <script src="../datatables/js/jquery.dataTables.js"></script>
    <script src="../datatables/js/dataTables.bootstrap5.js"></script>
    <script src="../datatables/js/dataTables.bootstrap5.min.js"></script>
    <!-- Donut Chart -->
    <script src="../lib/jquery.flot/jquery.flot.js"></script>
    <script src="../lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="../lib/chart.js/Chart.bundle.min.js"></script>
    <script src="../lib/peity/jquery.peity.min.js"></script>
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
            var keluar = "../inc/logout.php";
            window.location.href = keluar;
        }
      })
      }
    </script>
    <script type="text/javascript">
      function reset_data() {
      Swal.fire({
        title: 'Peringatan',
        text: 'Apakah anda yakin ingin reset data?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ff5e5e',
        cancelButtonColor: '#5b47fb',
        confirmButtonText: 'Ya, reset!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
            var keluar = "?page=home&action=reset";
            window.location.href = keluar;
        }
      })
      }
    </script>
    <script type="text/javascript">
      $(document).ready(function () {
      $('#dataTables-example').dataTable();
      });

      $(document).ready(function () {
      $('#dataTables-example2').dataTable();
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
      $('#example').dataTable( {
          "aaSorting": [[ 0, "asc" ]]
      } );
      } );

      $(document).ready(function() {
      $('#example2').dataTable( {
          "aaSorting": [[ 0, "asc" ]]
      } );
      } );
    </script>
    <script type="text/javascript">
      function hapus_user(delete_url) {
        {
          $('#modal_hapus_user').modal('show', {backdrop: 'static'});
          document.getElementById('link_hapus_user').setAttribute('href' , delete_url);
        }
      }

      function hapus_absen(delete_url) {
        {
          $('#modal_hapus_absen').modal('show', {backdrop: 'static'});
          document.getElementById('link_hapus_absen').setAttribute('href' , delete_url);
        }
      }
    </script>
    <script type="text/javascript">
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
            document.querySelector('.tambah').style.display = '';
            document.querySelector('.qr-con').style.display = '';
            document.querySelector('.qr-generator').style.display = 'none';
        }
      }
    </script>
    <script type="text/javascript">
      $(function(){
        'use strict'
        // Donut Chart
        var datapie = {
          labels: ['Akun Pengguna', 'Akun Admin', 'Absensi Kehadiran', 'Absensi Kepulangan'],
          datasets: [{
            data: [<?php echo $data['total'];?>,<?php echo $data2['total2'];?>,<?php echo $data3['total3'];?>,<?php echo $data4['total4'];?>],
            backgroundColor: ['#6f42c1', '#007bff','#17a2b8','#00cccc']
          }]
        };

        var optionpie = {
          maintainAspectRatio: false,
          responsive: true,
          legend: {
            display: false,
          },
          animation: {
            animateScale: true,
            animateRotate: true
          }
        };

        // For a doughnut chart
        var ctxpie= document.getElementById('chartDonut');
        var myPieChart6 = new Chart(ctxpie, {
          type: 'doughnut',
          data: datapie,
          options: optionpie
        });
      });
    </script>
    <script>  
      function lihatwaktu() {
        var date = new Date();
        var h = date.getHours(); // 0 - 23
        var m = date.getMinutes(); // 0 - 59
        var s = date.getSeconds(); // 0 - 59
        var time = h + ":" + m + ":" + s;
        document.getElementById("waktu").innerText = time;
        document.getElementById("waktu").textContent = time;
        setTimeout(lihatwaktu, 1000);
      }
      lihatwaktu();
    </script>
</body>

</html>