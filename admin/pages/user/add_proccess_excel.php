<?php 
// menghubungkan dengan koneksi
include '../inc/config.php';
// menghubungkan dengan library excel reader
include "excel_reader.php";
?>
 
<?php
// upload file xls
$target = basename($_FILES['fileuser']['name']) ;
move_uploaded_file($_FILES['fileuser']['tmp_name'], $target);
 
// beri permisi agar file xls dapat di baca
chmod($_FILES['fileuser']['name'],0777);
 
// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['fileuser']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);
 
// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){
 
	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$nama_1     = $data->val($i, 1);
	$nama_2   	= $data->val($i, 2);
	$foto  		= $data->val($i, 3);
	$kodeqr		= $data->val($i, 4);
 
	if($nama_1 != "" && $nama_2 != "" && $kodeqr != ""){
		// input data ke database (table data_pegawai)
		mysqli_query($koneksi,"INSERT INTO person values('','$nama_1','$nama_2','$foto','$kodeqr')");
		$berhasil++;
	}
}
 
// hapus kembali file .xls yang di upload tadi
unlink($_FILES['fileuser']['name']);
 
// alihkan halaman ke index.php
header("location:?page=user");
?>