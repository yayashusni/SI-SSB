<?php 
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    header('location:login.php');}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pendaftaran</title>
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
                            <h4 class="page-title">Pendaftaran Siswa</h4>
                        </div>
                        <div class="card-body">
                            <form action="anggota_proses_tambah.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h4>Biodata diri</h4>
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input  type="text" name="nama_lengkap" id="" class="form-control form-control-sm" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Panggilan</label>
                                            <input  type="text" name="nama_panggilan" id="" class="form-control form-control-sm" required>
                                        </div>

                                        <div class="form-group">
                                            <label>NISN</label>
                                            <input  type="number" min="0" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10" name="nisn" id="" class="form-control form-control-sm" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input  type="text" name="tempat_lahir" id="" class="form-control form-control-sm" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input  type="date" max="2015-12-30" name="tanggal_lahir" id="" class="form-control form-control-sm" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea name="alamat" class="form-control id="" cols="30" rows="3" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>No.Telp</label>
                                            <input  type="number" min="0" name="no_tlp" id="" class="form-control form-control-sm" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Sekolah</label>
                                            <input  type="text" name="sekolah" id="" class="form-control form-control-sm" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Anak Ke</label>
                                            <input  type="number" min="0" name="anak_ke" id="" class="form-control form-control-sm" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Jumlah Saudara</label>
                                            <input  type="number"min="0" name="jumlah_saudara" id="" class="form-control form-control-sm" required>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <h4>Biodata Orang tua</h4>
                                        <div class="form-group">
                                            <label>Nama Ayah</label>
                                            <input  type="text" name="nama_ayah" id="" class="form-control form-control-sm" required>
                                        </div>

                                        <div class="form-group">
                                                <label>Pendidikan Ayah</label>
                                              <select class="form-control" name="pendidikan_ayah" id="" required>
                                                  <option value=""></option>
                                                  <option value="SD">SD</option>
                                                  <option value="SLTP">SLTP</option>
                                                  <option value="SLTA">SLTA</option>
                                                  <option value="Perguruan Tinggi">Perguruan Tinggi</option>
                                              </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Pekerjaan Ayah</label>
                                            <input  type="text" name="pekerjaan_ayah" id="" class="form-control form-control-sm" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Ibu</label>
                                            <input  type="text" name="nama_ibu" id="" class="form-control form-control-sm" required>
                                        </div>

                                        <div class="form-group">
                                        <label>Pendidikan Ibu</label>
                                              <select class="form-control" name="pendidikan_ibu" id="" required>
                                                  <option value=""></option>
                                                  <option value="SD">SD</option>
                                                  <option value="SLTP">SLTP</option>
                                                  <option value="SLTA">SLTA</option>
                                                  <option value="Perguruan Tinggi">Perguruan Tinggi</option>
                                              </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Pekerjaan Ibu</label>
                                            <input  type="text" name="pekerjaan_ibu" id="" class="form-control form-control-sm" required>
                                        </div>

                                        <br>
                                        <h4>Pemilihan Posisi</h4>

                                        <div class="form-group">
                                          <label for="">Posisi</label>
                                          <select class="form-control" name="posisi" id="" required>
                                              <option ></option>
                                            <option value="Penjaga Gawang">Penjaga Gawang</option>
                                            <option value="Pemain Belakang">Pemain Belakang (Back)</option>
                                            <option value="Gelandang">Gelandang</option>
                                            <option value="Penyerang (Striker)">Penyerang (Striker)</option>
                                          </select>
                                        </div>

                                        <br>
                                        <h4>Dokumen</h4>

                                        <div class="form-group">
                                            <label>Akta Kelahiran</label>
                                            <input  type="file" name="akta_kelahiran" id="" class="form-control form-control-sm" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Kartu Keluarga</label>
                                            <input  type="file" name="kartu_keluarga" id="" class="form-control form-control-sm" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Izajah Terakhir</label>
                                            <input  type="file" name="ijazah_terakhir" id="" class="form-control form-control-sm" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-lg-2">
                                    <button type="submit" name="submit"  class="btn btn-block btn-sm btn-primary">Daftar</button>
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