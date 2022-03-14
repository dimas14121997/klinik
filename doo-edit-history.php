<?php
include 'session.php';
require_once 'koneksi.php';

isset ($_GET['edit-history']) ? $edit=$_GET['edit-history'] : "";
$nomor=$_REQUEST['nomor'];
$id_pasien=$_REQUEST['id_pasien'];
$nama=$_REQUEST['nama'];
$nama_dokter=$_REQUEST['nama_dokter'];
$tindakan=$_REQUEST['tindakan'];
$diagnosa=$_REQUEST['diagnosa'];
$obat=$_REQUEST['obat'];
$keterangan=$_REQUEST['keterangan'];

		$update = "update historry_tindakan set id_pasien ='$id_pasien', nama = '$nama',
				   nama_dokter = '$nama_dokter', tindakan = '$tindakan', diagnosa = '$diagnosa',  
				   obat = '$obat', keterangan = '$keterangan' where nomor='$nomor'";
		
		$stmte = $connect->prepare($update);
		$stmte->setFetchMode(PDO::FETCH_OBJ);
		$stmte->execute();
	
	header("Location:home-admin.php?module=history-tindakan");

?>