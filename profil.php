<?php
include "conn.php";
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    header('location:login.php');
}


if (isset($_POST['submit'])) {


    $direktori = "img/foto/";
    $target_file = $direktori . basename($_FILES["foto"]["name"]);
    $nama_file = basename($_FILES["foto"]["name"]);
    $ukuran_file = $_FILES["foto"]["size"];
    $jenis_file = $_FILES["foto"]["type"];
    $upload_berhasil = 1;
    $tipe_file = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Cek jika file sudah ada 
    if (file_exists($target_file)) {
        echo "Maaf file sudah ada";
        $upload_berhasil = 0;
    }
    // Cek Ukuran File, ukuran dalam byte 
    if ($ukuran_file > 5000000) {
        echo "Maaf, Ukuran file terlalu besar.";
        $upload_berhasil = 0;
    }
    // Mengizinkan file dengan format tertentu 
    if (
        $tipe_file != "docx" && $tipe_file != "pdf" && $tipe_file != "jpg" && $tipe_file != "png"
        && $tipe_file != "xlsx"
    ) {
        echo "Maaf file tidak diizinkan";
        $upload_berhasil = 0;
    }
    // Cek apakah $upload_berhasil nilainya 0 dan menampilkan pesan kesalahan 
    if ($upload_berhasil == 0) {
        echo "Maaf file tidak bisa diupload";
        // Jika $upload_berhasil = 1 maka coba upload file 
    } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            $update = mysqli_query($con, "UPDATE user set foto='$nama_file' WHERE id_user='$_SESSION[id_user]'");
            $update = mysqli_query($con, "UPDATE anggota set foto='$nama_file' WHERE id_user='$_SESSION[id_user]'");
            if ($update) {
                echo "<script type='text/JavaScript'>
    alert('Update Berhasil');
    document.location='profil.php';
</script>";
            } else {
                echo "Maaf, Gagal Update";
            }
        } else {
            echo "Maaf, Upload file gagal";
        }
    }
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


                            <div class="card text-center" style="margin: 0 auto;">
                                <div class="card-header">
                                    <h1>Profil</h1>
                                </div>
                                <div class="card-body p-5">

                                    <div class="avatar avatar-xxl " style="margin: 0 auto;">
                                        <a href="img/foto/<?= $foto['foto'] ?>" target="_blank" rel="noopener noreferrer">
                                            <img src="img/foto/<?= $foto['foto'] ?>" rel="noopener noreferrer" alt="foto" class="avatar-img rounded">
                                        </a>
                                    </div>
                                    <div>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-link btn-sm" data-toggle="modal" data-target="#ubahFoto">
                                            Ubah foto
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="ubahFoto" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="">Foto</label>
                                                                <input type="file" class="form-control-file" name="foto" id="" required placeholder="" aria-describedby="fileHelpId">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="submit" class="btn btn-sm btn-secondary">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <table class=" table text-left">
                                        <tr>
                                            <td colspan="2" ><h2 class="card-title"> <?= $_SESSION['username'] ?></h2></td>
                                        </tr>
                                        <tr>
                                            <td>Sebagai </td>
                                            <td> <?php
                                                    if ($_SESSION['level'] == 2) {
                                                        echo "Siswa";
                                                    } else if ($_SESSION['level'] == 1) {
                                                        echo "Pelatih";
                                                    } else {
                                                        echo "Administrator";
                                                    }
                                                    ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?= $_SESSION['email'] ?></td>
                                        </tr>
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
    <!-- script  -->
    <?= include "layout/script.php"; ?>

</body>

</html>