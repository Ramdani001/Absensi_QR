
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
        <span>Profil</span>
        <span>Atur Kop Laporan</span>
      </div>
      <h2 class="az-content-title">Atur Kop Laporan</h2>
      <?php
        $query = mysqli_query($koneksi, "SELECT * FROM info");
        $data = mysqli_fetch_array($query);
        $hasil = mysqli_num_rows($query);
        if ($hasil == 0) {
          if (@$_POST['tambah']) {
          include 'add_proccess_location.php';
          }
        ?>
          <form method="post" role="form" enctype="multipart/form-data">
          <div class="row">

            <div class="col-lg-6 col-md-6 form-group">
              <label>Nama Perusahaan</label>
              <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" placeholder="Masukan nama perusahaan anda" required>
            </div>

            <div class="col-lg-6 col-md-6 form-group">
              <label>Situs Web Perusahaan</label>
              <input type="text" class="form-control" name="web_perusahaan" id="web_perusahaan" placeholder="Masukan situs web perusahaan anda" required>
            </div>

            <div class="col-lg-6 col-md-6 form-group">
              <label>Deskripsi Perusahaan</label>
              <textarea class="form-control" rows="4" id="deskripsi_perusahaan" name="deskripsi_perusahaan" placeholder="Masukan deskripsi tentang perusahaan anda" required></textarea>
            </div>

            <div class="col-lg-6 col-md-6 form-group">
              <label>Alamat</label>
              <textarea class="form-control" rows="4" id="alamat_perusahaan" name="alamat_perusahaan" placeholder="Masukan alamat perusahaan anda" required></textarea>
            </div>

            <div class="col-lg-6 col-md-6 form-group">
              <label>Kecamatan</label>
              <input type="text" class="form-control" name="kec_perusahaan" id="kec_perusahaan" placeholder="Masukan kecamatan perusahaan anda" required>
            </div>

            <div class="col-lg-6 col-md-6 form-group">
              <label>Kabupaten/Kota</label>
              <input type="text" class="form-control" name="kab_perusahaan" id="kab_perusahaan" placeholder="Masukan kabupaten/kota perusahaan anda" required>
            </div>

            <div class="col-lg-6 col-md-6 form-group">
              <label>Provinsi</label>
              <input type="text" class="form-control" name="prov_perusahaan" id="prov_perusahaan" placeholder="Masukan provinsi perusahaan anda" required>
            </div>

            <div class="col-lg-6 col-md-6 form-group">
              <label>Kode Pos</label>
              <input type="text" class="form-control" name="kode_pos" id="kode_pos" maxlength="6" placeholder="Masukan kode pos perusahaan anda" required>
            </div>

            <div class="col-lg-6 col-md-6 form-group">
              <label>Logo Perusahaan</label>
              <input type="file" class="form-control" id="uploadfoto" name="uploadfoto" required>
            </div>

            <div class="col-lg-12 col-md-12 form-group">
              <input class="btn btn-az-primary" type="submit" name="tambah" value="Tambah">
              <button type="reset" class="btn btn-danger">Reset</button>
              <a href="?page=profile" class="btn btn-secondary">Batal</a>
            </div>

          </div>  
          </form>
        <?php
        } else {
          if (@$_POST['simpan']) {
          include 'edit_proccess_location.php';
          }
        ?>
          <form method="post" role="form" enctype="multipart/form-data">
          <div class="row">

            <input type="hidden" class="form-control" name="id_info" id="id_info" value="<?php echo $data['id_info'];?>">

            <div class="col-lg-6 col-md-6 form-group">
              <label>Nama Perusahaan</label>
              <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo $data['nama_perusahaan']; ?>">
            </div>

            <div class="col-lg-6 col-md-6 form-group">
              <label>Situs Web Perusahaan</label>
              <input type="text" class="form-control" name="web_perusahaan" id="web_perusahaan" value="<?php echo $data['web_perusahaan']; ?>">
            </div>

            <div class="col-lg-6 col-md-6 form-group">
              <label>Deskripsi Perusahaan</label>
              <textarea class="form-control" rows="4" id="deskripsi_perusahaan" name="deskripsi_perusahaan"><?php echo $data['deskripsi_perusahaan']; ?></textarea>
            </div>

            <div class="col-lg-6 col-md-6 form-group">
              <label>Alamat</label>
              <textarea class="form-control" rows="4" id="alamat_perusahaan" name="alamat_perusahaan"><?php echo $data['alamat_perusahaan']; ?></textarea>
            </div>

            <div class="col-lg-6 col-md-6 form-group">
              <label>Kecamatan</label>
              <input type="text" class="form-control" name="kec_perusahaan" id="kec_perusahaan" value="<?php echo $data['kec_perusahaan']; ?>">
            </div>

            <div class="col-lg-6 col-md-6 form-group">
              <label>Kabupaten/Kota</label>
              <input type="text" class="form-control" name="kab_perusahaan" id="kab_perusahaan" value="<?php echo $data['kab_perusahaan']; ?>">
            </div>

            <div class="col-lg-6 col-md-6 form-group">
              <label>Provinsi</label>
              <input type="text" class="form-control" name="prov_perusahaan" id="prov_perusahaan" value="<?php echo $data['prov_perusahaan']; ?>">
            </div>

            <div class="col-lg-6 col-md-6 form-group">
              <label>Kode Pos</label>
              <input type="text" class="form-control" name="kode_pos" id="kode_pos" value="<?php echo $data['kode_pos']; ?>" maxlength="6">
            </div>

            <div class="col-lg-6 col-md-6 form-group">
              <label>Logo Perusahaan</label>
              <br></br>
              <input type="hidden" name="uploadphoto_old" value="<?php echo $data['logo_perusahaan'];?>">
              <img src="../<?php echo $data['logo_perusahaan'];?>" alt="" style="max-width:150px; max-height: 150px;"><br></br>
              <input type="file" class="form-control" id="uploadphoto" name="uploadphoto">
            </div>

            <div class="col-lg-12 col-md-12 form-group">
              <input class="btn btn-az-primary" type="submit" name="simpan" value="Simpan">
              <button type="reset" class="btn btn-danger">Reset</button>
              <a href="?page=profile" class="btn btn-secondary">Batal</a>
            </div>

          </div>  
          </form>
        <?php
        }
      ?>
    </div><!-- content-body -->

  </div><!-- container -->
</div><!-- content -->