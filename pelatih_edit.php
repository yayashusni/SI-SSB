<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    header('location:login.php');
}

include "conn.php";
// get data 
$query = mysqli_query($con, "SELECT * FROM pelatih WHERE id='$_GET[id]'");
$data = mysqli_fetch_array($query);

if (isset($_POST['submit'])) {
    $update = mysqli_query($con, "UPDATE pelatih SET nama='$_POST[nama]',alamat='$_POST[alamat]',tempat_lahir='$_POST[tempat_lahir]',tanggal_lahir='$_POST[tanggal_lahir]',jk='$_POST[jk]',kategori='$_POST[kategori]' WHERE id='$_GET[id]'");

    if ($update) {
        echo "<script type='text/JavaScript'>
        alert('Berhasil diupdate');
        document.location='pelatih.php';
    </script>";
    } else {
        echo "<script type='text/JavaScript'>
        alert('Gagal diupdate');history.go(-1)
    </script>";
    }
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Edit Pelatih</title>
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
                    <div class="card">
                        <div class="card-header">
                            <h4 class="page-title">Edit Pelatih</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nama </label>
                                            <input type="text" value="<?=$data['nama']?>" required name="nama" id="" class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" value="<?=$data['alamat']?>" required name="alamat" id="" class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" value="<?=$data['tempat_lahir']?>" required name="tempat_lahir" id="" class="form-control form-control-sm">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" required name="tanggal_lahir" id=""  value="<?= $data['tanggal_lahir'] ?>" class="form-control form-control-sm">
                                        </div>

                                        <div class="form-check">
                                            <label>Jenis Kelamin</label><br>
                                            <label class="form-radio-label">
                                                <input class="form-radio-input" type="radio" name="jk" value="Laki-laki" <?=$data['jk']=='Laki-laki'?'checked':''?> >
                                                <span class="form-radio-sign">Laki-laki</span>
                                            </label>
                                            <label class="form-radio-label ml-3">
                                                <input class="form-radio-input" type="radio" name="jk" value="Perempuan" <?=$data['jk']=='Perempuan'?'checked':''?>>
                                                <span class="form-radio-sign">Perempuan</span>
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label for="kategori">Kategori Pelatih</label>
                                            <select class="form-control form-control-sm" name="kategori" id="exampleFormControlSelect1">
                                                <option></option>
                                                <option <?=$data['kategori']==='Keeper Coach'?'selected':''?> value="Keeper Coach">Keeper Coach</option>
                                                <option <?=$data['kategori']==='Head Coach'?'selected':''?> value="Head Coach">Head Coach</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="col text-right">
                                    <button type="submit" name="submit" class="btn  btn-sm btn-primary">Update</button>
                                </div>
                            </form>
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