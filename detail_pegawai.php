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

$title = 'detail pegawai';

include 'layout/header.php';

// mengambil id_pegawai dari url atau yg dipilih
$id_pegawai = (int)$_GET['id_pegawai'];

// menampilkan data pegawai
$pegawai = select("SELECT * FROM pegawai WHERE id_pegawai = $id_pegawai")[0];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><b>DETAIL DATA PEGAWAI KANTOR CAMAT AIKMEL</b></h1>
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
                            <h3 class="card-title"><b>Detail <?= $pegawai['nama_pegawai']; ?></b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td>Nama</td>
                                    <td>: <?= $pegawai['nama_pegawai']; ?></td>
                                </tr>

                                <tr>
                                    <td>NIP</td>
                                    <td>: <?= $pegawai['nip']; ?></td>
                                </tr>

                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>: <?= $pegawai['jk']; ?></td>
                                </tr>

                                <tr>
                                    <td>Jabatan</td>
                                    <td>: <?= $pegawai['jabatan']; ?></td>
                                </tr>

                                <tr>
                                    <td>No Telepon/WhatsApp</td>
                                    <td>: <?= $pegawai['telepon']; ?></td>
                                </tr>

                                <tr>
                                    <td>Photo</td>
                                    <td>
                                        <a href="dist/img/<?= $pegawai['foto']; ?>">
                                            <img src="dist/img/<?= $pegawai['foto']; ?>" alt="WKZHM" width="20%">
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <a href="pegawai.php" name="reset" class="btn btn-dark mt-2" style="float: left;">Kembali</a>
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