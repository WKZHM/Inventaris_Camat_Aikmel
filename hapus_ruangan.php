<?php

include 'config/app.php';

// menerima id_ruang yang dipilih
$id_ruang = (int)$_GET['id_ruang'];

if (delete_ruang($id_ruang) > 0) {
    echo "<script>
    alert('Data Ruangan Berhasil dihapus😁');
    document.location.href = 'ruangan.php';
    </script>";
} else {
    echo "<script>
    alert('Data Ruangan Gagal dihapus😥');
    document.location.href = 'ruangan.php';
    </script>";
}
