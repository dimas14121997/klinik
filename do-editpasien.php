<?php
include 'session.php';
require_once 'koneksi.php';

isset ($_GET['edit-pasien']) ? $edit=$_GET['edit-pasien'] : "";
$id_pasien = $_REQUEST['id_pasien'];
$nama = $_REQUEST['nama_pasien'];
$tanggal_daftar = $_REQUEST['tanggal_daftar'];
$tanggal_lahir = $_REQUEST['tanggal_lahir'];
$alamat = $_REQUEST['alamat'];
$keterangan = $_REQUEST['keterangan'];
$nama_dokter= $_REQUEST['dokter-pemeriksa'];
$nama_wilayah=$_REQUEST['pilih_wilayah'];
	

		$update = "update daftar_pasienn set nama = '$nama',
		tanggal_daftar = '$tanggal_daftar', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', 
		keterangan = '$keterangan', nama_dokter = '$nama_dokter',wilayah='$nama_wilayah' where id_pasien='$id_pasien'";
		
		$stmte = $connect->prepare($update);
		$stmte->setFetchMode(PDO::FETCH_OBJ);
		$stmte->execute();
	
	header("Location:home-admin.php?module=daftar-pasien");

?>