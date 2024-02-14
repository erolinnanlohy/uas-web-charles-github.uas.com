<?php
session_start();
include 'config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST["nim"];
    $password = $_POST["password"];

    // Validasi NIM dan password (contoh: pastikan tidak kosong)
    if (empty($nim) || empty($password)) {
        // NIM atau password kosong, tampilkan pesan kesalahan
        $error_message = "NIM dan Password harus diisi.";
    } else {
        // Query untuk mendapatkan data mahasiswa berdasarkan NIM
        $sql = "SELECT * FROM mahasiswa WHERE nim = :nim AND status = 'Aktif'";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nim', $nim);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                // Verifikasi password menggunakan password_verify
                if (password_verify($password, $row['password'])) {
                    $_SESSION["nim"] = $nim;
                    header("Location: index.php");
                } else {
                    // Tampilkan alert jika password tidak cocok
                    echo "<script>alert('Login Gagal. Pastikan NIM dan Password benar. Atau status Anda tidak aktif.');</script>";
                    echo "<script>window.location.href='login.php';</script>";
                }
            } else {
                // Tampilkan alert jika NIM tidak ditemukan
                echo "<script>alert('Login Gagal. Pastikan NIM dan Password benar. Atau status Anda tidak aktif.');</script>";
                echo "<script>window.location.href='login.php';</script>";
            }
        } catch (PDOException $e) {
            // Kesalahan query, tampilkan pesan kesalahan
            $error_message = "Error: " . $e->getMessage();
        }
    }
}
?>