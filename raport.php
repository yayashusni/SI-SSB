<?php
include "conn.php";
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Raport</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="assets/img/Logo.png" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['assets/css/fonts.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/azzara.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
</head>

<body>
    <div class="wrapper">

        <!-- header -->
        <?= include "layout/header.php"; ?>
        <!-- sidebar -->
        <?= include "layout/sidebar.php"; ?>


        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Data Raport Triwulan</h4>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                <?php if($_SESSION['level']!=2){?>
                                    <a class="btn btn-primary btn-sm btn-flat" href="raport_tambah.php">Buat Raport</a>
                                    <?php }?>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">

                                    <?php if($_SESSION['level']==2){?>
                                        <table id="raport" class="display table-inverse table table-hover">
                                            <thead calss="thead-inverse">
                                                <tr>
                                                    <th>User ID</th>
                                                    <th>Nama</th>
                                                    <th>NISN</th>
                                                    <th>Lainnya</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include "conn.php";
                                                $sql = mysqli_query($con, "SELECT * FROM raport where id_user='$_SESSION[id_user]'");
                                                while ($data = mysqli_fetch_array($sql)) {
                                                ?>
                                                    <tr>
                                                        <td><?= $data['id_user'] ?></td>
                                                        <td><?= $data['nama'] ?></td>
                                                        <td><?= $data['nisn'] ?></td>
                                                        <td><a href="raport_detail.php?id=<?= $data['id'] ?>"> Lihat detail </a></td>
                                                        <td>
                                                            <a href="raport_print.php?id=<?= $data['id'] ?>" target="_blank" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top" title="Cetak"><i class="fas fa-print" ></i></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                   <?php }else{?>
                                    <table id="raport" class="display table-inverse table table-hover">
                                            <thead calss="thead-inverse">
                                                <tr>
                                                    <th>User ID</th>
                                                    <th>Nama</th>
                                                    <th>NISN</th>
                                                    <th>Lainnya</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                <th>User ID</th>
                                                    <th>Nama</th>
                                                    <th>NISN</th>
                                                    <th>Lainnya</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                include "conn.php";
                                                $sql = mysqli_query($con, "SELECT * FROM raport ORDER BY nama asc");
                                                while ($data = mysqli_fetch_array($sql)) {
                                                ?>
                                                    <tr>
                                                        <td><?= $data['id_user'] ?></td>
                                                        <td><?= $data['nama'] ?></td>
                                                        <td><?= $data['nisn'] ?></td>
                                                        <td><a href="raport_detail.php?id=<?= $data['id'] ?>"> Lihat detail </a></td>
                                                        <td>
                                                            <a href="raport_print.php?id=<?= $data['id'] ?>" target="_blank" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top" title="Cetak"><i class="fas fa-print" ></i></a>
                                                            <a href="raport_hapus.php?id=<?= $data['id'] ?>" onClick="return confirm('Yakin hapus data?')" class="btn btn-xs btn-danger " data-toggle="tooltip" data-placement="top" title="Hapus data"><i class="fas fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>

                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end content  -->

        </div>
        <!-- script  -->
        <?= include "layout/script.php"; ?>
        <script>
        // data table 
        $(document).ready(function() {
            $('#raport').DataTable({});
        });
    </script>
</body>

</html>