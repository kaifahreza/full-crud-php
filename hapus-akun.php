<?php
session_start();
include 'config/app.php';

// Menerima id_akun yang dipilih pengguna
$id_akun = isset($_GET['id_akun']) ? (int)$_GET['id_akun'] : 0;

if ($id_akun > 0) {
    if (delete_akun($id_akun) > 0) {
        echo "<script>
                alert('Data Akun Berhasil Dihapus');
                document.location.href = 'crud-modal.php';
             </script>";
    } else {
        echo "<script>
                alert('Data Akun Gagal Dihapus');
                document.location.href = 'crud-modal.php';
             </script>";
    }
} else {
    echo "<script>
            alert('ID Akun tidak valid');
            document.location.href = 'crud-modal.php';
         </script>";
}

?>
