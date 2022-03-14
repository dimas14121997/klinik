<?php 
include 'session.php';
include 'koneksi.php';

$nomor=$_REQUEST['nomor'];
$sql = "insert into rekam_medis (id_pasien, nama, nama_dokter, tindakan, diagnosa, obat, keterangan) 
		select id_pasien, nama, nama_dokter, tindakan, diagnosa, obat, keterangan 
		from historry_tindakan where nomor='$nomor'";
$stmt = $connect->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();

$sqld = "delete from historry_tindakan where nomor='$nomor'";
$stmtd = $connect->prepare($sqld);
$stmtd->setFetchMode(PDO::FETCH_OBJ);
$stmtd->execute();
header("Location:home-admin.php?module=apoteker");

?>