<?php
include "conn.php";
$query = mysqli_query($con, "DELETE  FROM user WHERE id='$_GET[id]'");
if ($query) {
    echo "<script type='text/JavaScript'>
    alert('Berhasil dihapus');
    document.location='pelatih_akun.php';
</script>";
} else {
    echo "<script type='text/JavaScript'>
    alert('Gagal dihapus');history.go(-1);
</script>";
}
