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

$title = 'inventaris camat aikmel';

include 'layout/header.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><b><i class="nav-icon fas fa-home"></i> Sistem Infromasi Inventaris Kantor Camat AikMel</b></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                <?php
                                $query_barang = "SELECT SUM(jumlah) AS sum FROM barang";
                                $jumlah_barang = mysqli_query($koneksi, $query_barang);

                                $hasi_jmlh = mysqli_fetch_assoc($jumlah_barang);
                                echo $hasi_jmlh['sum'];
                                ?>
                            </h3>

                            <p>Barang</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cube"></i>
                        </div>
                        <a href="barang.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                                <?php
                                $query_ruang = "SELECT * FROM ruang";
                                $jumlah_ruang = mysqli_query($koneksi, $query_ruang);

                                $hasi_jmlh = mysqli_num_rows($jumlah_ruang);
                                echo $hasi_jmlh
                                ?>
                            </h3>

                            <p>Ruangan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-home"></i>
                        </div>
                        <a href="ruangan.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>
                                <?php
                                $query_pegawai = "SELECT * FROM pegawai";
                                $jumlah_pegawai = mysqli_query($koneksi, $query_pegawai);

                                $hasi_jmlh = mysqli_num_rows($jumlah_pegawai);
                                echo $hasi_jmlh
                                ?>
                            </h3>

                            <p>Pegawai</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="pegawai.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>
                                <?php
                                $query_user = "SELECT * FROM user";
                                $jumlah_user = mysqli_query($koneksi, $query_user);

                                $hasi_jmlh = mysqli_num_rows($jumlah_user);
                                echo $hasi_jmlh
                                ?>
                            </h3>

                            <p>Users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="user.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- profile Camat -->
            <!-- Main row -->
            <div class="row">
                <div class="col-md-6">
                    <!-- Box Comment -->
                    <div class="card card-widget">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <img class="img-fluid pad mb-4" src="dist/img/camat.jpeg" alt="WKZHM">

                            <p align="justify">instansi pemerintahan, Kantor Camat Aikmel yang berlokasi di Jl. Koperasi No.1,Aikmel, Kabupaten Lombok Timur, Nusa Tenggara Barat. 83653 Indonesia. Instansi pemerintahan ini merupakan salah satu line office dari pemerintah Daerah yang berhdadapan langsung dengan masyarakat dan bertugas untuk membina desa/kelurahan. Kecamatan merupakan salah satu organisasi yang hidup dalam melayani kehidupan masyarakat. Adapaun profil dari Kantor Camat Aikmel adalah sebagai berikut:
                                Desa Aikmel merupakan salah satu Desa dengan kekayaan alam budaya, dan kewirausahaan yang kuat, dan Kantor Camat Aikmel juga merupakan salah satu kecamatan tertua yang ada di Kabupaten Lombok Timur yang dulunya terdiri dari 24 Desa, namun seiring perkembangan zaman dan adanya pemekaran wilayah, dusun yang dulunya terdiri dari 24 Desa menjadi 14 Desa.
                            </p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <!-- Box Comment -->
                    <div class="card card-widget">
                        <div class="card-body">

                            <!--container-fluid -->
                            <div class="card mb-2">
                                <img class="card-img-top" src="dist/img/camat2.jpeg" alt="WKZHM">
                                <div class="card-img-overlay d-flex flex-column justify-content-center">
                                    <h5 class="card-title text-white mt-5 pt-2"><b>Apel & Do'a Pagi</b></h5>
                                    <p class="card-text pb-2 pt-1 text-white">
                                        Kegiatan dimulai dari Hari: <br>
                                        <i>Senin - Kamis & khsusu Jum'at para pegawai melakukan kegiatan jasmani semperti Senam.</i>
                                    </p>
                                </div>
                            </div>

                            <div class="card mb-2 bg-gradient-dark">
                                <img class="card-img-top" src="dist/img/camat3.jpeg" alt="WKZHM">
                                <div class="card-img-overlay d-flex flex-column justify-content-end">
                                    <h5 class="card-title text-primary text-white"><b>Mahasiswa Magang</b></h5>
                                    <p class="card-text text-white pb-2 pt-1">Mahasiswa Dari STMIK SZ NW Anjani Melakukan Kegiatan Magang atau Perkatik Kerja Lapangan dengan membantu kegiatan-kegiatan administrasi kantor dan melukan Problem Solving</p>
                                </div>
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
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