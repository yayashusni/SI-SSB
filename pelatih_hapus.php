<?php
include "conn.php";
$query = mysqli_query($con, "DELETE  FROM pelatih WHERE id='$_GET[id]'");
if ($query) {
    echo "<script type='text/JavaScript'>
    alert('Berhasil dihapus');
    document.location='pelatih.php';
</script>";
} else {
    echo "<script type='text/JavaScript'>
    alert('Gagal dihapus');history.go(-1);
</script>";
}
