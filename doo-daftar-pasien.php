<?php
include 'session.php';
include 'koneksi.php';

$nomor_pendaftaran=$_REQUEST['nomor_pendaftaran'];
$nama_pasien=$_REQUEST['nama_pasien'];
$tanggal=$_REQUEST['tanggal'];
$tgl_lahir=$_REQUEST['tgl_lahir'];
$alamat=$_REQUEST['alamat'];
$keterangan=$_REQUEST['keterangan'];
$dokter_pemeriksa=$_REQUEST['dokter-pemeriksa'];
$nama_wilayah=$_REQUEST['pilih_wilayah'];

$insert = "insert into daftar_pasienn values('null','$nama_pasien','$tanggal','$tgl_lahir','$alamat','$keterangan','$dokter_pemeriksa','$nama_wilayah')";
$stmti = $connect->prepare($insert);
$stmti->setFetchMode(PDO::FETCH_OBJ);
$stmti->execute();

header("Location:home-admin.php?module=daftar-pasien")
?>