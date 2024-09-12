<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    header('location:login.php');
}

include "conn.php";



//  tambah ijin
if (isset($_POST['ijin'])) {

    $cek_ijin = mysqli_query($con, " SELECT siswa FROM kehadiran WHERE date=curdate() && siswa='$_POST[siswa]'");
$r = mysqli_fetch_array($cek_ijin);

    if ($r >= 1) {
        echo "<script>alert('Maaf , $_POST[siswa] sudah melakukan absen hari ini');
        window.location='kehadiran_tambah.php';
     </script>";
    } else {
        $query = mysqli_query($con, "INSERT INTO kehadiran (siswa, ijin,  date) VALUES('$_POST[siswa]','1',curdate())");
        if ($query) {
            echo "<script type='text/JavaScript'>
                    alert('Berhasil ditambahkan');history.go(-1)
                    </script>";
        } else {
            echo "gagal";
        }
    }
}

if (isset($_POST['sakit'])) {
    $cek_sakit = mysqli_query($con, " SELECT siswa FROM kehadiran WHERE date=curdate() && siswa='$_POST[siswa]'");
    $d = mysqli_fetch_array($cek_sakit);
    if ($d >= 1) {
        echo "<script>alert('Maaf , $_POST[siswa] sudah melakukan absen hari ini');
        window.location='kehadiran_tambah.php';
     </script>";
    } else {
        $query = mysqli_query($con, "INSERT INTO kehadiran (siswa, sakit,  date) VALUES('$_POST[siswa]','1',curdate())");
        if ($query) {
            echo "<script type='text/JavaScript'>
                alert('Berhasil ditambahkan');history.go(-1)
                </script>";
        } else {
            echo "gagal";
        }
    }
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
                    <div class="card">
                        <div class="card-body text-center text-white">
                            <a name="" id="" class="btn btn-primary btn-lg mr-1" data-toggle="modal" data-target="#ijin" role="button">Ijin</a>
                            <a name="" id="" class="btn btn-secondary btn-lg ml-1" data-toggle="modal" data-target="#sakit" role="button"" role=" button">Sakit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end content  -->



        <!-- Modal ijin-->
        <div class="modal fade" id="ijin" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Nama Siswa</label>
                                <select class="form-control form-control-sm" name="siswa" id="" required>
                                    <option></option>
                                    <?php
                                    $get_siswa = mysqli_query($con, "SELECT * FROM anggota ORDER BY nama_lengkap ASC");
                                    while ($a = mysqli_fetch_array($get_siswa)) { ?>
                                        <option value="<?= $a['nama_lengkap'] ?>"><?= $a['nama_lengkap'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="ijin" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal sakit-->
        <div class="modal fade" id="sakit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Nama Siswa</label>
                                <select class="form-control form-control-sm" name="siswa" id="" required>
                                    <option></option>
                                    <?php
                                    $get_siswa = mysqli_query($con, "SELECT * FROM anggota ORDER BY nama_lengkap ASC");
                                    while ($a = mysqli_fetch_array($get_siswa)) { ?>
                                        <option value="<?= $a['nama_lengkap'] ?>"><?= $a['nama_lengkap'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="sakit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- script  -->
    <?= include "layout/script.php"; ?>
</body>

</html>