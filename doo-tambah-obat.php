<?php
include 'session.php';
include 'koneksi.php';

$kode_obat=$_REQUEST['kode_obat'];
$nama_obat=$_REQUEST['nama_obat'];
$bentuk_obat=$_REQUEST['bentuk_obat'];
$tanggal_beli=$_REQUEST['tanggal_beli'];
$tgl_expired=$_REQUEST['tgl_expired'];
$aturan_pakai=$_REQUEST['aturan_pakai'];
$kegunaan=$_REQUEST['kegunaan'];

$insert = "insert into obat values('$kode_obat','$nama_obat',
		  '$bentuk_obat','$tanggal_beli','$tgl_expired','$aturan_pakai',
		  '$kegunaan')";
$stmti = $connect->prepare($insert);
$stmti->setFetchMode(PDO::FETCH_OBJ);

if ($stmti->execute()) {
	header("Location:home-admin.php?module=daftar-obat");
}else{
	header("Location:home-admin.php?module=form-tambah-obat");
}

?>