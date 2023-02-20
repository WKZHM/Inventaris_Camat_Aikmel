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

$title = 'ubah data barang';

include 'layout/header.php';

// Mengambil id_barang dari URL/database yang ingin diubah
$id_barang = (int)$_GET['id_barang'];

$barang = select("SELECT * FROM barang WHERE id_barang = $id_barang")[0];

// Cek apakah tombol tambah ditekan berhasil atau tidak
if (isset($_POST['ubah'])) {
    if (update_barang($_POST) > 0) {
        echo "<script>
        alert('Data Barang Berhasil diubah😁');
        document.location.href = 'barang.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Barang Gagal diubah😥');
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
                    <h1 class="m-0">FORM UBAH DATA BARANG</h1>
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
                            <h3 class="card-title">Tambah Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="post">
                            <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $barang['nama_barang']; ?>" placeholder="Masukkan Nama Barang!!" required>
                                </div>

                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $barang['kategori']; ?>" placeholder="Masukkan Kategori Barang!!" required>
                                </div>

                                <div class="form-group">
                                    <label for="ruang">Ruangan</label>
                                    <input type="text" class="form-control" id="ruang" name="ruang" value="<?= $barang['ruang']; ?>" placeholder="Masukkan Ruangan Barang!!" required>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $barang['jumlah']; ?>" placeholder="Masukkan Jumlah Barang!!" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Ubah</button>
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