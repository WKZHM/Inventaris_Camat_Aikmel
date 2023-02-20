<?php

$host = 'localhost';
$username = 'root';
$password = '';
$db = 'pkl_inventaris';

$koneksi = mysqli_connect($host, $username, $password, $db);

//logika untuk Cek Koneksi
// if (!$koneksi) {
//     echo "Data Base Tidak Berhasil Terkoneksi";
// } else {
//     echo "DataBASE berhasil terkoneksi";
// }
