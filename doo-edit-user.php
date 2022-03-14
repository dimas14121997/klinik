<?php
include 'session.php';
require_once 'koneksi.php';

isset ($_GET['edit-user']) ? $edit=$_GET['edit-user'] : "";
$id_user = $_REQUEST['id_user'];
$nama = $_REQUEST['nama_user'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$level = $_REQUEST['level'];

		$update = "update userr set nama = '$nama',
		username = '$username', password = '$password', level = '$level' 
		where id_user='$id_user'";
		
		$stmte = $connect->prepare($update);
		$stmte->setFetchMode(PDO::FETCH_OBJ);
		$stmte->execute();
	
	header("Location:home-admin.php?module=daftar-user");

?>