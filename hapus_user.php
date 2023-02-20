<?php

include 'config/app.php';

// menerima id_user yang dipilih
$id_user = (int)$_GET['id_user'];

if (delete_user($id_user) > 0) {
    echo "<script>
    alert('Data User Berhasil dihapus😁');
    document.location.href = 'user.php';
    </script>";
} else {
    echo "<script>
    alert('Data User Gagal dihapus😥');
    document.location.href = 'user.php';
    </script>";
}
