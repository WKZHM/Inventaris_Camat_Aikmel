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

$title = 'ubah pegawai';

include 'layout/header.php';

// Cek apakah tombol ubah ditekan berhasil atau tidak
if (isset($_POST['ubah'])) {
    if (update_pegawai($_POST) > 0) {
        echo "<script>
        alert('Data Pegawai Berhasil diubah😁');
        document.location.href = 'pegawai.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Pegawai Gagal diubah😥');
        document.location.href = 'pegawai.php';
        </script>";
    }
}

//AMBIL ID_PEGAWAI DARI URL
$id_pegawai = (int)$_GET['id_pegawai'];

// query ambil data pegawai
$pegawai = select("SELECT * FROM pegawai WHERE id_pegawai = $id_pegawai")[0];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">FORM UBAH DATA PEGAWAI</h1>
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
                            <h3 class="card-title">Ubah Pegawai</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <!-- fungsi enctype="multipart/form-data" adalah jika formulir mewajibkan untuk mengunggah file, foto, pdf dll -->
                        <form action="" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="id_pegawai" value="<?= $pegawai['id_pegawai']; ?>">
                            <input type="hidden" name="fotoLama" value="<?= $pegawai['foto']; ?>">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_pegawai">Nama Pegawai</label>
                                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Masukkan Nama Pegawai!!" required value="<?= $pegawai['nama_pegawai']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="number" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP!!" required value="<?= $pegawai['nip']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select name="jk" id="jk" class="form-control" required>
                                        <?php $jk = $pegawai['jk']; ?>
                                        <option value="Laki-Laki" <?= $jk == 'Laki-Laki' ? 'selected' : null; ?>>Laki-Laki</option>
                                        <option value="Perempuan" <?= $jk == 'Perempuan' ? 'selected' : null; ?>>Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan!!" required value="<?= $pegawai['jabatan']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="telepon">No Telepon/WhatsApp</label>
                                    <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Masukkan No Telepon/WA!!" required value="<?= $pegawai['telepon']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto" placeholder="Masukkan foto!!" onchange="previewImg()">
                                    <p class="mt-2">
                                        <small>Gambar Sebelumnya 👇👇</small>
                                    </p>
                                    <img src="dist/img/<?= $pegawai['foto']; ?>" alt="WKZHM" class="img-thumbnail img-preview mt-2" width="100px">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Ubah</button>
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