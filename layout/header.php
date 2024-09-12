<div class="main-header" data-background-color="purple">
    <!-- Logo Header -->
    <div class="logo-header">
				
				<a href="dashboard.php" class="logo">
					<img src="assets/img/icon bar.png" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg">

        <div class="container-fluid">
            
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
               
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm avatar avatar-online">
                        <?php
                            include "conn.php";
                            $sql = mysqli_query($con, "SELECT * FROM user where id_user='$_SESSION[id_user]'");
                            $foto = mysqli_fetch_array($sql);
                            ?>
                            <img src="img/foto/<?= $foto['foto'] ?>" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <i class="fa fa-caret-down text-white" aria-hidden="true"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg"><img src="img/foto/<?= $foto['foto'] ?>" alt="image profile" class="avatar-img rounded"></div>
                                <div class="u-text">
                                    <h4><?=$_SESSION['username']?></h4>
                                    <p class="text-muted"><?=$_SESSION['email']?></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="profil.php">Profil saya</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="pengaturan_akun.php">Pengaturan akun</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">keluar</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>