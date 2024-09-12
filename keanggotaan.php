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
                <table id="anggota" class="display table-inverse table table-hover" >
											<thead calss="thead-inverse">
												<tr>
													<th>Nama</th>
													<th>NISN</th>
													<th>Tempat Lahir</th>
													<th>Tanggal Lahir</th>
													<th>Alamat</th>
													<th>Foto</th>
													<th>Lainnya</th>
												</tr>
											</thead>
											
											<tbody>
												<?php 
													include "conn.php";
                                                    
													$sql=mysqli_query($con,"SELECT * FROM anggota where id_user='$_SESSION[id_user]'");
													$data=mysqli_fetch_array($sql);


                                                    if(empty($data)) {
                                                        echo "Anda belum terdaftar";
echo '<br><a name="" id="" class="btn btn-sm btn-primary" href="anggota_tambah.php" role="button">Daftar</a>';


                                                    }else{
                                                    
												?>
												<tr>
													<td><?=$data['nama_lengkap']?></td>
													<td><?=$data['nisn']?></td>
													<td><?=$data['tempat_lahir']?></td>
													<td><?= date('d-m-Y',strtotime($data['tanggal_lahir']))?></td>
													<td><?=$data['alamat']?></td>
                                                    <td>
													<div class="avatar avatar-lg">
													<img src="img/foto/<?=$data['foto']?>" class="avatar-img rounded" alt="">	
													</div>
													<td><a href="anggota_detail.php?id=<?=$data['id']?>">Lihat lengkap</a></td>

												</tr>
                                                <?php }?>
											</tbody>
										</table>
                </div>

            </div>
            <!-- end content  -->

        </div>
        <!-- script  -->
        <?= include "layout/script.php"; ?>

</body>

</html>
