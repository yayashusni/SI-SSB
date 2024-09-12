<?php
include "conn.php";

session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    header('location:login.php');
}

$query = mysqli_query($con, "SELECT * FROM anggota WHERE id='$_GET[id]'");
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Biodata Anggota</title>
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

<body onload="window.print()">
        <!-- content  -->
            <div class="content">
                <div class="page-inner p-4">
                    <div class="card card-profile card-secondary">
                        <div class="card-header">
                        <div class="avatar avatar-xxl">
                            <img src="img/foto/<?= $data['foto'] ?>" alt="foto" class="avatar-img rounded">
                        </div>
                        </div>
                        <div class="card-body">
                            <table class="table mt-3">

                                <tr>
                                    <td width="40%">Nama Lengkap</td>
                                    <td width="60%" ><?= $data['nama_lengkap'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Panggilan</td>
                                    <td><?= $data['nama_panggilan'] ?></td>
                                </tr>
                                <tr>
                                    <td>NISN</td>
                                    <td><?= $data['nisn'] ?></td>
                                </tr>

                                <tr>
                                    <td>Tempat Lahir</td>
                                    <td><?= $data['tempat_lahir'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td><?= date('d-m-Y', strtotime($data['tanggal_lahir'])) ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><?= ucwords($data['alamat']) ?></td>
                                </tr>
                                <tr>
                                    <td>No.Telphone</td>
                                    <td><?= $data['no_tlp'] ?></td>
                                </tr>
                                <tr>
                                    <td>Sekolah</td>
                                    <td><?= strtoupper($data['sekolah'])  ?></td>
                                </tr>
                                <tr>
                                    <td>Anak Ke</td>
                                    <td><?= $data['anak_ke'] ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Saudara</td>
                                    <td><?= $data['jumlah_saudara'] ?></td>
                                </tr>
                            </table>
                        </div>

                    </div>

                    <div class="card ">
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td width="40%">Nama Ayah</td>
                                    <td width="60%"><?= $data['nama_ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td>Pendidikan Ayah</td>
                                    <td><?= $data['pendidikan_ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan Ayah</td>
                                    <td><?= $data['pekerjaan_ayah'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Ibu</td>
                                    <td><?= $data['nama_ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td>Pendidikan Ibu</td>
                                    <td><?= $data['pendidikan_ibu'] ?></td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan Ibu</td>
                                    <td><?= $data['pekerjaan_ibu'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                            <div class="card ">
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td width="40%">Akte Kelahiran</td>
                                    <td width="60%"><a href="img/anggota/akta/<?= $data['akta_kelahiran'] ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Lihat gambar">
                                            <?= $data['akta_kelahiran'] ?></a> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kartu Keluarga</td>
                                    <td><a href="img/anggota/kk/<?= $data['kartu_keluarga'] ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Lihat gambar">
                                            <?= $data['kartu_keluarga'] ?></a> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ijazah Terakhir</td>
                                    <td><a href="img/anggota/ijazah/<?= $data['ijazah_terakhir'] ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Lihat gambar">
                                            <?= $data['ijazah_terakhir'] ?></a> 
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end content  -->
            </div>
        </div>
        
</body>
</html>