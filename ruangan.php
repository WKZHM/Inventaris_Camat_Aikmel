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

$title = 'data ruangan';

include 'layout/header.php';

// memanggil data ruangan dan mengurutkan dari data terbaru ke terlama
$data_ruangan = select('SELECT * FROM ruang ORDER BY id_ruang DESC');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><b>DATA RUANGAN KANTOR CAMAT AIKMEL</b></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><b>DATA RUANGAN</b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- tombol tambah -->
                            <a href="add_ruangan.php" class="btn btn-primary mb-1"><i class="nav-icon fas fa-plus"></i> Tambah</a>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Lokasi</th>
                                        <th>Nama Ruangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data_ruangan as $ruang) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $ruang['lokasi']; ?></td>
                                            <td>Ruang <?= $ruang['ruang']; ?></td>
                                            <td class="text-center">
                                                <!-- ubah -->
                                                <a href="ubah_ruangan.php?id_ruang=<?= $ruang['id_ruang']; ?>" class="btn btn-secondary btn-sm"><i class="nav-icon fas fa-pen"></i> Ubah</a> |
                                                <!-- hapus -->
                                                <a href="hapus_ruangan.php?id_ruang=<?= $ruang['id_ruang']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Dihapus!!🤨')"><i class="nav-icon fas fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->
<?php
include 'layout/footer.php';
?>