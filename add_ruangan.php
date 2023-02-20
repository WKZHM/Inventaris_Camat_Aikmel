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

$title = 'tambah ruangan';

include 'layout/header.php';

// Cek apakah tombol tambah ditekan berhasil atau tidak
if (isset($_POST['tambah'])) {
    if (create_ruang($_POST) > 0) {
        echo "<script>
        alert('Data Ruangan Berhasil ditambahkan😁');
        document.location.href = 'ruangan.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Ruangan Gagal ditambahkan😥');
        document.location.href = 'ruangan.php';
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
                    <h1 class="m-0">FORM TAMBAH DATA RUANGAN</h1>
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
                            <h3 class="card-title">Tambah Data Ruangan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <select name="lokasi" id="lokasi" class="form-control" required>
                                        <option value="">--Pilih Lokasi Ruangan--</option>
                                        <option value="A1">A1</option>
                                        <option value="B1">B1</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="ruang">Ruangan</label>
                                    <input type="text" class="form-control" id="ruang" name="ruang" placeholder="Masukkan Ruangan!!" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="tambah" class="btn btn-primary" style="float: right;">Tambah</button>
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