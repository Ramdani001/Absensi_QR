<?php
ob_start();
$id = isset($_GET['id_person']) ? $_GET['id_person'] : null;
include ("../inc/config.php");

mysqli_query($koneksi,"DELETE FROM person where id_person='$id'");
mysqli_query($koneksi,"DELETE FROM absen where id_person='$id'");
?>
<script type="text/javascript">
  alert ("Hapus data berhasil!");
  window.location.href="?page=user";
</script>