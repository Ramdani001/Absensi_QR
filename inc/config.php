<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "absensi";
$koneksi = mysqli_connect($servername, $username, $password, $dbname);

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
