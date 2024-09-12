<?php 
include "conn.php";
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    header('location:login.php');}

// Siswa
$count_siswa=mysqli_query($con,"SELECT * FROM anggota");
$rsiswa=mysqli_num_rows($count_siswa);

// pelatih 
$count_pelatih=mysqli_query($con,"SELECT * FROM pelatih");
$pelatih=mysqli_num_rows($count_pelatih);

// akun user 
$count_user=mysqli_query($con,"SELECT * FROM user WHERE level in(2,1) ");
$users=mysqli_num_rows($count_user);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/Logo.png" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
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
    <?= include "layout/header.php";?>
    <!-- sidebar -->
    <?= include "layout/sidebar.php";?>
		
		
    <!-- content  -->
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Dashboard</h4>
					</div>
					<div class="row">
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-primary bubble-shadow-small">
												<i class="fas fa-users"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Daftar Siswa</p>
												<h4 class="card-title"><?=$rsiswa?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-info bubble-shadow-small">
												<i class="fa fa-users"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Daftar Pelatih</p>
												<h4 class="card-title"><?=$pelatih?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-secondary bubble-shadow-small">
												<i class="far fa-check-circle"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Akun Terdaftar</p>
												<h4 class="card-title"><?=$users?></h4>
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
<?= include "layout/script.php";?>

</body>
</html>