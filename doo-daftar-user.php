<?php
include 'session.php';
include 'koneksi.php';

$nomor_pendaftaran=$_REQUEST['nomor_pendaftaran'];
$nama_user=$_REQUEST['nama_user'];
$username=$_REQUEST['username'];
$password=$_REQUEST['password'];
$level=$_REQUEST['level'];

$insert = "insert into userr values('null','$nama_user','$username','$password','$level')";
$stmti = $connect->prepare($insert);
$stmti->setFetchMode(PDO::FETCH_OBJ);
$stmti->execute();

header("Location:home-admin.php?module=daftar-user")
?>