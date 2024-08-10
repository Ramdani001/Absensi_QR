<div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
  <div class="container">

    <div class="az-content-left az-content-left-components">
      <div class="component-item">
        <label>Data Akun</label>
        <nav class="nav flex-column">
          <a href="?page=user" class="nav-link">Akun</a>
          <a href="?page=user&action=add_form" class="nav-link">Tambah Akun</a>
          <a href="?page=user&action=add_form_admin" class="nav-link">Tambah Akun Admin</a>
        </nav>
        <label>Data Absensi</label>
        <nav class="nav flex-column">
          <a href="?page=absence" class="nav-link">Absensi</a>
        </nav>
        <label>Laporan Data</label>
        <nav class="nav flex-column">
          <a href="?page=report_data" class="nav-link">Laporan</a>
        </nav>
        <label>Profil</label>
        <nav class="nav flex-column">
          <a href="?page=profile" class="nav-link">Lihat Profil</a>
          <a href="?page=profile&action=setting" class="nav-link">Atur Profil</a>
          <a href="?page=profile&action=location" class="nav-link">Atur Kop Laporan</a>
        </nav>
      </div><!-- component-item -->
    </div><!-- content-left -->

    <div class="az-content-body pd-lg-l-40 d-flex flex-column">
      <div class="az-content-breadcrumb">
        <span>Laporan Data</span>
        <span>Laporan</span>
      </div>
      <h2 class="az-content-title">Laporan</h2>

      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form10" target="_self" role="form" enctype="multipart/form-data">
        <div class="row">
          <div class="col-lg-12 col-md-12 form-group">
            <label>Pilih Tanggal awal hingga akhir &amp; Nama pengguna</label>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-3 form-group">
            <input name="txtTglAwal" type="date" class="form-control" value="<?php echo $awalTgl; ?>">
          </div>
          <div class="col-lg-3 col-md-3 form-group">
            <input name="txtTglAkhir" type="date" class="form-control" value="<?php echo $akhirTgl; ?>">
          </div>
          <div class="col-lg-3 col-md-3 form-group">
            <select name="txtNama" class="form-control select2-no-search">
              <option value="All" selected>All</option>
              <?php
              include("../inc/config.php");
              $sql = mysqli_query($koneksi, "SELECT id_person,nama_1, nama_2, no_induk FROM person order by no_induk");
              while ($PERSON = mysqli_fetch_array($sql)) {
                echo "<option value='$PERSON[id_person]'>$PERSON[no_induk] - $PERSON[nama_1] $PERSON[nama_2]</option>";
              }
              ?>
            </select>
          </div>
          <div class="col-lg-3 col-md-3 form-group">
            <input name="btnTampil" class="btn btn-az-primary" type="submit" value="Tampilkan" />
          </div>
        </div>
      </form>
      <?php
      $SqlPeriode = "";
      $awalTgl  = "";
      $akhirTgl = "";
      $tglAwal  = "";
      $tglAkhir = "";
      $namaOrang = "";

      if (isset($_POST['btnTampil'])) {
        // var_dump($_POST);
        // die(); 
        $tglAwal  = isset($_POST['txtTglAwal']) ? $_POST['txtTglAwal'] : "01-" . date('m-Y');
        $tglAkhir   = isset($_POST['txtTglAkhir']) ? $_POST['txtTglAkhir'] : date('d-m-Y');
        $namaOrang   = isset($_POST['txtNama']) ? $_POST['txtNama'] : null;

        if($namaOrang != "All"){
          $SqlPeriode = "WHERE a.tanggal BETWEEN '$tglAwal' AND '$tglAkhir' AND a.id_person = $namaOrang";
        }else{
          $SqlPeriode = "";
        }
        
      } else {
        $awalTgl  = "01-" . date('m-Y');
        $akhirTgl   = date('d-m-Y');
        $namaOrang  = null;
        $SqlPeriode = "";
      }
      ?>
      <div class="ht-20"></div>
      <div class="table-responsive" role="grid" aria-describedby="dataTable_info">
        <table id="dataTables-example" class="table mg-b-0">
          <thead>
            <tr>
              <th>#</th>
              <th>No. Induk</th>
              <th>Nama Lengkap</th>
              <th>Tanggal</th>
              <th>Jam Masuk</th>
              <th>Jam Keluar</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $myQry  = mysqli_query($koneksi, "SELECT * FROM absensi a INNER JOIN person b ON a.id_person = b.id_person $SqlPeriode ORDER BY no_induk ASC, tanggal ASC");

            // var_dump("SELECT * FROM absensi a INNER JOIN person b ON a.id_person = b.id_person $SqlPeriode ORDER BY no_induk ASC, tanggal ASC");
            // die();

            $nomor  = 1;
            while ($myData = mysqli_fetch_array($myQry)) {
            ?>
              <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $myData['no_induk']; ?></td>
                <td><?php echo $myData['nama_1'];
                    echo "&nbsp";
                    echo $myData['nama_2']; ?></td>
                <td><?php echo $myData['tanggal']; ?></td>
                <td>
                  <?php echo $myData['jam_masuk']  ?></td>
                <td>
                  <?php echo $myData['jam_keluar']
                  ?>
                </td>
              </tr>
            <?php
              $nomor++;
            };
            ?>
          </tbody>
        </table>
      </div>
      <div class="ht-20"></div>
      <div class="row">
        <div class="col-lg-3">
          <a href="pages/report_data/report.php?awal=<?php echo $tglAwal; ?>&&akhir=<?php echo $tglAkhir; ?>&&nama=<?php echo $namaOrang; ?>" target="_blank" class="btn btn-az-primary"><i class="typcn typcn-printer"></i> Cetak Laporan</a>
        </div>

        <div class="col-lg-3">
          <a href="pages/report_data/report_ex.php?awal=<?php echo $tglAwal; ?>&&akhir=<?php echo $tglAkhir; ?>&&nama=<?php echo $namaOrang; ?>" target="_blank" class="btn btn-az-primary"><i class="typcn typcn-printer"></i> Cetak data Excel</a>
        </div>
      </div>

    </div><!-- content-body -->

  </div><!-- container -->
</div><!-- content -->