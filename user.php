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

$title = 'data users';

include 'layout/header.php';

$data_user = select("SELECT * FROM user ORDER BY id_user DESC");

// jika tombol tambah ditekan jalankan scripts berikut
if (isset($_POST['tambah'])) {
    if (create_user($_POST) > 0) {
        echo "<script>
        alert('Data User Berhasil ditambahkan😁');
        document.location.href = 'user.php';
        </script>";
    } else {
        echo "<script>
        alert('Data User Gagal ditambahkan😥');
        document.location.href = 'user.php';
        </script>";
    }
}

// jika tombol ubah ditekan jalankan scripts berikut
if (isset($_POST['ubah'])) {
    if (update_user($_POST) > 0) {
        echo "<script>
        alert('Data User Berhasil diubah😁');
        document.location.href = 'user.php';
        </script>";
    } else {
        echo "<script>
        alert('Data User Gagal diubah😥');
        document.location.href = 'user.php';
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
                    <h1 class="m-0"><b>DATA USERS KANTOR CAMAT AIKMEL</b></h1>
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
                            <h3 class="card-title"><b>DATA USER</b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- tombol tambah -->
                            <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#userTambah"><i class="nav-icon fas fa-plus"></i> Tambah</button>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data_user as $user) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $user['nama']; ?></td>
                                            <td><?= $user['username']; ?></td>
                                            <td><?= $user['email']; ?></td>
                                            <td>Password Ter-enkripsi</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#userUbah<?= $user['id_user']; ?>"><i class="nav-icon fas fa-pen"></i> Ubah</button> |
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#userHapus<?= $user['id_user']; ?>"><i class="nav-icon fas fa-trash"></i> Hapus</button>
                                            </td>
                                        </tr>
                                    <?php endforeach;  ?>
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

<!-- Modal Tambah-->
<div class="modal fade" id="userTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- username digunakan untuk login sedangkan nama merupakan nama lengkap -->
                <form action="" method="post">
                    <div class="mb3">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>

                    <div class="mb3">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>

                    <div class="mb3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required minlength="6">
                    </div>

                    <div class="mb3">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control" required>
                            <option value="">-- Pilih Level --</option>
                            <option value="1">Admin</option>
                            <option value="2">Operator</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>

<!-- Modal Hapus -->
<?php foreach ($data_user as $user) : ?>
    <div class="modal fade" id="userHapus<?= $user['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Yakin Ingin Menghapus Data User : <?= $user['nama']; ?>😰</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">batal</button>
                    <a href="hapus_user.php?id_user=<?= $user['id_user']; ?>" class="btn btn-danger">Hapus</a>
                </div>

            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Ubah-->
<?php foreach ($data_user as $user) : ?>
    <div class="modal fade" id="userUbah<?= $user['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- username digunakan untuk login sedangkan nama merupakan nama lengkap -->
                    <form action="" method="post">
                        <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">

                        <div class="mb3">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required value="<?= $user['nama']; ?>">
                        </div>

                        <div class="mb3">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" required value="<?= $user['username']; ?>">
                        </div>

                        <div class="mb3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required value="<?= $user['email']; ?>">
                        </div>

                        <div class="mb3">
                            <label for="password">Password <small>(Masukkan Password Baru Atau Lama)</small></label>
                            <input type="password" name="password" id="password" class="form-control" required minlength="6">
                        </div>

                        <div class="mb3">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control" required>
                                <?php $level = $user['level']; ?>
                                <!-- <?= $user == '' ? 'select' : null ?> jika value dari akun sama dengan terpilih otomatis maka itu admin -->
                                <option value="1" <?= $level == '1' ? 'selected' : null ?>>Admin</option>
                                <option value="2" <?= $level == '2' ? 'selected' : null ?>>Operator</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                            <button type="submit" name="ubah" class="btn btn-success">Ubah</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Main Footer -->
<?php
include 'layout/footer.php';
?>