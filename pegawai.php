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

$title = 'data pegawai';

include 'layout/header.php';

// menampilkan data pegawai
$data_pegawai = select("SELECT * FROM pegawai ORDER BY id_pegawai DESC");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><b>DATA PEGAWAI KANTOR CAMAT AIKMEL</b></h1>
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
                            <h3 class="card-title"><b>DATA PEGAWAI</b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- tombol tambah -->
                            <a href="add_pegawai.php" class="btn btn-primary mb-1"><i class="nav-icon fas fa-plus"></i> Tambah</a>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pegawai</th>
                                        <th>NIP</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data_pegawai as $pegawai) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $pegawai['nama_pegawai']; ?></td>
                                            <td><?= $pegawai['nip']; ?></td>
                                            <td><?= $pegawai['jk']; ?></td>
                                            <td><?= $pegawai['jabatan']; ?></td>
                                            <td class="text-center">
                                                <!-- detail -->
                                                <a href="detail_pegawai.php?id_pegawai=<?= $pegawai['id_pegawai']; ?>" class="btn btn-info btn-sm"><i class="nav-icon fas fa-eye"></i> Detail</a> |
                                                <!-- ubah -->
                                                <a href="ubah_pegawai.php?id_pegawai=<?= $pegawai['id_pegawai']; ?>" class="btn btn-secondary btn-sm"><i class="nav-icon fas fa-pen"></i> Ubah</a> |
                                                <!-- hapus -->
                                                <a href="hapus_pegawai.php?id_pegawai=<?= $pegawai['id_pegawai']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Dihapus!!🤨')"><i class="nav-icon fas fa-trash"></i> Hapus</a>
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