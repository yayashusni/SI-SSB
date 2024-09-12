<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    header('location:login.php');
}

include "conn.php";

if (isset($_POST['submit'])) {

     // cek email 
     $query_cek = mysqli_query($con, "SELECT * FROM user WHERE email='$_POST[email]'");
     $cek = mysqli_num_rows($query_cek);
     if ($cek > 0) {
         echo "<script type='text/JavaScript'>
         alert('Email sudah terdaftar');
         document.location='pelatih_tambah_akun.php';
              </script>";
     }else{

     

    $password = md5($_POST['email']);

            // id otomatis 
            $query_id = mysqli_query($con, "SELECT max(id_user) as idTerbesar FROM user");
            $data = mysqli_fetch_array($query_id);
            $id_user = $data['idTerbesar'];
            $urutan = (int) substr($id_user, 4, 3);
            $urutan++;
            $huruf = "USR-";
            $id_user = $huruf . sprintf("%03s", $urutan);
    
            //  tambah 
            $query = mysqli_query($con, "INSERT INTO user (username, email, password, level,id_user, foto) VALUES('$_POST[username]','$_POST[email]','$password','$_POST[level]','$id_user','avatar.png')");
            if ($query) {
                echo "<script type='text/JavaScript'>
                alert('Berhasil ditambahkan');
                document.location='pelatih_akun.php';
                </script>";
            }else{
                echo "gagal";
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Akun Pelatih</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['assets/css/fonts.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/azzara.min.css">


</head>

<body>
    <div class="wrapper">

        <!-- header -->
        <?= include "layout/header.php"; ?>
        <!-- sidebar -->
        <?= include "layout/sidebar.php"; ?>


   <!-- content  -->
   <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="page-title">Tambah Akun </h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-lg-6" style="margin: 0 auto;">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" required name="username" id="" class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" required name="email" id="" class="form-control form-control-sm">
                                        </div>

                                       <div class="form-group">
                                         <label for="">Level</label>
                                         <select class="form-control form-control-sm" name="level" id="" required >
                                             <option value=""></option>
                                           <option value="1">Pelatih</option>
                                           <option value="4">Ketua SSB</option>
                                         </select>
                                       </div>

                                    </div>
                                </div>
                                <br>
                                <div class="col-lg-6 text-right" style="margin: 0 auto;">
                                    <button type="submit" name="submit" class="btn  btn-sm btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end content  -->

        </div>
    </div>


    <!-- script  -->
    <?= include "layout/script.php"; ?>
</body>

</html>