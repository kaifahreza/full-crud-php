<?php
session_start();
include 'config/app.php';

// menerima id_mahasiswa yang dipilih pengguna
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

if (delete_mahasiswa($id_mahasiswa) > 0) {
    echo "<script>
            alert('Data Mahasiswa Berhasil diHapus');
            document.location.href = 'mahasiswa.php';
        </script>";
} else {
    echo "<script>
            alert('Data Mahasiswa Gagal diHapus');
            document.location.href = 'mahasiswa.php';
        </script>";
}
