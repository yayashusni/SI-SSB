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
    <title>Kehadiran</title>
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
                        <h4 class="page-title">Kehadiran</h4>
                    </div>

                   <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <?php if ($_SESSION['level'] == 4) { ?>
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#laporan_kehadiran">
                                                Laporan
                                            </button>
                                        <?php } ?>
                                        <?php if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) { ?>
                                            <a class="btn btn-primary btn-sm btn-flat" href="kehadiran_tambah.php">Tambah </a>
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#laporan_kehadiran">
                                                Laporan
                                            </button>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#rekap_absen">
                                                Rekap
                                            </button>
                                            <a href="kehadiran.php" class="btn btn-sm  btn-secondary">Refresh</a>
                                        <?php } ?>


                                        <!-- Modal rekap-->
                                        <div class="modal fade" id="rekap_absen" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Rekap Absen</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="post">
                                                            <div class="form-group">
                                                                <label for="">Dari</label>
                                                                <input type="date" name="date1" id="" class="form-control" required placeholder="" aria-describedby="helpId">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Sampai</label>
                                                                <input type="date" name="date2" id="" class="form-control" required placeholder="" aria-describedby="helpId">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="rekap" class="btn  btn-sm btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- modal kehadiran  -->
                                        <div class="modal fade" id="laporan_kehadiran" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Laporan Kehadiran</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="kehadiran_laporan.php" method="post">
                                                            <div class="form-group">
                                                                <label for="">Dari</label>
                                                                <input type="date" name="date1" id="" class="form-control" required placeholder="" aria-describedby="helpId">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Sampai</label>
                                                                <input type="date" name="date2" id="" class="form-control" required placeholder="" aria-describedby="helpId">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="rekap" class="btn  btn-sm btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mt-1" id="kehadiran">

                                                <?php
                                                if (isset($_POST['rekap'])) { ?>

                                                    <thead class="thead-inverse">
                                                        <tr>
                                                            <th>Nama Siswa</th>
                                                            <th>hadir</th>
                                                            <th>sakit</th>
                                                            <th>ijin</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                        include "conn.php";
                                                        $count = mysqli_query($con, "SELECT siswa,COUNT(*) AS total ,SUM(case when hadir = '1' then 1 else null end) AS hadir,SUM(case when sakit = '1' then 1 else null end) AS sakit ,SUM(case when ijin = '1' then 1 else null end)  AS ijin FROM kehadiran  WHERE date BETWEEN '$_POST[date1]' AND '$_POST[date2]' Group by siswa");
                                                        while ($data = mysqli_fetch_array($count)) { ?>
                                                            <tr>
                                                                <td scope="row"><?= $data['siswa']; ?></td>
                                                                <td scope="row"><?= $data['hadir']; ?></td>
                                                                <td scope="row"><?= $data['ijin']; ?></td>
                                                                <td scope="row"><?= $data['sakit']; ?></td>
                                                            </tr>
                                                        <?php }
                                                    } else { ?>

                                                        <thead class="thead-inverse">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>Tanggal</th>
                                                                <th>Hadir</th>
                                                                <th>Sakit</th>
                                                                <th>Ijin</th>
                                                            </tr>
                                                        </thead>
                                                    <tbody>
                                                        <?php
                                                        include "conn.php";

                                                        $query = mysqli_query($con, "SELECT * FROM kehadiran ORDER BY date desc");
                                                        $no = 1;
                                                        while ($data = mysqli_fetch_array($query)) { ?>
                                                            <tr>
                                                                <td scope="row"><?= $no++ ?></td>
                                                                <td scope="row"><?= $data['siswa'] ?></td>
                                                                <td scope="row"><?= date('d-F-Y', strtotime($data['date']))  ?></td>
                                                                <td scope="row"><?= ($data['hadir'] == 1) ? '<i class="fas fa-check text-success"></i>' : '' ?></td>
                                                                <td scope="row"><?= ($data['sakit'] == 1) ? '<i class="fas fa-check text-success"></i>' : '' ?></td>
                                                                <td scope="row"><?= ($data['ijin'] == 1) ? '<i class="fas fa-check text-success"></i>' : '' ?></td>

                                                            </tr>
                                                        <?php }
                                                        ?>
                                                    </tbody>
                                                <?php } ?>
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
            $('#kehadiran').DataTable({});
        });
    </script>
</body>

</html>