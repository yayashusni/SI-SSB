<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    header('location:login.php');
}

include "conn.php";
// get data 
$query = mysqli_query($con, "SELECT * FROM anggota WHERE id='$_GET[id]'");
$data = mysqli_fetch_array($query);

// update data 
if (isset($_POST['update'])) {

    $nama_lengkap = ucwords($_POST['nama_lengkap']);
    $nama_panggilan = ucwords($_POST['nama_panggilan']);
    $nisn = $_POST['nisn'];
    $tempat_lahir = strtoupper($_POST['tempat_lahir']);
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $no_tlp = $_POST['no_tlp'];
    $sekolah = strtoupper($_POST['sekolah']);
    $anak_ke = $_POST['anak_ke'];
    $jumlah_saudara = $_POST['jumlah_saudara'];
    $nama_ayah = ucwords($_POST['nama_ayah']);
    $pendidikan_ayah = $_POST['pendidikan_ayah'];
    $pekerjaan_ayah = ucwords($_POST['pekerjaan_ayah']);
    $nama_ibu = ucwords($_POST['nama_ibu']);
    $pendidikan_ibu = $_POST['pendidikan_ibu'];
    $pekerjaan_ibu = ucwords($_POST['pekerjaan_ibu']);
    $status=$_POST['status'];
    $posisi=$_POST['posisi'];

    $query = mysqli_query($con, "UPDATE anggota SET nama_lengkap='$nama_lengkap',nama_panggilan='$nama_panggilan',nisn='$nisn',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',alamat='$alamat',no_tlp='$no_tlp',sekolah='$sekolah',anak_ke='$anak_ke',jumlah_saudara='$jumlah_saudara',nama_ayah='$nama_ayah',pendidikan_ayah='$pendidikan_ayah',pekerjaan_ayah='$pekerjaan_ayah',nama_ibu='$nama_ibu',pendidikan_ibu='$pendidikan_ibu',pekerjaan_ibu='$pekerjaan_ibu',posisi='$posisi' ,status='$status' WHERE id='$_GET[id]'");

    if ($query) {
        echo "<script type='text/JavaScript'>
alert('Berhasil Diupdate');
document.location='anggota.php';
</script>";
    } else {
        echo "gagal";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Edit Data</title>
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
                    <a href="anggota.php"><i class="fa fa-arrow-left mb-2" aria-hidden="true"></i> Back</a>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="page-title">Edit Data Siswa</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h4>Biodata diri</h4>
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" name="nama_lengkap" value="<?= $data['nama_lengkap'] ?>" id="" class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Panggilan</label>
                                            <input type="text" name="nama_panggilan" value="<?= $data['nama_panggilan'] ?>" id="" class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group">
                                            <label>NISN</label>
                                            <input type="number" name="nisn" id="" value="<?= $data['nisn'] ?>" class="form-control form-control-sm">
                                        </div>


                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" value="<?= $data['tempat_lahir'] ?>" id="" class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>" id="" class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" name="alamat" value="<?= $data['alamat'] ?>" id="" class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group">
                                            <label>No.Telp</label>
                                            <input type="number" value="<?= $data['no_tlp'] ?>" name="no_tlp" id="" class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group">
                                            <label>Sekolah</label>
                                            <input type="text" value="<?= $data['sekolah'] ?>" name="sekolah" id="" class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group">
                                            <label>Anak Ke</label>
                                            <input type="number" value="<?= $data['anak_ke'] ?>" name="anak_ke" id="" class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group">
                                            <label>Jumlah Saudara</label>
                                            <input type="number" value="<?= $data['jumlah_saudara'] ?>" name="jumlah_saudara" id="" class="form-control form-control-sm">
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <h4>Biodata Orang tua</h4>
                                        <div class="form-group">
                                            <label>Nama Ayah</label>
                                            <input type="text" value="<?= $data['nama_ayah'] ?>" name="nama_ayah" id="" class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group">
                                            <label>Pendidikan Ayah</label>
                                            <select class="form-control" name="pendidikan_ayah" id="">
                                                <option value=""></option>
                                                <option <?= $data['pendidikan_ayah'] == 'SD' ? 'selected' : '' ?> value="SD">SD</option>
                                                <option <?= $data['pendidikan_ayah'] == 'SLTP' ? 'selected' : '' ?> value="SLTP">SLTP</option>
                                                <option <?= $data['pendidikan_ayah'] == 'SLTA' ? 'selected' : '' ?> value="SLTA">SLTA</option>
                                                <option <?= $data['pendidikan_ayah'] == 'Perguruan Tinggi' ? 'selected' : '' ?> value="Perguruan Tinggi">Perguruan Tinggi</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Pekerjaan Ayah</label>
                                            <input type="text" value="<?= $data['pekerjaan_ayah'] ?>" name="pekerjaan_ayah" id="" class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Ibu</label>
                                            <input type="text" value="<?= $data['nama_ibu'] ?>" name="nama_ibu" id="" class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group">
                                            <label>Pendidikan Ibu</label>
                                            <input type="text" value="<?= $data['pendidikan_ibu'] ?>" name="pendidikan_ibu" id="" class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group">
                                            <label>Pekerjaan Ibu</label>
                                            <input type="text" value="<?= $data['pekerjaan_ibu'] ?>" name="pekerjaan_ibu" id="" class="form-control form-control-sm">
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                          <label for="">Posisi</label>
                                          <select class="form-control" name="posisi" id="">
                                              <option ></option>
                                            <option <?= $data['posisi']=='Penjaga Gawang'?'selected':'' ?> value="Penjaga Gawang">Penjaga Gawang</option>
                                            <option <?= $data['posisi']=='Pemain Belakang'?'selected':'' ?> value="Pemain Belakang">Pemain Belakang (Back)</option>
                                            <option <?= $data['posisi']=='Gelandang'?'selected':'' ?> value="Gelandang">Gelandang</option>
                                            <option <?= $data['posisi']=='Penyerang'?'selected':'' ?> value="Penyerang">Penyerang (Striker)</option>
                                          </select>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Status Siswa</label>
                                            <select class="form-control" name="status" id="">
                                                <option value="aktif" <?=$data['status']=='aktif'?'selected':''?>>Aktif</option>
                                                <option value="non aktif" <?=$data['status']=='non aktif'?'selected':''?>>Non Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-lg-2">
                                    <button type="submit" name="update" class="btn btn-block btn-sm btn-primary">Update</button>
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