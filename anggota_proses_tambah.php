<?php
include "conn.php";
include "assets/phpqrcode/qrlib.php";

session_start();
$id_user=$_SESSION['id_user'];

$tempdir = "img/qrcode/"; //Nama folder tempat menyimpan file qrcode
if (!file_exists($tempdir)) {
    
    mkdir($tempdir);
} //Buat folder bername temp

//isi qrcode jika di scan
$codeContents = $_POST['nama_lengkap'];
//nama file qrcode yang akan disimpan
$namaFile = "QRCode_".$_POST['nama_lengkap'].".png";
//ECC Level
$level = QR_ECLEVEL_H;
//Ukuran pixel
$UkuranPixel = 6;
//Ukuran frame
$UkuranFrame = 3;

QRcode::png($codeContents, $tempdir . $namaFile, $level, $UkuranPixel, $UkuranFrame);


$nama_lengkap = ucwords($_POST['nama_lengkap']);
$nama_panggilan = ucwords($_POST['nama_panggilan']);
$nisn = $_POST['nisn'];
$tempat_lahir = strtoupper($_POST['tempat_lahir']);
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat =$_POST['alamat'];
$no_tlp = $_POST['no_tlp'];
$sekolah = strtoupper( $_POST['sekolah']);
$anak_ke = $_POST['anak_ke'];
$jumlah_saudara = $_POST['jumlah_saudara'];
$nama_ayah = ucwords($_POST['nama_ayah']);
$pendidikan_ayah = $_POST['pendidikan_ayah'];
$pekerjaan_ayah = ucwords($_POST['pekerjaan_ayah']);
$nama_ibu = ucwords($_POST['nama_ibu']);
$pendidikan_ibu = $_POST['pendidikan_ibu'];
$pekerjaan_ibu = ucwords($_POST['pekerjaan_ibu']);
$upload_berhasil = 1;


 
// akta kelahiran 
$dir_akta = "img/anggota/akta/";

$target_akta = $dir_akta . basename($_FILES["akta_kelahiran"]["name"]);
$nama_akta = basename($_FILES["akta_kelahiran"]["name"]);
move_uploaded_file($_FILES["akta_kelahiran"]["tmp_name"], $target_akta);

// kartu keluarga 
$dir_kk = "img/anggota/kk/";
$target_kk = $dir_kk . basename($_FILES["kartu_keluarga"]["name"]);
$nama_kk = basename($_FILES["kartu_keluarga"]["name"]);
move_uploaded_file($_FILES["kartu_keluarga"]["tmp_name"], $target_kk);

// ijazah 
$dir_ijazah = "img/anggota/ijazah/";

$target_ijazah = $dir_ijazah . basename($_FILES["ijazah_terakhir"]["name"]);
$nama_ijazah = basename($_FILES["ijazah_terakhir"]["name"]);
move_uploaded_file($_FILES["ijazah_terakhir"]["tmp_name"], $target_ijazah);



   

if ($upload_berhasil = 1) {

        $simpan = mysqli_query($con, "INSERT INTO anggota(nama_lengkap,nama_panggilan,nisn,tempat_lahir,tanggal_lahir,alamat,no_tlp,sekolah,anak_ke,jumlah_saudara,nama_ayah,pendidikan_ayah,pekerjaan_ayah,nama_ibu,pendidikan_ibu,pekerjaan_ibu,posisi,akta_kelahiran,kartu_keluarga,ijazah_terakhir,id_user,qrcode,created) VALUES('$nama_lengkap','$nama_panggilan','$nisn','$tempat_lahir','$tanggal_lahir','$alamat','$no_tlp','$sekolah','$anak_ke','$jumlah_saudara','$nama_ayah','$pendidikan_ayah','$pekerjaan_ayah','$nama_ibu','$pendidikan_ibu','$pekerjaan_ibu','$_POST[posisi]','$nama_akta','$nama_kk','$nama_ijazah','$id_user','$namaFile',curdate())");

        if($simpan){
            echo "<script type='text/JavaScript'>
        alert('Pendaftaran Berhasil');
        document.location='status_keanggotaan.php';
    </script>";
        }else{
            echo "<script type='text/JavaScript'>
            alert('Pendaftaran Gagal');histori.go(-1);
        </script>";
        }
    }