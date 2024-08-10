<div class="starter-template">
		<br></br>
		<img alt="logo" src="../../../<?php echo @$data_info['logo_perusahaan'];?>" style="position: relative; max-width:100px; max-height: 100px;">
		<h1 class="lap"><?php echo @$data_info['nama_perusahaan']; ?></h1>
		<p class="lead_lap"><?php echo @$data_info['deskripsi_perusahaan']; ?></p>
		<i>
			<p><?php echo @$data_info['alamat_perusahaan']; ?></p>
			<p>Kec. <?php echo @$data_info['kec_perusahaan']; ?>, <?php echo @$data_info['kab_perusahaan']; ?>, Prov. <?php echo @$data_info['prov_perusahaan']; ?>, Kode Pos : <?php echo @$data_info['kode_pos']; ?></p>
		</i>
			<p><?php echo @$data_info['web_perusahaan']; ?></p>
	<hr class="garis">
</div>