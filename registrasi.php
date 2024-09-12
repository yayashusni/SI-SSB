<?php
include "conn.php";

if ($_POST['password'] != $_POST['confirm_password']) {
    echo "<script>alert('Password yang Anda Masukan Tidak Sama');history.go(-1)</script>";
} else {
    $password = md5($_POST['password']);

    // cek email 
    $query_cek = mysqli_query($con, "SELECT * FROM user WHERE email='$_POST[email]'");
    $cek = mysqli_num_rows($query_cek);
    if ($cek > 0) {
        echo "<script type='text/JavaScript'>
        alert('Email sudah terdaftar');
        document.location='login.php';
             </script>";
    } else {
        // id otomatis 
        $query_id = mysqli_query($con, "SELECT max(id_user) as idTerbesar FROM user");
        $data = mysqli_fetch_array($query_id);
        $id_user = $data['idTerbesar'];
        $urutan = (int) substr($id_user, 4, 3);
        $urutan++;
        $huruf = "USR-";
        $id_user = $huruf . sprintf("%03s", $urutan);

        //  tambah 
        $query = mysqli_query($con, "INSERT INTO user (username, email, password, level,id_user, foto) VALUES('$_POST[username]','$_POST[email]','$password','2','$id_user','avatar.png')");
        if ($query) {
            echo "<script type='text/JavaScript'>
            alert('Registrasi Berhasil, silahkan login');
            document.location='login.php';
            </script>";
        }
    }
}
