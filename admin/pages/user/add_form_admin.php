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
        <span>Tambah Akun Admin</span>
      </div>
      <h2 class="az-content-title">Tambah Akun Admin</h2>
      <?php
      if (@$_POST['tambah_admin']) {
        include 'add_proccess_admin.php';
      }
      ?>
      <form method="post" role="form" enctype="multipart/form-data">
      <div class="row">

        <div class="col-lg-6 col-md-6 form-group">
          <label>Nama Depan</label>
          <input type="text" class="form-control" name="nama_1" id="nama_1" placeholder="Masukan nama depan anda" required>
        </div>

        <div class="col-lg-6 col-md-6 form-group">
          <label>Nama Belakang</label>
          <input type="text" class="form-control" name="nama_2" id="nama_2" placeholder="Masukan nama belakang anda" required>
        </div>

        <div class="col-lg-12 col-md-12 form-group">
          <label>Pas Photo</label>
          <input type="file" class="form-control" id="uploadfoto" name="uploadfoto" required>
        </div>

        <div class="col-lg-6 col-md-6 form-group">
          <label>Nama Pengguna</label>
          <input type="text" class="form-control" name="username" id="username" required>
        </div>

        <div class="col-lg-6 col-md-6 form-group">
          <label>Kata Sandi</label>
          <input type="password" class="form-control" name="password" id="password" required>
        </div>

        <div class="col-lg-12 col-md-12 form-group">
          <input class="btn btn-az-primary" type="submit" name="tambah_admin" value="Tambah">
          <button type="reset" class="btn btn-danger">Reset</button>
          <a href="?page=user" class="btn btn-secondary">Batal</a>
        </div>       

      </div>  
      </form>

    </div><!-- content-body -->

  </div><!-- container -->
</div><!-- content -->