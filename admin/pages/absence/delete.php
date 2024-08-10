<?php
ob_start();
$id = isset($_GET['id_absen']) ? $_GET['id_absen'] : null;
include ("../inc/config.php");
mysqli_query($koneksi,"DELETE FROM absensi where id_absen='$id'");
?>
<script type="text/javascript">
  alert ("Hapus data berhasil!");
  window.location.href="?page=absence";
</script>