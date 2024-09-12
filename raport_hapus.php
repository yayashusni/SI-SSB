<?php
include "conn.php";
$query = mysqli_query($con, "DELETE  FROM raport WHERE id='$_GET[id]'");
if ($query) {
    echo "<script type='text/JavaScript'>
    alert('Berhasil dihapus');
    document.location='raport.php';
</script>";
} else {
    echo "<script type='text/JavaScript'>
    alert('Gagal dihapus');history.go(-1);
</script>";
}
