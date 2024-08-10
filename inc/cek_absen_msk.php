<?php
include("config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['qr_code'])) {
        $qrCode = $_POST['qr_code'];

        $selectStmt = $conn->prepare("SELECT id_person FROM person WHERE generated_code = :generated_code");
        $selectStmt->bindParam(":generated_code", $qrCode);

        if ($selectStmt->execute()) {
            $result = $selectStmt->fetch();
            if ($result !== false) {
                $id_person = $result["id_person"];
                date_default_timezone_set('Asia/Jakarta');
                $tanggal =  date("Y-m-d");
                $waktu =  date("H:i:s");
                $jenis = 'm';
            } else {
                echo "
                    <script>
                        alert('Kode QR tidak terdaftar.');
                        window.location.href = '../index.php';
                    </script>
                ";
            }
        } else {
            echo "
                <script>
                    alert('Absen gagal.');
                    window.location.href = '../index.php';
                </script>
            ";
        }

        try {

            $check_absensi = mysqli_query($koneksi,"SELECT * FROM absensi WHERE id_person=$id_person ORDER BY tanggal DESC");
            $check = mysqli_fetch_array($check_absensi);
            
            if(is_null($check)){

                    $stmt = $conn->prepare("INSERT INTO absensi (id_person, tanggal, jam_masuk, jam_keluar) VALUES (:id_person, :tanggal, :jam_masuk, :jam_keluar)");
                    $stmt->bindParam(":id_person", $id_person, PDO::PARAM_STR);
                    $stmt->bindParam(":tanggal", $tanggal, PDO::PARAM_STR);  
                    $stmt->bindParam(":jam_masuk", $waktu, PDO::PARAM_STR);

                    $nullValue = null;
                    $stmt->bindValue(":jam_keluar", $nullValue, PDO::PARAM_NULL);
                    
                    $stmt->execute();
            }else{
                $tgl = $check['tanggal'];

                if ($tgl != $tanggal) {
                    $stmt = $conn->prepare("INSERT INTO absensi (id_person, tanggal, jam_masuk, jam_keluar) VALUES (:id_person, :tanggal, :jam_masuk, :jam_keluar)");
                    $stmt->bindParam(":id_person", $id_person, PDO::PARAM_STR);

                    $stmt->bindParam(":tanggal", $tanggal, PDO::PARAM_STR);
                    $stmt->bindParam(":jam_masuk", $waktu, PDO::PARAM_STR);

                    $nullValue = null;
                    $stmt->bindValue(":jam_keluar", $nullValue, PDO::PARAM_NULL);
                    
                    $stmt->execute();
                } else{
                    $stmt = $conn->prepare("UPDATE absensi SET jam_keluar = :jam_keluar WHERE id_person = :id_person AND tanggal=:tanggal");
                    $stmt->bindParam(":id_person", $id_person, PDO::PARAM_STR);
                    $stmt->bindParam(":tanggal", $tanggal, PDO::PARAM_STR);
                    $stmt->bindParam(":jam_keluar", $waktu, PDO::PARAM_STR);

                    $stmt->execute();
                }
                
            }
            

            echo "
                <script>
                    alert('Absen berhasil.');
                    window.location.href = '../index.php';
                </script>
            ";

            exit();
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
    } else {
        echo "
            <script>
                alert('Kode QR error.');
                window.location.href = '../index.php';
            </script>
        ";
    }
}

?>