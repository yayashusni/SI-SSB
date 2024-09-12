<?php 
	include "conn.php";
	
	$i=0;
	$tampil=mysqli_query($con,"SELECT * FROM anggota WHERE id_user='$_GET[id_user]'");
	$arr = array();
	while($data=mysqli_fetch_array($tampil)){
	$i++;
 $temp = array(
	  "id_user" => $data["id_user"],
	  "nama_lengkap" => $data["nama_lengkap"],
	  "nisn" => $data["nisn"],
	  "tempat_lahir" => $data["tempat_lahir"],
	  "tanggal_lahir" => $data["tanggal_lahir"],
	  "posisi" => $data["posisi"]);
    array_push($arr, $temp);
}
 

$data = json_encode($arr);
 
echo "$data";
	
	
		?>