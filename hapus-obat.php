<?php 
include 'session.php';
include 'koneksi.php';


$kode_obat = $_REQUEST["kode_obat"];
$sql = "delete from obat where kode_obat='$kode_obat'";
$stmt = $connect->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();

header("Location:home-admin.php?module=daftar-obat");
?>