<?php

include 'config/app.php';

// menerima id_barang yang dipilih
$id_barang = (int)$_GET['id_barang'];

if (delete_barang($id_barang) > 0) {
    echo "<script>
    alert('Data Barang Berhasil dihapus😁');
    document.location.href = 'barang.php';
    </script>";
} else {
    echo "<script>
    alert('Data Barang Gagal dihapus😥');
    document.location.href = 'barang.php';
    </script>";
}
