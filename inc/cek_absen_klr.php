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
                $jenis = 'k';
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
            $stmt = $conn->prepare("INSERT INTO absen (id_person, tanggal, waktu, jenis) VALUES (:id_person, :tanggal, :waktu, :jenis)");
            
            $stmt->bindParam(":id_person", $id_person, PDO::PARAM_STR);
            $stmt->bindParam(":tanggal", $tanggal, PDO::PARAM_STR); 
            $stmt->bindParam(":waktu", $waktu, PDO::PARAM_STR);
            $stmt->bindParam(":jenis", $jenis, PDO::PARAM_STR);

            $stmt->execute();

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