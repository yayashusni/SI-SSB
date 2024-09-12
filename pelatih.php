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
    <title>pelatih</title>
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
                        <h4 class="page-title">Daftar pelatih</h4>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                         <?php if ($_SESSION['level']!=4) {?>
                                     <a class="btn btn-primary btn-sm btn-flat" href="pelatih_tambah.php">Tambah</a>
                                     <?php }?>
                                     <a class="btn btn-warning btn-sm btn-flat" href="pelatih_laporan.php">Laporan</a>
                                    </div>
                              
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table" class="display table-inverse table table-hover">
                                            <thead calss="thead-inverse">
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>Tempat Lahir</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Kategori Pelatih</th>
                                                    <th>Foto</th>
                                                    <?php if ($_SESSION['level']!=4) {?>

<th>Aksi</th>
<?php } ?>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <?php
                                                include "conn.php";
                                                $sql = mysqli_query($con, "SELECT * FROM pelatih ORDER BY nama asc");
                                                while ($data = mysqli_fetch_array($sql)) {
                                                ?>
                                                    <tr>
                                                        <td><?= $data['nama'] ?></td>
                                                        <td><?= $data['alamat'] ?></td>
                                                        <td><?= $data['tempat_lahir'] ?></td>
                                                        <td><?= $data['tanggal_lahir'] ?></td>
                                                        <td><?= $data['jk'] ?></td>
                                                        <td><?= $data['kategori'] ?></td>
                                                        <td>
                                                        <div class="avatar avatar-lg">
																<img src="img/foto/<?= $data['foto'] ?>" class="avatar-img rounded" alt="">
															</div>
                                                        </td>
                                <?php if ($_SESSION['level']!=4) {?>

                                                        <td>
                                                            <a href="pelatih_edit.php?id=<?= $data['id'] ?>" class="btn btn-xs btn-primary " data-toggle="tooltip" data-placement="left" title="Edit data"><i class="fas fa-pencil-alt"></i></a>
                                                            <a href="pelatih_hapus.php?id=<?= $data['id'] ?>" onClick="return confirm('Yakin hapus data?')" class="btn btn-xs btn-danger " data-toggle="tooltip" data-placement="top" title="Hapus data"><i class="fas fa-trash"></i></a>
                                                        </td>
                                                        <?php } ?>
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
            $('#table').DataTable({});
        });
    </script>
</body>

</html>