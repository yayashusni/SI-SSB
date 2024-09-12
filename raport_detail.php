<?php
include "conn.php";

session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    header('location:login.php');
}

$sql = mysqli_query($con, "SELECT * FROM raport WHERE id='$_GET[id]'");
$data = mysqli_fetch_array($sql);

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
                    <div class="card card-profile card-secondary">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5 text-center">
                                    <div class="avatar avatar-xxl ">
                                        <img src="assets/img/Logo.png" alt="foto" class="avatar-img rounded">
                                    </div>
                                </div>
                                <div class="col-lg-7  col-md-6 mt-3 ">
                                    <div class="d-inline ">
                                        <h2 class="">SEKOLAH SEPAK BOLA (SSB)</h2>
                                        <h1 class=" ">TUNAS HARAPAN</h1>
                                        <p class="">Kawali - Ciamis</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col text-center">
                                    <h4>Raport Triwulan Siswa</h4>
                                    <h4>SSB TUNAS HARAPAN</h4>
                                </div>
                            </div>
<?php 
    $sql = mysqli_query($con, "SELECT * FROM raport WHERE id='$_GET[id]'");
    $data = mysqli_fetch_array($sql);
?>
                            <table cellpadding="5px">
                                <tr>
                                    <td>
                                        <label>Nama Lengkap</label>

                                    </td>
                                    <td>:</td>
                                    <td>
                                        <label><?php echo $data['nama']?></label>

                                    </td>
                                </tr>
                                <tr>
                                    <td><label>NISN</label></td>
                                    <td>:</td>
                                    <td> <label><?= $data['nisn'] ?></label></td>
                                </tr>
                                <tr>
                                    <td><label>Tempat / Tgl. Lahir</label></td>
                                    <td>:</td>
                                    <td><?= $data['tempat_lahir'] ?> / <?= $data['tanggal_lahir'] ?></td>
                                </tr>
                                <tr>
                                    <td><label>Posisi </label></td>
                                    <td>:</td>
                                    <td><?= $data['posisi'] ?></td>
                                </tr>
                            </table>

                            <br>
                            <table class="table text-left table-bordered">

                                <tr>
                                    <th width="30%">Materi Latihan</th>
                                    <th  width="10%">Nilai</th>
                                    <th width="60%">Keterangan</th>
                                </tr>
                                <tr>
                                    <td colspan="3" style="background-color:#5759628a;color:white">Personality</td>

                                </tr>
                                <tr>
                                    <td>Kerjasama Tim</td>
                                    <td>
                                        <?php if ($data['kerjasama_tim'] === 'Sangat Baik') {
                                            echo "A";
                                        }elseif($data['kerjasama_tim'] === 'Baik'){
                                            echo "B";
                                        }elseif($data['kerjasama_tim'] === 'Cukup'){
                                            echo "C";
                                        }else{
                                            echo "D";
                                        }
                                        ?>
                                    </td>
                                    <td><?= $data['kerjasama_tim'] ?></td>
                                </tr>
                                <tr>
                                    <td>Jiwa Kompetisi</td>
                                    <td>
                                        <?php if ($data['Jiwa_kompetisi'] === 'Sangat Baik') {
                                            echo "A";
                                        }elseif($data['Jiwa_kompetisi'] === 'Baik'){
                                            echo "B";
                                        }elseif($data['Jiwa_kompetisi'] === 'Cukup'){
                                            echo "C";
                                        }else{
                                            echo "D";
                                        }
                                        ?>
                                    </td>
                                    <td><?= $data['Jiwa_kompetisi'] ?></td>
                                </tr>
                                <tr>
                                    <td>Konsentrasi</td>
                                    <td>
                                        <?php if ($data['Konsentrasi'] === 'Sangat Baik') {
                                            echo "A";
                                        }elseif($data['Konsentrasi'] === 'Baik'){
                                            echo "B";
                                        }elseif($data['Konsentrasi'] === 'Cukup'){
                                            echo "C";
                                        }else{
                                            echo "D";
                                        }
                                        ?>
                                    </td>
                                    <td><?= $data['Konsentrasi'] ?></td>
                                </tr>
                                <tr>
                                    <td>Kontrol Diri</td>
                                    <td>
                                        <?php if ($data['Kontrol_diri'] === 'Sangat Baik') {
                                            echo "A";
                                        }elseif($data['Kontrol_diri'] === 'Baik'){
                                            echo "B";
                                        }elseif($data['Kontrol_diri'] === 'Cukup'){
                                            echo "C";
                                        }else{
                                            echo "D";
                                        }
                                        ?>
                                    </td>
                                    <td><?= $data['Kontrol_diri'] ?></td>
                                </tr>
                                <tr>
                                    <td>Disiplin</td>
                                    <td>
                                        <?php if ($data['disiplin'] === 'Sangat Baik') {
                                            echo "A";
                                        }elseif($data['disiplin'] === 'Baik'){
                                            echo "B";
                                        }elseif($data['disiplin'] === 'Cukup'){
                                            echo "C";
                                        }else{
                                            echo "D";
                                        }
                                        ?>
                                    </td>
                                    <td><?= $data['disiplin'] ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="background-color:#5759628a;color:white">Fisik</td>

                                </tr>
                                <tr>
                                    <td>Imunitas</td>
                                    <td>
                                        <?php if ($data['imunitas'] === 'Sangat Baik') {
                                            echo "A";
                                        }elseif($data['imunitas'] === 'Baik'){
                                            echo "B";
                                        }elseif($data['imunitas'] === 'Cukup'){
                                            echo "C";
                                        }else{
                                            echo "D";
                                        }
                                        ?>
                                    </td>
                                    <td><?= $data['imunitas'] ?></td>
                                </tr>
                                <tr>
                                    <td>Kelincahan</td>
                                    <td>
                                        <?php if ($data['kelincahan'] === 'Sangat Baik') {
                                            echo "A";
                                        }elseif($data['kelincahan'] === 'Baik'){
                                            echo "B";
                                        }elseif($data['kelincahan'] === 'Cukup'){
                                            echo "C";
                                        }else{
                                            echo "D";
                                        }
                                        ?>
                                    </td>
                                    <td><?= $data['kelincahan'] ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="background-color:#5759628a;color:white">Kehadiran</td>
                                </tr>
                                <tr>
                                    <td>Hadir</td>
                                    <td><?= $data['Kehadiran'] ?></td>
                                    <td>
                                        <?php if ($data['Kehadiran'] >= 18) {
                                            echo "Sangat Baik";
                                        }elseif($data['Kehadiran'] >= 12){
                                            echo "Baik";
                                        }elseif($data['Kehadiran'] >= 6){
                                            echo "Cukup";
                                        }else{
                                            echo "Kurang";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ijin</td>
                                    <td><?= $data['ijin'] ?></td>
                                    <td>
                                        <?php if ($data['ijin'] <= 3) {
                                            echo "Sangat Baik";
                                        }elseif($data['ijin'] <= 5){
                                            echo "Baik";
                                        }elseif($data['ijin'] <= 8){
                                            echo "Cukup";
                                        }else{
                                            echo "Kurang";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sakit</td>
                                    <td><?= $data['sakit'] ?></td>
                                    <td>
                                        <?php if ($data['sakit'] <= 3) {
                                            echo "Sangat Baik";
                                        }elseif($data['sakit'] <= 5){
                                            echo "Baik";
                                        }elseif($data['sakit'] <= 8){
                                            echo "Cukup";
                                        }else{
                                            echo "Kurang";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanpa Keterangan</td>
                                    <?php 
                                    ?>
                                    <td><?= $data['tanpa_keterangan'] ?></td>
                                    <td>
                                        <?php if ($data['tanpa_keterangan'] <= 3) {
                                            echo "Sangat Baik";
                                        }elseif($data['tanpa_keterangan'] <= 5){
                                            echo "Baik";
                                        }elseif($data['tanpa_keterangan'] <= 8){
                                            echo "Cukup";
                                        }else{
                                            echo "Kurang";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="background-color:#5759628a;color:white">Teknik</td>
                                </tr>
                                <?php if($data['posisi']!='Penjaga Gawang'){?>
                                    <tr>
                                    <td>Dribling</td>
                                    <?php 
                                    ?>
                                    <td><?= $data['dribling_skill'] ?></td>
                                    <td>
                                        <?php if ($data['dribling_skill'] >= 85) {
                                            echo "Sangat Baik";
                                        }elseif($data['dribling_skill'] >= 75){
                                            echo "Baik";
                                        }elseif($data['dribling_skill'] >= 65){
                                            echo "Cukup";
                                        }else{
                                            echo "Kurang";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Shooting</td>
                                    <?php 
                                    ?>
                                    <td><?= $data['shooting'] ?></td>
                                    <td>
                                        <?php if ($data['shooting'] >= 85) {
                                            echo "Sangat Baik";
                                        }elseif($data['shooting'] >= 75){
                                            echo "Baik";
                                        }elseif($data['shooting'] >= 65){
                                            echo "Cukup";
                                        }else{
                                            echo "Kurang";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Heading</td>
                                    <?php 
                                    ?>
                                    <td><?= $data['heading'] ?></td>
                                    <td>
                                        <?php if ($data['heading'] >= 85) {
                                            echo "Sangat Baik";
                                        }elseif($data['heading'] >= 75){
                                            echo "Baik";
                                        }elseif($data['heading'] >= 65){
                                            echo "Cukup";
                                        }else{
                                            echo "Kurang";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Passing</td>
                                    <?php 
                                    ?>
                                    <td><?= $data['passing'] ?></td>
                                    <td>
                                        <?php if ($data['passing'] >= 85) {
                                            echo "Sangat Baik";
                                        }elseif($data['passing'] >= 75){
                                            echo "Baik";
                                        }elseif($data['passing'] >= 65){
                                            echo "Cukup";
                                        }else{
                                            echo "Kurang";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php }else{?>

                                   
                                <tr>
                                    <td>Kontrol</td>
                                    <?php 
                                    ?>
                                    <td><?= $data['kontrol'] ?></td>
                                    <td>
                                        <?php if ($data['kontrol'] >= 85) {
                                            echo "Sangat Baik";
                                        }elseif($data['kontrol'] >= 75){
                                            echo "Baik";
                                        }elseif($data['kontrol'] >= 65){
                                            echo "Cukup";
                                        }else{
                                            echo "Kurang";
                                        }
                                        ?>
                                    </td>
                                </tr>
                               
                                <tr>
                                    <td>Tangkap</td>
                                    <?php 
                                    ?>
                                    <td><?= $data['tangkap'] ?></td>
                                    <td>
                                        <?php if ($data['tangkap'] >= 85) {
                                            echo "Sangat Baik";
                                        }elseif($data['tangkap'] >= 75){
                                            echo "Baik";
                                        }elseif($data['tangkap'] >= 65){
                                            echo "Cukup";
                                        }else{
                                            echo "Kurang";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Menepis</td>
                                    <?php 
                                    ?>
                                    <td><?= $data['menepis'] ?></td>
                                    <td>
                                        <?php if ($data['menepis'] >= 85) {
                                            echo "Sangat Baik";
                                        }elseif($data['menepis'] >= 75){
                                            echo "Baik";
                                        }elseif($data['menepis'] >= 65){
                                            echo "Cukup";
                                        }else{
                                            echo "Kurang";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Meninju</td>
                                    <?php 
                                    ?>
                                    <td><?= $data['meninju'] ?></td>
                                    <td>
                                        <?php if ($data['meninju'] >= 85) {
                                            echo "Sangat Baik";
                                        }elseif($data['meninju'] >= 75){
                                            echo "Baik";
                                        }elseif($data['meninju'] >= 65){
                                            echo "Cukup";
                                        }else{
                                            echo "Kurang";
                                        }
                                        ?>
                                    </td>
                                </tr>
                               <?php }?>
                               
                               
                            </table>
                        </div>

                    </div>


                </div>
                <!-- end content  -->
            </div>
        </div>
        <!-- script  -->
        <?= include "layout/script.php"; ?>
</body>