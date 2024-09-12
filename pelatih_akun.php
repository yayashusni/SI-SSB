<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Akun Pelatih</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />

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


</head>

<body>
    <div class="wrapper">

        <!-- header -->
        <?= include "layout/header.php"; ?>
        <!-- sidebar -->
        <?= include "layout/sidebar.php"; ?>


        <!-- content  -->
        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Daftar Akun pelatih</h4>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <a class="btn btn-primary btn-sm btn-flat" href="pelatih_tambah_akun.php">Tambah</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="anggota" class="display table-inverse table table-hover">
                                            <thead calss="thead-inverse">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>E-Mail</th>
                                                    <th>User ID</th>
                                                    <th>Foto</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                <th>No</th>
                                                    <th>Nama</th>
                                                    <th>E-Mail</th>
                                                    <th>User ID</th>
                                                    <th>Foto</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                include "conn.php";
                                                $no=0;
                                                $sql = mysqli_query($con, "SELECT * FROM user WHERE level='1' ");
                                                while ($data = mysqli_fetch_array($sql)) {
                                                    $no=1;
                                                ?>

                                                    <tr>
                                                        <td><?= $no;?></td>
                                                        <td><?= $data['username'] ?></td>
                                                        <td><?= $data['email'] ?></td>
                                                        <td><?= $data['id_user'] ?></td>
                                                        <td>
                                                            <div class="avatar avatar-sm">
																<img src="img/foto/<?= $data['foto'] ?>" class="avatar-img rounded" alt="">
															</div>
                                                        </td>
                                                        <td>
                                                            <a href="pelatih_hapus_akun.php?id=<?= $data['id'] ?>" onClick="return confirm('Yakin hapus data?')" class="btn btn-xs btn-danger " data-toggle="tooltip" data-placement="top" title="Hapus data"><i class="fas fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end content  -->



        </div>
    </div>


    <!-- script  -->
    <?= include "layout/script.php"; ?>
    <script>
        // data table 
        $(document).ready(function() {
            $('#anggota').DataTable({});
        });
    </script>
</body>

</html>