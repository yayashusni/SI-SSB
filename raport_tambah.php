<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    header('location:login.php');
}

include "conn.php";
if (isset($_POST['submit'])) {
    $tanpa_keterangan=24 - ( $_POST['kehadiran']+$_POST['ijin']+$_POST['sakit']);
    $query = mysqli_query($con, "INSERT INTO raport(id_user, nama, nisn, tempat_lahir, tanggal_lahir,posisi, Kehadiran,ijin,sakit, tanpa_keterangan,kerjasama_tim, Jiwa_kompetisi, Konsentrasi, Kontrol_diri, disiplin, imunitas, kelincahan, dribling_skill, passing, kontrol, shooting, heading, tangkap, menepis, meninju) VALUES ('$_POST[id_user]','$_POST[nama]','$_POST[nisn]','$_POST[tempat_lahir]','$_POST[tanggal_lahir]','$_POST[posisi]','$_POST[kehadiran]','$_POST[ijin]','$_POST[sakit]','$tanpa_keterangan','$_POST[kerjasama_tim]','$_POST[jiwa_kompetisi]','$_POST[konsentrasi]','$_POST[kontrol_diri]','$_POST[disiplin]','$_POST[imunitas]','$_POST[kelincahan]','$_POST[dribling_skill]','$_POST[passing]','$_POST[kontrol]','$_POST[shooting]','$_POST[heading]','$_POST[tangkap]','$_POST[menepis]','$_POST[meninju]')");

    if ($query) {
        echo "<script type='text/JavaScript'>
        alert('Berhasil tersimpan');
        document.location='raport.php';
    </script>";
    } else {
        echo "<script type='text/JavaScript'>
        alert('Gagal disimpan');history.go(-1)
    </script>";
    }
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Raport</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script src="assets/js/core/jquery.3.2.1.min.js"></script>

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
                            <h4 class="page-title">Buat Raport </h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h4>Data Diri</h4>

                                        <div class="form-group">
                                            <label for="">User ID</label>
                                            <select class="form-control" name="id_user" id="id_user" required >
                                                <!-- get usei id level  -->
                                                <option></option>

                                                <?php
                                                include "conn.php";

                                                $get_id = mysqli_query($con, "SELECT * from anggota ORDER BY nama_lengkap asc");

                                                while ($data = mysqli_fetch_array($get_id)) { ?>
                                                    <option value="<?= $data['id_user'] ?>"><?= $data['id_user'] ?> - <?= $data['nama_lengkap'] ?></option>

                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Nama </label>
                                            <input type="text" required name="nama" id="nama_lengkap" class="form-control ">
                                        </div>

                                        <div class="form-group">
                                            <label>NISN</label>
                                            <input type="text" required name="nisn" id="nisn" class="form-control ">
                                        </div>

                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" required name="tempat_lahir" id="tempat_lahir" class="form-control ">
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" required name="tanggal_lahir" id="tanggal_lahir" class="form-control ">
                                        </div>
                                        <div class="form-group">
                                            <label>Posisi Sebagai</label>
                                            <input type="text" required name="posisi" id="posisi" class="form-control ">
                                        </div>
                                        <br>
                                        <h4>Nilai Diri</h4>

                                        <div class="form-group">
                                            <label>Kerjasama Tim</label>
                                            <select class="form-control " name="kerjasama_tim" id="" required>
                                                <option value=""></option>
                                                <option value="Sangat Baik">Sangat Baik</option>
                                                <option value="Baik">Baik</option>
                                                <option value="Cukup">Cukup</option>
                                                <option value="Kurang">Kurang</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jiwa Kompetisi</label>
                                            <select class="form-control " name="jiwa_kompetisi" id="" required>
                                                <option value=""></option>
                                                <option value="Sangat Baik">Sangat Baik</option>
                                                <option value="Baik">Baik</option>
                                                <option value="Cukup">Cukup</option>
                                                <option value="Kurang">Kurang</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Konsentrasi</label>
                                            <select class="form-control " name="konsentrasi" id="" required>
                                                <option value=""></option>
                                                <option value="Sangat Baik">Sangat Baik</option>
                                                <option value="Baik">Baik</option>
                                                <option value="Cukup">Cukup</option>
                                                <option value="Kurang">Kurang</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kontrol Diri</label>
                                            <select class="form-control " name="kontrol_diri" id="" required>
                                                <option value=""></option>
                                                <option value="Sangat Baik">Sangat Baik</option>
                                                <option value="Baik">Baik</option>
                                                <option value="Cukup">Cukup</option>
                                                <option value="Kurang">Kurang</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Disiplin</label>
                                            <select class="form-control " name="disiplin" id="" required>
                                                <option value=""></option>
                                                <option value="Sangat Baik">Sangat Baik</option>
                                                <option value="Baik">Baik</option>
                                                <option value="Cukup">Cukup</option>
                                                <option value="Kurang">Kurang</option>
                                            </select>
                                        </div>
                                        <br>
                                        <h4>Kehadiran</h4>

                                        <div class="form-group">
                                            <label>Hadir</label>
                                            <input type="number" required name="kehadiran" class="form-control ">
                                        </div>
                                        <div class="form-group">
                                            <label>Ijin</label>
                                            <input type="number" required name="ijin" class="form-control ">
                                        </div>
                                        <div class="form-group">
                                            <label>Sakit</label>
                                            <input type="number" required name="sakit" class="form-control ">
                                        </div>



                                    </div>
                                    <div class="col-lg-6">
                                        <h4>Fisik</h4>
                                        <div class="form-group">
                                            <label>Daya Tahan Tubuh</label>
                                            <select class="form-control " name="imunitas" id="" required>
                                                <option value=""></option>
                                                <option value="Sangat Baik">Sangat Baik</option>
                                                <option value="Baik">Baik</option>
                                                <option value="Cukup">Cukup</option>
                                                <option value="Kurang">Kurang</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Kelincahan</label>
                                            <select class="form-control " name="kelincahan" id="" required>
                                                <option value=""></option>
                                                <option value="Sangat Baik">Sangat Baik</option>
                                                <option value="Baik">Baik</option>
                                                <option value="Cukup">Cukup</option>
                                                <option value="Kurang">Kurang</option>
                                            </select>
                                        </div>
<br>
                                        <h4>Teknik</h4>
                                        <div class="form-group">
                                            <label>Dribling Skill</label>
                                            <input type="number" required name="dribling_skill" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Passing</label>
                                            <input type="number" required name="passing" class="form-control ">
                                        </div>
                                        <div class="form-group">
                                            <label>Kontrol Bola</label>
                                            <input type="number" required name="kontrol" class="form-control ">
                                        </div>
                                        <div class="form-group">
                                            <label>Shooting</label>
                                            <input type="number" required name="shooting" class="form-control ">
                                        </div>
                                        <div class="form-group">
                                            <label>Heading</label>
                                            <input type="number" required name="heading" class="form-control ">
                                        </div>
                                        <!-- khusus kiper  -->
                                        <div class="form-group">
                                            <label>Tangkap Bola</label>
                                            <input type="number" required name="tangkap" class="form-control ">
                                        </div>
                                        <div class="form-group">
                                            <label>Menepis Bola</label>
                                            <input type="number" required name="menepis" class="form-control ">
                                        </div>
                                        <div class="form-group">
                                            <label>Meninju Bola</label>
                                            <input type="number" required name="meninju" class="form-control ">
                                        </div>

                                    </div>

                                    <br>
                                    <div class="col text-right">
                                        <button type="submit" name="submit" class="btn col-md-2  btn-sm btn-primary">Tambah</button>
                                    </div>
                            </form>
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
            $("document").ready(function() {

                $("#id_user").change(function() {
                    var a = $("#id_user").val();
                    $.ajax({
                        type: "GET",
                        data: "id_user=" + a,
                        url: "json_siswa.php",
                        dataType: "json",
                        success: function(data) {

                            for (var i = 0; i < data.length; i++) {

                                $('#nama_lengkap').val(data[i].nama_lengkap);
                                $('#nisn').val(data[i].nisn);
                                $('#tempat_lahir').val(data[i].tempat_lahir);
                                $('#tanggal_lahir').val(data[i].tanggal_lahir);
                                $('#posisi').val(data[i].posisi);
                            }
                        }

                    });

                });
            });
        </script>
</body>

</html>