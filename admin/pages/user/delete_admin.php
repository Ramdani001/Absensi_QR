<?php
if (isset($_POST['hapus_admin'])) {
	$id = isset($data['id_admin']) ? $data['id_admin'] : null;
	$pass  = addslashes($_POST['password']);
	$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE password = md5('$pass')");
    $hasil = mysqli_num_rows($query);
    $data  = mysqli_fetch_array($query);

    if ($hasil == 1) {
	    ?>
	    
		<?php
		ob_start();
		$result = mysqli_query($koneksi,"SELECT foto FROM admin where id_admin='$id'");
	  	while ($row = mysqli_fetch_row($result)) {
	    	unlink("../".$row[0]);
	  	}
	  	if ($result) {
			mysqli_query($koneksi,"DELETE FROM admin where id_admin='$id'");
			?>
			<script type="text/javascript">
				alert("Hapus data berhasil.");
				window.location.href = "../inc/logout.php";
			</script>
			
			<?php
		} else {
			?>
			<script type="text/javascript">
				alert ("Hapus data gagal, Akun anda akan otomatis keluar dari sesi.");
				window.location.href="../login.php";
			</script>
			<?php
		}	
	} else {
    ?>
    <script type="text/javascript">
		alert ("Kata Sandi salah.");
		window.location.href="index.php";
	</script>
    <?php
    }
}
?>