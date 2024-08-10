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
        <span>Data Akun</span>
        <span>Tambah Akun</span>
      </div>
      <h2 class="az-content-title">Tambah Akun</h2>
      <?php
      if (@$_POST['tambah']) {
        include 'add_proccess.php';
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

        <div class="col-lg-6 col-md-6 form-group">
          <label>Alamat Email</label>
          <input type="text" class="form-control" name="alamat_email" id="alamat_email" placeholder="Masukan nama belakang anda" required>
        </div>
        
        <div class="col-lg-12 col-md-12 form-group">
          <label>Foto</label>
          <input type="file" class="form-control" name="foto_ang" id="foto_ang" required>
        </div>

        <div class="col-lg-12 col-md-12 form-group">
          <button type="button" class="btn btn-az-primary qr-generator" onclick="generateQrCode()">Hasilkan Kode QR</button>
          <div class="qr-con text-center" style="display: none;">
            <input type="hidden" class="form-control" id="generatedCode" name="generated_code">
            <p>Ambil foto Kode QR Anda.</p>
            <img class="mb-4" src="" id="qrImg" alt="">
          </div>
        </div>

        <div class="col-lg-12 col-md-12 form-group tambah" style="display: none;">
          <input class="btn btn-az-primary" type="submit" name="tambah" value="Tambah">
          <button type="reset" class="btn btn-danger">Reset</button>
          <a href="?page=user" class="btn btn-secondary">Batal</a>
        </div>       

      </div>  
      </form>

    </div><!-- content-body -->

  </div><!-- container -->
</div><!-- content -->