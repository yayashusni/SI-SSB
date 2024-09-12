<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
	header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Siswa</title>
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
					<div class="page-header">
						<h4 class="page-title">Daftar Siswa</h4>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<a class="btn btn-warning btn-sm btn-flat" href="anggota_laporan.php">Laporan</a>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="tabel_anggota" class="display table">
											<thead calss="thead-inverse">
												<tr>
													<th>Nama</th>
													<th>NISN</th>
													<th>Tempat Lahir</th>
													<th>Alamat</th>
													<th>QRCode</th>
													<th>Status Siswa</th>
													<th>Lainnya</th>
								<?php if ($_SESSION['level']!=4) {?>

													<th>Aksi</th>
<?php } ?>

												</tr>
											</thead>
											<tbody>
												<?php
												include "conn.php";
												
												$sql = mysqli_query($con, "SELECT * FROM anggota ORDER BY nama_lengkap DESC");
												while ($data = mysqli_fetch_array($sql)) {
												?>
													<tr>
														<td><?= $data['nama_lengkap'] ?></td>
														<td><?= $data['nisn'] ?></td>
														<td><?= $data['tempat_lahir'] ?></td>
														<td><?= $data['alamat'] ?></td>
														
														<td><a href="img/qrcode/<?= $data['qrcode'] ?>" download="<?= $data['qrcode'] ?>" data-toggle="tooltip" data-placement="top" title="Download QRCode">
																<div class="avatar avatar-lg">
																	<img src="img/qrcode/<?= $data['qrcode'] ?>"  class="avatar-img" alt="">
																</div>
															</a>
														</td>
														<td>
														<?= ucwords($data['status']) ?>
														</td>
														<td><a href="anggota_detail.php?id=<?= $data['id'] ?>">Lihat lengkap</a></td>
								<?php if ($_SESSION['level']!=4) {?>
														
														<td>
														<a href="anggota_print.php?id=<?= $data['id'] ?>" target="_blank" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top" title="Cetak"><i class="fas fa-print" ></i></a>
															<a href="anggota_edit.php?id=<?= $data['id'] ?>" class="btn btn-xs btn-primary " data-toggle="tooltip" data-placement="top" title="Edit data"><i class="fas fa-pencil-alt"></i></a>
															<a href="anggota_hapus.php?id=<?= $data['id'] ?>" onClick="return confirm('Yakin hapus data?')" class="btn btn-xs btn-danger " data-toggle="tooltip" data-placement="top" title="Hapus data"><i class="fas fa-trash"></i></a>
														</td>
<?php } ?>

													</tr>
												<?php } ?>
											</tbody>
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
	</div>


	<!-- script  -->
	<?= include "layout/script.php"; ?>
	<script>
		// data table 
		$(document).ready(function() {
			$('#tabel_anggota').DataTable({});
		});
	</script>
</body>
</html>



