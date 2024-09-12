<?php if ($_SESSION['level'] == 2) { ?>
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
<?php } ?>


<?php if ($_SESSION['level'] == 1) { ?>
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
<?php } ?>


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
<?php } ?>

<!-- for siswa  -->
<?php if ($_SESSION['level'] != 2 & 4) { ?>
    <li class="nav-item ">
        <a href="index.php">
            <i class="fas fa-images"></i>
            <p>Galeri</p>
        </a>
    </li>
    <li class="nav-item ">
        <a href="index.php">
            <i class="far fa-newspaper"></i>
            <p>Berita</p>
        </a>
    </li>
    <li class="nav-item ">
        <a href="index.php">
            <i class="fas fa-file-alt"></i>
            <p>Informasi</p>
        </a>
    </li>
<?php } ?>
<!--end for siswa  -->


<!-- khusus ketua  -->
<?php if ($_SESSION['level'] == 4) { ?>
    <li class="nav-item ">
        <a href="index.php">
            <i class="fas fa-book"></i>
            <p>Laporan Data Siswa</p>
        </a>
    </li>
    <li class="nav-item ">
        <a href="index.php">
            <i class="fas fa-book"></i>
            <p>Laporan Data Pelatih</p>
        </a>
    </li>
    <li class="nav-item ">
        <a href="index.php">
            <i class="fas fa-book"></i>
            <p>Laporan Data Kehadiran </p>
        </a>
    </li>
<?php } ?>
<!-- end khusus ketua  -->