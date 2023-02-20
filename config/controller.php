<!-- Menyimpan seluruh fungsi yang digunakan untuk berinteraski ke database baik itu mengubah, mehapus dan menampilkan data -->
<?php
// fungsi menampilkan data
function select($query)
{
    // memanggil koneksi database
    global $koneksi;
    //memasukkan query dan database yang akan digunakan
    $result = mysqli_query($koneksi, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// fungsi menambahkan data barang
function create_barang($post)
{
    global $koneksi;

    $nama_barang = strip_tags($post['nama_barang']); //htmlspecialchars() atau strip_tags() keamaan saat melakukan intup agar tidak terjadi hacking xss
    $kategori = strip_tags($post['kategori']);
    $ruang = strip_tags($post['ruang']);
    $jumlah = strip_tags($post['jumlah']);

    // query tambah data
    $query = "INSERT INTO barang VALUES(null, '$nama_barang', '$kategori', '$ruang', '$jumlah', CURRENT_TIMESTAMP())";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi ubah/update data barang
function update_barang($post)
{
    global $koneksi;

    $id_barang = $post['id_barang'];
    $nama_barang = strip_tags($post['nama_barang']);
    $kategori = strip_tags($post['kategori']);
    $ruang = strip_tags($post['ruang']);
    $jumlah = strip_tags($post['jumlah']);

    // query ubah/update data
    $query = "UPDATE barang SET nama_barang = '$nama_barang', kategori = '$kategori', ruang = '$ruang', jumlah = '$jumlah' WHERE id_barang = $id_barang";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi delete barang
function delete_barang($id_barang)
{
    global $koneksi;

    // query hapus data barang
    $query = "DELETE FROM barang WHERE id_barang = $id_barang";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi menambahkan data pegawai
function create_pegawai($post)
{
    global $koneksi;

    $nama_pegawai = strip_tags($post['nama_pegawai']); //htmlspecialchars() atau strip_tags() keamaan saat melakukan intup agar tidak terjadi hacking
    $nip = strip_tags($post['nip']);
    $jk = strip_tags($post['jk']);
    $jabatan = strip_tags($post['jabatan']);
    $telepon = strip_tags($post['telepon']);
    $foto = upload_file();

    // cek upload foto/file
    if (!$foto) {
        return false;
    }

    // query tambah data
    $query = "INSERT INTO pegawai VALUES(null, '$nama_pegawai', '$nip', '$jk', '$jabatan', '$telepon', '$foto')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi mengubah data pegawai
function update_pegawai($post)
{
    global $koneksi;
    $id_pegawai = strip_tags($post['id_pegawai']);
    $nama_pegawai = strip_tags($post['nama_pegawai']);
    $nip = strip_tags($post['nip']);
    $jk = strip_tags($post['jk']);
    $jabatan = strip_tags($post['jabatan']);
    $telepon = strip_tags($post['telepon']);
    $fotoLama = strip_tags($post['fotoLama']);

    // cek upload foto/file baru atau tidak
    if ($_FILES['foto']['error'] == 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload_file();
    }

    // query ubah data
    $query = "UPDATE pegawai SET nama_pegawai = '$nama_pegawai', nip = '$nip', jk = '$jk', jabatan = '$jabatan', telepon = '$telepon', foto = '$foto' WHERE id_pegawai = $id_pegawai";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi upload file/photo
function upload_file()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    //cet file yang diupload
    $extensifileValid = ['jpeg', 'jpg', 'png']; // sayrat ektensi file yang harus diupload dan bisa ditambahkan, misal pdf
    $extensifile = explode('.', $namaFile); // cek nama ektensi dari file yang diupload
    $extensifile = strtolower(end($extensifile)); // untuk merubah ektesi yng huruf besar menjadi kecil ex: .JPG -> .jpg

    //cek format ektensi file
    if (!in_array($extensifile, $extensifileValid)) {
        //pesan gagal

        echo "<script>
        alert('Format File Tidak Valid😏');
        document.location.href = 'add_pegawai.php';
        </script>";
        die();
    }

    //cek ukuran file 4 mb
    if ($ukuranFile > 4048000) {
        //pesan gagal

        echo "<script>
        alert('Format File Terlalu Besar, Max 4 MB😠');
        document.location.href = 'add_pegawai.php';
        </script>";
        die();
    }

    //generate nama file baru
    $namaFileBaru = uniqid(); //agar nama file yang tersimpan unik
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensifile;

    // pindahkan ke local folder
    move_uploaded_file($tmpName, 'dist/img/' . $namaFileBaru);

    return $namaFileBaru;
}

// fungsi delete pegawai
function delete_pegawai($id_pegawai)
{
    global $koneksi;

    // ambil foto/file sesuai data yang dipilih agar foto difolder img juga ikut terhapus
    $foto = select("SELECT * FROM pegawai WHERE id_pegawai = $id_pegawai")[0];
    unlink("dist/img/" . $foto['foto']);

    // query hapus data pegawai
    $query = "DELETE FROM pegawai WHERE id_pegawai = $id_pegawai";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi menambahkan data barang
function create_ruang($post)
{
    global $koneksi;

    $lokasi = strip_tags($post['lokasi']); //htmlspecialchars() atau strip_tags() keamaan saat melakukan intup agar tidak terjadi hacking xss
    $ruang = strip_tags($post['ruang']);

    // query tambah data
    $query = "INSERT INTO ruang VALUES(null, '$lokasi', '$ruang')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi ubah/update data ruang
function update_ruang($post)
{
    global $koneksi;

    $id_ruang = $post['id_ruang'];
    $lokasi = strip_tags($post['lokasi']);
    $ruang = strip_tags($post['ruang']);

    // query ubah/update data
    $query = "UPDATE ruang SET lokasi = '$lokasi', ruang = '$ruang' WHERE id_ruang = $id_ruang";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi delete ruang
function delete_ruang($id_ruang)
{
    global $koneksi;

    // query hapus data ruang
    $query = "DELETE FROM ruang WHERE id_ruang = $id_ruang";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi tambah user
function create_user($post)
{
    global $koneksi;

    $nama = strip_tags($post['nama']); //htmlspecialchars() atau strip_tags() keamaan saat melakukan intup agar tidak terjadi hacking
    $username = strip_tags($post['username']);
    $email = strip_tags($post['email']);
    $password = strip_tags($post['password']);
    $level = strip_tags($post['level']);

    // enkripsi passrowd
    $password = password_hash($password, PASSWORD_DEFAULT);

    // query tambah data
    $query = "INSERT INTO user VALUES(null, '$nama', '$username', '$email', '$password', '$level')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi ubah user
function update_user($post)
{
    global $koneksi;

    $id_user = strip_tags($post['id_user']);
    $nama = strip_tags($post['nama']); //htmlspecialchars() atau strip_tags() keamaan saat melakukan intup agar tidak terjadi hacking
    $username = strip_tags($post['username']);
    $email = strip_tags($post['email']);
    $password = strip_tags($post['password']);
    $level = strip_tags($post['level']);

    // enkripsi passrowd
    $password = password_hash($password, PASSWORD_DEFAULT);

    // query ubah data
    $query = "UPDATE user SET nama = '$nama', username = '$username', email = '$email', password = '$password', level = '$level' WHERE id_user = $id_user";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi delete user
function delete_user($id_user)
{
    global $koneksi;

    // query hapus data user
    $query = "DELETE FROM user WHERE id_user = $id_user";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

?>