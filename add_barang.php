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

$title = 'tambah barang';

include 'layout/header.php';

// Cek apakah tombol tambah ditekan berhasil atau tidak
if (isset($_POST['tambah'])) {
    if (create_barang($_POST) > 0) {
        echo "<script>
        alert('Data Barang Berhasil ditambahkan😁');
        document.location.href = 'barang.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Barang Gagal ditambahkan😥');
        document.location.href = 'barang.php';
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
                    <h1 class="m-0">FORM TAMBAH DATA BARANG</h1>
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
                            <h3 class="card-title">Tambah Data Barang</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang!!" required>
                                </div>

                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan Kategori Barang!!" required>
                                </div>

                                <div class="form-group">
                                    <label for="ruang">Ruangan</label>
                                    <input type="text" class="form-control" id="ruang" name="ruang" placeholder="Masukkan Ruangan Barang!!" required>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah Barang!!" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="tambah" class="btn btn-primary" style="float: right;">Tambah</button>
                                <a href="barang.php" name="reset" class="btn btn-warning mr-1" style="float: right;">Batal</a>
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