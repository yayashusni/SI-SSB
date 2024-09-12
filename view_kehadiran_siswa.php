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
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mt-1" id="kehadiran">
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
                                                $query = mysqli_query($con, "SELECT * FROM kehadiran where");
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
            $('#kehadiran').DataTable({});
        });
    </script>
</body>

</html>