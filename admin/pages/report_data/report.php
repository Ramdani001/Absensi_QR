<?php
@session_start();
if (@$_SESSION['username']) {
  header("location:");
} else {
  header("location:../../../login.php");
}

include '../../../inc/config.php';
include '../../../inc/informasi.php';

$tanggal = date('Y-m-d');
$query_profil = mysqli_query($koneksi, "SELECT * FROM admin WHERE username ='" . $_SESSION['username'] . "'");
$data_profil = mysqli_fetch_array($query_profil);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">

  <title>Halaman Admin | Laporan Data Kehadiran - Website Absensi Kode QR</title>
  <link rel="shortcut icon" type="image/x-icon" href="#" />

  <!-- Custom styles for this template -->
  <link href="../../../css/starter-template.css" rel="stylesheet">
  <link href="../../../css/bootstrap.css" rel="stylesheet">

  <!-- Just for debugging purposes-->
  <script src="../../../js/ie-emulation-modes-warning.js"></script>
</head>

<body onload="window.print();">
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Alihkan navigasi</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" style="text-transform: uppercase;" href="#"><?php echo @$data_info['nama_perusahaan']; ?></a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav pull-right">
          <li><a href="">Cetak atau Simpan</a></li>
          <li class="active"><a href="javascript:window.open('','_self').close();">Tutup</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

  <div class="container">
    <?php
    $awal = $_GET['awal'];
    $akhir  = $_GET['akhir'];
    $nama  = $_GET['nama'];
    //panggil variabel awal dan akhir yang ditombol Cetak laporan

    $tglAwal  = isset($_GET['awal']) ? $_GET['awal'] : "01-" . date('m-Y');
    $tglAkhir   = isset($_GET['akhir']) ? $_GET['akhir'] : date('d-m-Y');
    $namaOrang   = isset($_GET['nama']) ? $_GET['nama'] : null;
    $SqlPeriode = "WHERE absensi.tanggal >= DATE('".$tglAwal."') OR absensi.tanggal <= DATE('".$tglAkhir."')";

    include @'kop_laporan.php';
    ?>
    <h4>Laporan Data Absensi : <?= $tglAwal ." s/d ". $tglAkhir ?> </h4>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="frmedit">
      <table class="display table table-bordered table-striped" id="example">
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>No. Induk</th>
            <th>Nama Lengkap</th>
            <th>Jam Masuk</th>
            <th>Jam Keluar</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = mysqli_query($koneksi, "SELECT * FROM absensi INNER JOIN person ON absensi.id_person = person.id_person $SqlPeriode and person.nama_1 LIKE '%" . $namaOrang . "%' OR person.nama_2 LIKE '%" . $namaOrang . "%' ORDER BY no_induk ASC, tanggal ASC");
          $no = 1;
          while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td><?php echo $data['tanggal']; ?></td>
              <td><?php echo $data['no_induk']; ?></td>
              <td><?php echo $data['nama_1'];
                  echo "&nbsp";
                  echo $data['nama_2']; ?></td>
              <td><?php echo $data['jam_masuk'] ?></td>
              <td>
                <?php
                echo  $data['jam_keluar']
                ?>
              </td>
            </tr>
          <?php
            $no++;
          };
          ?>
        </tbody>
      </table>
    </form>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <center>
          <h5><?php echo @$data_info['kab_perusahaan']; ?>, <?php echo $tanggal; ?></h5>
          <br></br>
          <br></br>
          <h5><?php echo $data_profil['nama_1'];
              echo "&nbsp;";
              echo $data_profil['nama_2']; ?></h5>
        </center>
      </div>
    </div>
  </div><!-- /.container -->

  <!-- Bootstrap core JavaScript -->
  <script src="../../../lib/jquery/jquery.min.js"></script>
  <script src="../../../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../lib/ionicons/ionicons.js"></script>
  <script src="../../../js/jquery.cookie.js" type="text/javascript"></script>
  <script src="../../../js/azia.js"></script>

</body>

</html>