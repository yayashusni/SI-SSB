<div class="sidebar">
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2 avatar avatar-online">
                    <?php
                    include "conn.php";
                    $sql = mysqli_query($con, "SELECT * FROM user where id_user='$_SESSION[id_user]'");
                    $foto = mysqli_fetch_array($sql);
                    ?>
                    <img src="img/foto/<?= $foto['foto'] ?>" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="sidebar" href="#collapseExample" aria-expanded="true">
                        <span>
                            <?= $_SESSION['username'] ?>
                            <span class="user-level">
                                <?php
                                if ($_SESSION['level'] == 1) {
                                    echo "Pelatih";
                                } else if ($_SESSION['level'] == 2) {
                                    echo "Siswa";
                                } else if ($_SESSION['level'] == 4) {
                                    echo "Ketua SSB";
                                } else {
                                    echo "Administrator";
                                }
                                ?>
                            </span>
                        </span>
                    </a>

                </div>
            </div>
            <ul class="nav">

                <!-- get url  current page -->
                <?php
                $uri = $_SERVER['REQUEST_URI'];
                ?>

                <li class="nav-item  <?= $uri === '/dashboard.php' ? 'active' : ''; ?> ">
                    <a href="dashboard.php">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- admin -->
                <?php if ($_SESSION['level'] == 0) { ?>

                    <li class="nav-item <?= ($uri === '/pelatih.php' or $uri === '/pelatih_akun.php') ? 'active' : ''; ?>">
                        <a data-toggle="collapse" href="#pelatih" class="collapsed" aria-expanded="false">
                            <i class="fas fa-user-friends"></i>
                            <p>Pelatih</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="pelatih">
                            <ul class="nav nav-collapse">
                                <li class="<?= $uri === '/pelatih.php' ? 'active' : ''; ?>">
                                    <a href="pelatih.php">
                                        <span class="sub-item">Daftar Pelatih</span>
                                    </a>
                                </li>
                                <li class="<?= $uri === '/pelatih_akun.php' ? 'active' : ''; ?>">
                                    <a href="pelatih_akun.php">
                                        <span class="sub-item">Akun</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item <?= $uri === '/scan.php' ? 'active' : ''; ?> ">
                        <a href="scan.php">
                            <i class="fas fa-camera"></i>
                            <p>Absensi</p>
                        </a>
                    </li>
                    <li class="nav-item <?= $uri === '/kehadiran.php' ? 'active' : ''; ?> ">
                        <a href="kehadiran.php">
                            <i class="fas fa-clipboard-list"></i>
                            <p>Kehadiran</p>
                        </a>
                    </li>
                    <li class="nav-item <?= $uri === '/anggota.php' ? 'active' : ''; ?> ">
                        <a href="anggota.php">
                            <i class="fas fa-user-friends"></i>
                            <p>Daftar Siswa</p>
                        </a>
                    </li>
                    <li class="nav-item <?= $uri === '/raport.php' ? 'active' : ''; ?> ">
                        <a href="raport.php">
                            <i class="fas fa-book"></i>
                            <p>Raport</p>
                        </a>
                    </li>
                    <!-- end admin -->

                    <!-- pelatih -->
                <?php  } else if ($_SESSION['level'] == 1) { ?>

                    <li class="nav-item <?= $uri === '/scan.php' ? 'active' : ''; ?> ">
                        <a href="scan.php">
                            <i class="fas fa-camera"></i>
                            <p>Absensi</p>
                        </a>
                    </li>
                    <li class="nav-item <?= $uri === '/kehadiran.php' ? 'active' : ''; ?> ">
                        <a href="kehadiran.php">
                            <i class="fas fa-clipboard-list"></i>
                            <p>Kehadiran</p>
                        </a>
                    </li>
                    <li class="nav-item <?= $uri === '/raport.php' ? 'active' : ''; ?> ">
                        <a href="raport.php">
                            <i class="fas fa-book"></i>
                            <p>Raport</p>
                        </a>
                    </li>
                    <li class="nav-item <?= $uri === '/anggota.php' ? 'active' : ''; ?> ">
                        <a href="anggota.php">
                            <i class="fas fa-user-friends"></i>
                            <p>Daftar Siswa</p>
                        </a>
                    </li>
                    <!-- end pelatih -->

                    <!-- siswa  -->
                <?php  } else if ($_SESSION['level'] == 2) { ?>

                    <li class="nav-item  <?= $uri === '/keanggotaan.php' ? 'active' : ''; ?> ">
                        <a href="keanggotaan.php">
                            <i class="fas fa-user"></i>
                            <p>Data Diri</p>
                        </a>
                    </li>
                    <li class="nav-item  <?= $uri === '/status_keanggotaan.php' ? 'active' : ''; ?> ">
                        <a href="status_keanggotaan.php">
                            <i class="fas fa-id-card"></i>
                            <p>Status Keanggotaan</p>
                        </a>
                    </li>
                    <?php 
                     $sql = mysqli_query($con, "SELECT * FROM anggota where id_user='$_SESSION[id_user]'");
                     $data = mysqli_fetch_array($sql);
                     if($data){?>
  <li class="nav-item <?= $uri === '/kehadiran.php' ? 'active' : ''; ?> ">
                        <a href="kehadiran.php">
                            <i class="fas fa-clipboard-list"></i>
                            <p>Kehadiran</p>
                        </a>
                    </li>
                    <li class="nav-item <?= $uri === '/raport.php' ? 'active' : ''; ?> ">
                        <a href="raport.php">
                            <i class="fas fa-book"></i>
                            <p>Raport</p>
                        </a>
                    </li>
                    <?php }
                    ?>
                  
                    <!-- end siswa  -->

                    <!-- ketua ssb  -->
                <?php } else { ?>

                    <li class="nav-item <?= $uri === '/anggota.php' ? 'active' : ''; ?>">
                        <a href="anggota.php">
                            <i class="fas fa-book"></i>
                            <p>Laporan Data Siswa</p>
                        </a>
                    </li>
                    <li class="nav-item <?= $uri === '/pelatih.php' ? 'active' : ''; ?>">
                        <a href="pelatih.php">
                            <i class="fas fa-book"></i>
                            <p>Laporan Data Pelatih</p>
                        </a>
                    </li>
                    <li class="nav-item <?= $uri === '/kehadiran.php' ? 'active' : ''; ?>">
                        <a href="kehadiran.php">
                            <i class="fas fa-book"></i>
                            <p>Laporan Data Kehadiran </p>
                        </a>
                    </li>
                <?php } ?>
                <!-- end ketua ssb  -->

            </ul>
        </div>
    </div>
</div>