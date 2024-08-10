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
        <span>Data Absensi</span>
        <span>Absensi</span>
      </div>
      <h2 class="az-content-title">Absensi</h2>

      <ul class="nav nav-pills mb-3 justify-content-end">
          <li class="nav-item"><a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Absensi</a>
          </li>
          <!-- <li class="nav-item"><a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Absen Keluar</a>
          </li> -->
      </ul>
      
      <div class="tab-content br-n pn">
        <div id="navpills-1" class="tab-pane active">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                   <div class="az-content-label mg-b-5">Tabel Data Absen Masuk</div>
                   <p class="mg-b-20">Data pada tabel ini sesuai dengan basis data.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                    <table id="dataTables-example" class="table mg-b-0" style="width: 100%;">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>No. Induk</th>
                          <th>Nama Lengkap</th>
                          <th>Tanggal</th>
                          <th>Absen Masuk</th>
                          <th>Absen Keluar</th>
                          <th style="width: 10px;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM absensi LEFT JOIN person ON absensi.id_person = person.id_person");
                        $no = 1;
                        while ($data = @mysqli_fetch_array($query))
                        {
                        ?>
                        <tr>
                        <td><?php echo "$no"; ?></td>
                        <td><?php echo $data['no_induk'] ;?></td>
                        <td><?php echo $data['nama_1']; echo"&nbsp;"; echo $data['nama_2'];?></td>
                        <td><?php echo $data['tanggal'] ;?></td>
                        <td><?php echo $data['jam_masuk'] ;?></td>
                        <td><?php echo $data['jam_keluar'] ;?></td>
                        <td>
                          <div class="btn-icon-list">
                          <a href="#" class="btn btn-danger btn-icon" data-toggle="tooltip" data-placement="bottom" title="Hapus Data" onclick="hapus_absen('?page=absence&action=delete&id_absen=<?php echo $data['id_absen']; ?>');">
                          <i class="typcn typcn-trash"></i></a>
                          </div> 
                        </td>
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
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                   <div class="az-content-label mg-b-5">Tabel Data Absen Keluar</div>
                   <p class="mg-b-20">Data pada tabel ini sesuai dengan basis data.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                    <table id="dataTables-example2" class="table mg-b-0" style="width: 100%;">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>No. Induk</th>
                          <th>Nama Lengkap</th>
                          <th>Tanggal</th>
                          <th>Waktu Absen</th>
                          <th style="max-width: 10px;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM absen LEFT JOIN person ON absen.id_person = person.id_person WHERE jenis = 'k'");
                        $no = 1;
                        while ($data = @mysqli_fetch_array($query))
                        {
                        ?>
                        <tr>
                        <td><?php echo "$no"; ?></td>
                        <td><?php echo $data['no_induk'] ;?></td>
                        <td><?php echo $data['nama_1']; echo"&nbsp;"; echo $data['nama_2'];?></td>
                        <td><?php echo $data['tanggal'] ;?></td>
                        <td><?php echo $data['waktu'] ;?></td>
                        <td>
                          <div class="btn-icon-list">
                          <a href="#" class="btn btn-danger btn-icon" data-toggle="tooltip" data-placement="bottom" title="Hapus Data" onclick="hapus_absen('?page=absence&action=delete&id_absen=<?php echo $data['id_absen']; ?>');">
                          <i class="typcn typcn-trash"></i></a>
                          </div> 
                        </td>
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
      </div>
    </div><!-- content-body -->

  </div><!-- container -->
</div><!-- content -->

<div class="modal fade" id="modal_hapus_absen" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modal_hapus_absen" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_hapus_absen">Konfirmasi Penghapusan Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin akan menghapus data ini?</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-danger" id="link_hapus_absen">Hapus</a>
                <button type="button" class="btn btn-az-primary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>