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

$title = 'data barang';

include 'layout/header.php';

// memanggil data barang dan mengurutkan dari data terbaru ke terlama
$data_barang = select('SELECT * FROM barang ORDER BY id_barang DESC');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><b>DATA BARANG KANTOR CAMAT AIKMEL</b></h1>
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
              <h3 class="card-title"><b>DATA BARANG</b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- tombol tambah -->
              <a href="add_barang.php" class="btn btn-primary mb-1"><i class="nav-icon fas fa-plus"></i> Tambah</a>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Ruangan</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($data_barang as $barang) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $barang['nama_barang']; ?></td>
                      <td><?= $barang['kategori']; ?></td>
                      <td>Ruang <?= $barang['ruang']; ?></td>
                      <td><?= $barang['jumlah']; ?></td>
                      <td><?= date('d/m/Y | H:i:s', strtotime($barang['tanggal'])); ?></td>
                      <td class="text-center">
                        <!-- ubah -->
                        <a href="ubah_barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-secondary btn-sm"><i class="nav-icon fas fa-pen"></i> Ubah</a> |
                        <!-- hapus -->
                        <a href="hapus_barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Dihapus!!🤨')"><i class="nav-icon fas fa-trash"></i> Hapus</a>
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