<?php
// untuk masuk kehalaman setelah login
session_start();

// membatasi halaman sebelum login
if (!isset($_SESSION['login'])) {
    echo "<script>
    alert('Silahkan Login Terlebih Dahulu🙏');
    document.location.href = 'login.php';
    </script>";
    exit;
}

$title = 'tambah pegawai';

include 'layout/header.php';

// Cek apakah tombol tambah ditekan berhasil atau tidak
if (isset($_POST['tambah'])) {
    if (create_pegawai($_POST) > 0) {
        echo "<script>
        alert('Data Pegawai Berhasil ditambahkan😁');
        document.location.href = 'pegawai.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Pegawai Gagal ditambahkan😥');
        document.location.href = 'pegawai.php';
        </script>";
    }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">FORM TAMBAH DATA PEGAWAI</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Data Pegawai</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <!-- fungsi enctype="multipart/form-data" adalah jika formulir mewajibkan untuk mengunggah file, foto, pdf dll -->
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_pegawai">Nama Pegawai</label>
                                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Masukkan Nama Pegawai!!" required>
                                </div>

                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="number" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP!!" required>
                                </div>

                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select name="jk" id="jk" class="form-control" required>
                                        <option value="">--Pilih Jenis Kelamin--</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan!!" required>
                                </div>

                                <div class="form-group">
                                    <label for="telepon">No Telepon/WhatsApp</label>
                                    <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Masukkan No Telepon/WA!!" required>
                                </div>

                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto" placeholder="Masukkan foto!!" onchange="previewImg()">

                                    <img src="" alt="WKZHM" class="img-thumbnail img-preview mt-2" width="100px">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="tambah" class="btn btn-primary" style="float: right;">Tambah</button>
                                <a href="pegawai.php" name="reset" class="btn btn-warning mr-1" style="float: right;">Batal</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- scripts untuk preview tampilan foto yang dipilih saat diupload -->
<script>
    function previewImg() {
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>

<!-- Main Footer -->
<?php
include 'layout/footer.php';
?>