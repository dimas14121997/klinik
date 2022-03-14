<?php
include 'session.php';
require_once 'koneksi.php';

isset ($_GET['edit-obat']) ? $edit=$_GET['edit-obat'] : "";
$kode_obat=$_REQUEST['kode_obat'];
$nama_obat=$_REQUEST['nama_obat'];
$bentuk_obat=$_REQUEST['bentuk_obat'];
$tanggal_beli=$_REQUEST['tanggal_beli'];
$tgl_expired=$_REQUEST['tgl_expired'];
$aturan_pakai=$_REQUEST['aturan_pakai'];
$kegunaan=$_REQUEST['kegunaan'];
	

		$update = "update obat set nama_obat = '$nama_obat', bentuk_obat = '$bentuk_obat',
		tanggal_beli = '$tanggal_beli', tanggal_kedalauarsa = '$tgl_expired', aturan_pakai = '$aturan_pakai',
		kegunaan = '$kegunaan' where kode_obat='$kode_obat'";
		
		$stmte = $connect->prepare($update);
		$stmte->setFetchMode(PDO::FETCH_OBJ);
		$stmte->execute();
	
	header("Location:home-admin.php?module=daftar-obat");

?>