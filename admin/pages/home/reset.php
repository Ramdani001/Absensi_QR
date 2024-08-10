<?php
ob_start();
include ("../inc/config.php");
mysqli_query($koneksi,"DELETE FROM absen");
mysqli_query($koneksi,"DELETE FROM person");
mysqli_query($koneksi,"DELETE FROM admin");
mysqli_query($koneksi,"DELETE FROM info");
?>
<script type="text/javascript">
  alert ("Reset data berhasil!");
  window.location.href="../register_admin.php";
</script>
?>