<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    header('location:login.php');
}

include "conn.php";
if (isset($_POST['siswa'])) {

    $query_cek = mysqli_query($con, " SELECT * FROM anggota WHERE nama_lengkap='$_POST[siswa]'");
    $data = mysqli_fetch_array($query_cek);


    $cek_absen = mysqli_query($con, " SELECT siswa FROM kehadiran WHERE date=curdate() && siswa='$_POST[siswa]'");
    $d = mysqli_fetch_array($cek_absen);

    if (empty($data['nama_lengkap'])) {
        echo "<script>alert('Maaf QRCode tidak dikenali');
                    window.location='scan.php';
                 </script>";
    } else if ($d >= 1) {
        echo "<script>alert('Maaf , $_POST[siswa] sudah melakukan absen hari ini');
        window.location='scan.php';
     </script>";
    } else {
        $siswa=ucwords($_POST['siswa']);
        $query = mysqli_query($con, "INSERT INTO kehadiran (siswa,hadir,date) VALUES ('$siswa','1',curdate())");
        if ($query) {
            echo "<script>alert('Absen berhasil') 
        window.location='scan.php'
        </script>";
        } else {
            echo "gagal";
        }
    }
}
