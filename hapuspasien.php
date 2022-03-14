<?php 
include 'session.php';
include 'koneksi.php';

$id_pasien=$_REQUEST['id_pasien'];

$sql = "delete from daftar_pasienn where id_pasien='$id_pasien'";
$stmt = $connect->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();

header("Location:home-admin.php?module=daftar-pasien");
?>