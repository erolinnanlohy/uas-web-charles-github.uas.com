<?php
session_start();
include 'config/koneksi.php';
include 'content/functions.php';

if (!isset($_SESSION['nim'])) {
    // Jika belum, alihkan ke halaman login
    header("Location: login.php");
    exit();
}

list($tahun_aktif, $semester_aktif) = getActiveSemester($conn);
$nim = $_SESSION["nim"];
$row_info = getStudentInfo($conn, $nim);
$jenis_semester = ($semester_aktif == 'Ganjil') ? 'Ganjil' : 'Genap';
$stmt_matakuliah = getCourseList($conn, $jenis_semester);
?>


<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Aplikasi KRS</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .square-image {
            border-radius: 15px;
            width: 100%;
            height: auto;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="content">
        <?php
        $page = @$_GET['page'];

        if (empty($page)) {
            include "content/home.php";
        } else {
            include "content/$page.php";
        }

        ?>
    </div>

    <!-- Tambahkan script JavaScript ini pada bagian head atau sebelum tag body ditutup -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const urlParams = new URLSearchParams(window.location.search);
            const status = urlParams.get('status');

            if (status === 'duplicate') {
                alert('Mata Kuliah sudah dipilih sebelumnya.');
                window.location.href = 'index.php'
            } else if (status === 'success') {
                alert('Mata Kuliah berhasil dipilih!');
                // Menghapus parameter URL
                const newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
                window.history.replaceState({}, document.title, newUrl);
            } else if (status === 'error') {
                alert('Error: Gagal menyimpan data.');
            }
        });

    </script>
    <script>
        // Fungsi untuk menampilkan konfirmasi penghapusan
        function confirmDelete(kodeMk) {
            const isConfirmed = confirm('Apakah Anda yakin ingin menghapus mata kuliah ini?');

            // Jika pengguna menekan OK (yakin), redirect ke halaman proses_hapus_krs.php
            if (isConfirmed) {
                window.location.href = 'index.php?page=hapus_krs&kode_mk=' + kodeMk;
            }
        }
    </script>

</body>

</html>