<?php 
include "conn.php";
$query = mysqli_query($con, "INSERT INTO kehadiran (siswa, ijin,  date) VALUES('$_POST[siswa]','1',curdate())");
if ($query) {
    echo "<script type='text/JavaScript'>
            alert('Berhasil ditambahkan');history.go(-1)
            </script>";
} else {
    echo "gagal";
}
// var_dump($_POST);