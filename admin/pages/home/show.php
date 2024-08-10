<?php
$query_profil = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '" . $_SESSION['username'] . "'");
$data_profil = mysqli_fetch_array($query_profil);

$query = mysqli_query($koneksi, "SELECT COUNT(id_person) AS total FROM person");
$data = mysqli_fetch_array($query);

$query2 = mysqli_query($koneksi, "SELECT COUNT(id_admin) AS total2 FROM admin");
$data2 = mysqli_fetch_array($query2);

$query3 = mysqli_query($koneksi, "SELECT COUNT(waktu) AS total3 FROM absen WHERE jenis = 'm'");
$data3 = mysqli_fetch_array($query3);

$query4 = mysqli_query($koneksi, "SELECT COUNT(waktu) AS total4 FROM absen WHERE jenis = 'k'");
$data4 = mysqli_fetch_array($query4);
?>

  <div class="az-dashboard-one-title">
    <div>
      <h2 class="az-dashboard-title">Hi, Selamat Datang Kembali <?php echo $data_profil['nama_1']; echo "&nbsp"; echo $data_profil['nama_2'];?>!</h2>
      <p class="az-dashboard-text">Semua sistem berjalan dengan lancar.</p>
    </div>
    <div class="az-content-header-right">
      <div class="media">
        <div class="media-body">
          <label>Waktu</label>
          <h6 id="waktu"></h6>
        </div><!-- media-body -->
      </div><!-- media -->
      <div class="media">
        <div class="media-body">
          <label>Hari Ini</label>
          <h6>
            <?php 
            // Set locale (note: this is only relevant if using IntlDateFormatter)
            setlocale(LC_TIME, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID');
            
            // Create a DateTime object
            $hariIni = new DateTime();
            
            // Create an IntlDateFormatter instance for formatting dates
            $formatter = new IntlDateFormatter(
                'id_ID', // Locale
                IntlDateFormatter::FULL, // Date format style
                IntlDateFormatter::NONE, // Time format style
                'Asia/Jakarta', // Timezone
                IntlDateFormatter::GREGORIAN // Calendar type
            );
            
            // Format the date
            echo $formatter->format($hariIni);            
            ?>
            
          </h6>
        </div><!-- media-body -->
      </div><!-- media -->
    </div>
  </div><!-- dashboard-one-title -->

  <div class="row row-sm mg-b-20">

    <div class="col-lg-7 ht-lg-100p">
      <div class="card card-dashboard-four">
        <div class="card-header">
          <h6 class="card-title">Bagan Data</h6>
          <p class="card-text">Data informasi yang ada saat ini.</p>
        </div><!-- card-header -->
        <div class="card-body row">
          <div class="col-md-6 d-flex align-items-center">
            <div class="chart"><canvas id="chartDonut"></canvas></div>
          </div>
          <div class="col-md-6 col-lg-5 mg-lg-l-auto mg-t-20 mg-md-t-0">
            <div class="az-traffic-detail-item">
              <div>
                <span>Akun Pengguna</span>
                <span><?php echo $data['total'];?> <span><i class="fas fa-users"></i></span></span>
              </div>
            </div>
            <div class="az-traffic-detail-item">
              <div>
                <span>Akun Admin</span>
                <span><?php echo $data2['total2'];?> <span><i class="fas fa-users"></i></span></span>
              </div>
            </div>
            <div class="az-traffic-detail-item">
              <div>
                <span>Absensi Kehadiran</span>
                <span><?php echo $data3['total3'];?> <span><i class="fas fa-check-square"></i></span></span>
              </div>
            </div>
            <div class="az-traffic-detail-item">
              <div>
                <span>Absensi Kepulangan</span>
                <span><?php echo $data4['total4'];?> <span><i class="fas fa-check-square"></i></span></span>
              </div>
            </div>
          </div><!-- col -->
        </div><!-- card-body -->
      </div><!-- card -->
    </div><!-- col -->

    <div class="col-lg-5 mg-t-20 mg-lg-t-0">
      <div class="row row-sm">

        <div class="col-sm-6">
          <div class="card card-dashboard-two">
            <div class="card-header">
              <h4>Jumlah Akun</h4>
              <h6>
                <?php
                echo $data['total'] + $data2['total2'];
                ?>
                <i class="fas fa-users"></i>
              </h6>
              
            </div><!-- card-header -->
            <div class="card-body">
              <p style="margin: 20px;">Jumlah total akun pengguna dan akun admin.</p>
            </div>
          </div>
        </div>

        <div class="col-sm-6 mg-t-20 mg-sm-t-0">
          <div class="card card-dashboard-two">
            <div class="card-header">
              <h4>Laporan Data</h4>
              <p>Menu ini dapat membuat laporan absensi kehadiran dan absensi kepulangan kedalam bentuk file PDF.</p>
            </div><!-- card-header -->
            <div class="card-body" style="text-align: right;">
              <a href="?page=report_data" class="btn btn-az-primary" style="margin: 20px;">Buat Laporan</a>
            </div>
          </div>
        </div>

        <div class="col-sm-12 mg-t-20">
          <div class="card card-dashboard-two">
            <div class="card-header">
              <h4>Reset Data</h4>
              <p>Menu ini dapat menghapus semua data absensi dan data akun pengguna termasuk akun admin.
              <br>Klik tombol dibawah untuk memulai reset.</p>
            </div>
            <div class="card-body" style="text-align: right;">
              <a href="#" onclick="reset_data()" class="btn btn-az-primary" name="reset" style="margin: 20px;">Reset</a>
            </div>
          </div>
        </div>

      </div><!-- row -->
    </div><!--col -->
  </div><!-- row -->