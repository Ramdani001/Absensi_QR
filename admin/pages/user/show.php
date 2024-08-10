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
        <span>Akun</span>
      </div>
      <h2 class="az-content-title">Akun</h2>

      <ul class="nav nav-pills mb-3 justify-content-end">
          <li class="nav-item"><a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Akun</a>
          </li>
          <li class="nav-item"><a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Akun Admin</a>
          </li>
      </ul>

      <div class="tab-content br-n pn">
        <div id="navpills-1" class="tab-pane active">

          <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9">
               <div class="az-content-label mg-b-5">Tabel Data Akun</div>
               <p class="mg-b-20">Data pada tabel ini sesuai dengan basis data.</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3" style="text-align:right;">
              <a href="?page=user&action=add_form" class="btn btn-az-primary" ><i class="typcn typcn-plus"></i> Tambah Data </a>
              <!-- <button data-toggle="dropdown" class="btn btn-az-primary"><i class="typcn typcn-plus"></i> Tambah Data <i class="icon ion-ios-arrow-down tx-11 mg-l-3"></i></button>
                <div class="dropdown-menu"> -->
                  <!-- <a href="?page=user&action=add_excel" class="dropdown-item">Tambah Data via Excel</a> -->
                <!-- </div> -->
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="table-responsive">
                <table id="dataTables-example" class="table mg-b-0" style="width: 100%;">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Foto</th>
                      <th>No. Induk</th>
                      <th>Nama Lengkap</th>
                      <th>Alamat Email</th>
                      <th style="width: 10px;"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM person");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    $no = 1;
                    foreach ($result as $row) {
                        $id = $row["id_person"];
                        $no_induk = $row["no_induk"];
                        $foto = $row["foto"];
                        $nama_depan = $row["nama_1"];
                        $nama_belakang = $row["nama_2"];
                        $alamat_email = $row["alamat_email"];
                        $qrCode = $row["generated_code"];
                    ?>
                    <tr>
                    <td><?php echo "$no"; ?></td>
                    <td>
                      <img src="../img/profile/<?= $foto ?>" alt="Foto" style="width: 100px; border-radius: 10px;">
                    </td>
                    <td><?php echo $no_induk; ?></td>
                    <td><?php echo $nama_depan; echo"&nbsp;"; echo $nama_belakang;?></td>
                    <td><?php echo $alamat_email;?></td>
                    <td>
                      <div class="btn-icon-list">
                      <button class="btn btn-success btn-icon" data-toggle="modal" data-placement="bottom" title="Lihat Kode QR" data-target="#qrCodeModal<?= $id ?>">
                        <i class="fas fa-qrcode"></i></button>
                      <a href="?page=user&action=edit&id_person=<?php echo $id; ?>" class="btn btn-secondary btn-icon" data-toggle="tooltip" data-placement="bottom" title="Ubah Data">
                        <i class="typcn typcn-pencil"></i></a>
                      <a href="#" class="btn btn-danger btn-icon" data-toggle="tooltip" data-placement="bottom" title="Hapus Data" onclick="hapus_user('?page=user&action=delete&id_person=<?php echo $id; ?>');">
                        <i class="typcn typcn-trash"></i></a>
                      </div> 
                    </td>
                    </tr>
                      <!-- QR Modal --> 
                      <div class="modal fade" id="qrCodeModal<?= $id ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Kode QR <?php echo $nama_depan; echo"&nbsp;"; echo $nama_belakang;?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body text-center">
                              <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?= $qrCode ?>" alt="" width="300">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-az-primary" data-dismiss="modal">Tutup</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php
                    $no++;
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <div id="navpills-2" class="tab-pane">

          <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9">
               <div class="az-content-label mg-b-5">Tabel Data Akun Admin</div>
               <p class="mg-b-20">Data pada tabel ini sesuai dengan basis data.</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3" style="text-align:right;">
              <a href="?page=user&action=add_form_admin" class="btn btn-az-primary"><i class="typcn typcn-plus"></i> Tambah Data</a>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="table-responsive">
                <table id="dataTables-example2" class="table mg-b-0" style="width: 100%;">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Lengkap</th>
                      <th>Pas Photo</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM admin");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    $no = 1;
                    foreach ($result as $row) {
                      $id = $row["id_admin"];
                      $nama_depan = $row["nama_1"];
                      $nama_belakang = $row["nama_2"];
                      $foto = $row["foto"];
                    ?>
                    <tr>
                    <td><?php echo "$no"; ?></td>
                    <td><?php echo $nama_depan; echo"&nbsp;"; echo $nama_belakang;?></td>
                    <td><center><img src="../<?php echo $foto;?>" style="max-width:100px; max-height: 250px;"></center></td>
                    </tr>
                    <?php
                    $no++;
                    }
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

<div class="modal fade" id="modal_hapus_user" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modal_hapus_user" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_hapus_user">Konfirmasi Penghapusan Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin akan menghapus data ini?</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-danger" id="link_hapus_user">Hapus</a>
                <button type="button" class="btn btn-az-primary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_lihat_qr" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modal_lihat_qr" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_lihat_qr">Kode QR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-az-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>                                   