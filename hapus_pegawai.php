<?php

include 'config/app.php';

// menerima id_pegawai yang dipilih
$id_pegawai = (int)$_GET['id_pegawai'];

if (delete_pegawai($id_pegawai) > 0) {
    echo "<script>
    alert('Data Pegawai Berhasil dihapus😁');
    document.location.href = 'pegawai.php';
    </script>";
} else {
    echo "<script>
    alert('Data Pegawai Gagal dihapus😥');
    document.location.href = 'pegawai.php';
    </script>";
}
