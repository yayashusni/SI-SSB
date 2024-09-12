<?php
include "conn.php";
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    header('location:login.php');
}


if (isset($_POST['updatePassword'])) {
    if ($_POST['password'] != $_POST['confirm_password']) {
        echo "<script>alert('Password yang Anda Masukan Tidak Sama');history.go(-1)</script>";
    } else {

        $password = md5($_POST['password']);
        $query = mysqli_query($con, "UPDATE user SET password='$password' WHERE id_user='$_SESSION[id_user]'");

        if ($query) {
            echo "<script type='text/JavaScript'>
            alert('Data berhasil diupdate');
            document.location='profil.php';
            </script>";
        }
    }
}

if (isset($_POST['updateUsername'])) {
    $query = mysqli_query($con, "UPDATE user SET username='$_POST[username]' WHERE id_user='$_SESSION[id_user]'");

        if ($query) {
            echo "<script type='text/JavaScript'>
            alert('Data berhasil diupdate');
            document.location='profil.php';
            </script>";
        }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pengaturan Akun</title>
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


                            <div class="card" style="margin: 0 auto;">
                                <div class="card-header">
                                    <h1>Pengaturan Akun</h1>
                                </div>
                                <div class="card-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#usr">Username</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#pwd">Password</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane container active" id="usr">
                                            <form action="" method="post" class="mt-3">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" value="<?= $_SESSION['username'] ?>" name="username" id="" class="form-control form-control-sm" placeholder="" aria-describedby="helpId">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="updateUsername" class="btn btn-sm btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane container fade" id="pwd">
                                        <form action="" method="post" class="mt-3">
                                        <div class="form-group">
                                          <label for="username">Password</label>
                                          <input type="password" name="password" id="" class="form-control form-control-sm" placeholder="" aria-describedby="helpId" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="username">Confirm Password</label>
                                          <input type="password" name="confirm_password" id="" class="form-control form-control-sm" placeholder="" aria-describedby="helpId" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="updatePassword" class="btn btn-sm btn-primary">Update</button>
                                        </div>
                                    </form>
                                        </div>

                                    </div>
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

</body>

</html>