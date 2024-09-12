<?php 
include "conn.php";
$query=mysqli_query($con,"DELETE  FROM anggota WHERE id='$_GET[id]'");
if($query) {
    echo "<script type='text/JavaScript'>
    alert('Berhasil dihapus');
    document.location='anggota.php';
</script>";
} else {
    //throw $th;
    echo "gagal";
}