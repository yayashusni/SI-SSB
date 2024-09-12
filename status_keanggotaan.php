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
    <title>Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="assets/img/Icon Bar.png" type="image/x-icon" />

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


        <!-- content  -->
        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                    </div>
                    <div class="row">
                        <div class="col-lg-7" style="margin: 0 auto;">

                            <?php
                            include "conn.php";

                            $sql = mysqli_query($con, "SELECT * FROM anggota where id_user='$_SESSION[id_user]'");
                            $data = mysqli_fetch_array($sql);

                            if (empty($data)) {
                                echo '<div class="jumbotron text-center">
                               <h1 >Anda belum terdaftar</h1>
                               <hr class="my-2">
                               <p class="lead">
                                   <a class="btn btn-primary btn-block btn-md mt-4" href="anggota_tambah.php" role="button">Daftar disini</a>
                               </p>
                           </div>';
                            }  else { ?>
                                <div class="card text-center" style="margin: 0 auto;">
                                    <div class="avatar avatar-xxl " style="margin: 0 auto;">
                                        <img src="assets/img/Logo.png" alt="foto" class="avatar-img rounded">
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><?= $data['nama_lengkap'] ?></h3>
                                        <p class="card-text"><?= $data['id_user'] ?></p>
                                        <h2 class="card-title" style="color: purple;"><b> Status Siswa <?= $data['status'] ?></b></h2>
                                    </div>
                                </div>
                            <?php  }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end content  -->

    </div>
    <!-- script  -->
    <?= include "layout/script.php"; ?>

</body>

</html>