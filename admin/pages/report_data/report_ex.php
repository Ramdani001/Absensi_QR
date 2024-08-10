<?php
include  "../../../inc/config.php";
require "../../../vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\IOFactory;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


$spreadsheet = new Spreadsheet();
$Excel_writer = new Xlsx($spreadsheet);

$spreadsheet->setActiveSheetIndex(0);
$activeSheet = $spreadsheet->getActiveSheet();

//Code for Writing Cell Excel

$activeSheet->setCellValue('A1', 'No. Induk');
$activeSheet->setCellValue('B1', 'Nama Lengkap');
$activeSheet->setCellValue('C1', 'Tanggal');
$activeSheet->setCellValue('D1', 'Jam Masuk');
$activeSheet->setCellValue('E1', 'Jam Keluar');

//filter 
$awal = $_GET['awal'];
$akhir = $_GET['akhir'];
$nama = $_GET['nama']; 

$tglAwal = isset($_GET['awal']) ? $_GET['awal'] : "01-" . date('m-Y');
$tglAkhir = isset($_GET['akhir']) ? $_GET['akhir'] : date('d-m-Y');
$namaOrang = isset($_GET['nama']) ? $_GET['nama'] : null;
// $SqlPeriode = "WHERE absensi.tanggal >= DATE('".$tglAwal."') OR absensi.tanggal <= DATE('".$tglAkhir."')";
if($namaOrang != "All"){
  $SqlPeriode = "WHERE a.tanggal BETWEEN '$tglAwal' AND '$tglAkhir' AND a.id_person = $namaOrang";
}else{
  $SqlPeriode = "";
}

// var_dump($tglAwal);
// die();
$query  = mysqli_query($koneksi, "SELECT * FROM absensi a INNER JOIN person b ON a.id_person = b.id_person $SqlPeriode ORDER BY b.no_induk ASC, a.tanggal ASC");
 
$nomor  = 2;
while ($myData = mysqli_fetch_array($query)) {
  $activeSheet->setCellValue('A' . $nomor, $myData['no_induk']);
  $activeSheet->setCellValue('B' . $nomor, $myData['nama_1'] . " " . $myData['nama_2']);
  $activeSheet->setCellValue('C' . $nomor, $myData['tanggal']);
  $activeSheet->setCellValue('D' . $nomor, $myData['jam_masuk']);
  $activeSheet->setCellValue('E' . $nomor, $myData['jam_keluar']);
  $nomor++;
}

$filename = "report_data_absen.xlsx";
$Excel_writer->save($filename);

echo "<script>window.location='" . $filename . "';</script>";
