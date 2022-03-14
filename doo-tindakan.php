<?php
include 'session.php';
include 'koneksi.php';

$id_pasien=$_REQUEST['id_pasien'];
$nama=$_REQUEST['nama'];
$nama_dokter=$_REQUEST['nama_dokter'];
$tindakan=$_REQUEST['tindakan'];
$diagnosa=$_REQUEST['diagnosa'];
$obat=$_REQUEST['obat'];
$keterangan=$_REQUEST['keterangan'];

$insert = "insert into historry_tindakan values('null','$id_pasien','$nama', 
		   '$nama_dokter','$tindakan','$diagnosa','$obat','$keterangan')";
$stmti = $connect->prepare($insert);
$stmti->setFetchMode(PDO::FETCH_OBJ);
$stmti->execute();

$update = "UPDATE daftar_pasienn SET keterangan = '', nama_dokter = '' WHERE id_pasien = '$id_pasien'";
$stmtd = $connect->prepare($update);
$stmtd->setFetchMode(PDO::FETCH_OBJ);
$stmtd->execute();
header("Location:home-admin.php?module=history-tindakan")
?>