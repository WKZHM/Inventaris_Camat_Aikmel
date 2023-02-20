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

$title = 'ubah ruangan';

include 'layout/header.php';

// Cek apakah tombol ubah ditekan berhasil atau tidak
if (isset($_POST['ubah'])) {
    if (update_ruang($_POST) > 0) {
        echo "<script>
        alert('Data Ruangan Berhasil diubah😁');
        document.location.href = 'ruangan.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Ruangan Gagal diubah😥');
        document.location.href = 'ruangan.php';
        </script>";
    }
}
//AMBIL ID_ruang DARI URL
$id_ruang = (int)$_GET['id_ruang'];

// query ambil data ruang
$ruang = select("SELECT * FROM ruang WHERE id_ruang = $id_ruang")[0];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">FORM UBAH DATA RUANGAN</h1>
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
                            <h3 class="card-title">Ubah Data Ruangan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="post">
                            <input type="hidden" name="id_ruang" value="<?= $ruang['id_ruang']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <select name="lokasi" id="lokasi" class="form-control" required>
                                        <?php $lokasi = $ruang['lokasi']; ?>
                                        <option value="A1" <?= $lokasi == 'A1' ? 'selected' : null; ?>>A1</option>
                                        <option value="B1" <?= $lokasi == 'B1' ? 'selected' : null; ?>>B1</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="ruang">Ruangan</label>
                                    <input type="text" class="form-control" id="ruang" name="ruang" placeholder="Masukkan Ruangan!!" required value="<?= $ruang['ruang']; ?>">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Ubah</button>
                                <a href="ruangan.php" name="reset" class="btn btn-warning mr-1" style="float: right;">Batal</a>
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

<!-- Main Footer -->
<?php
include 'layout/footer.php';
?>