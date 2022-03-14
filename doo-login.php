<?php
session_name('klinik');
session_start();

include 'koneksi.php';

$username=$_REQUEST['usernm'];
$password=$_REQUEST['passw'];

$sql = "select * from userr where username='$username' and password=('$password')";
$stmt = $connect->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();

$v = $stmt->fetch();

if($v){
	$_SESSION["usernm"] = $v->username;
	$_SESSION["level"] = $v->level;
	// jika user ketemu
	if(($_SESSION["level"] == "admin")|| ($_SESSION["level"] == "superadmin")) { 
			header("Location:home-admin.php?module=daftar-pasien");
		} 
	if(($_SESSION["level"] == "dokter1") || ($_SESSION["level"] == "dokter2")) { 
			header("Location:home-admin.php?module=tindakan-pasien");
		} 
	//if($_SESSION["level"] == "dokter2") { 
			//header("Location:home-admin.php?module=tindakan-pasien2");
		//} 
	if($_SESSION["level"] == "apoteker") { 
			header("Location:home-admin.php?module=apoteker");
		} 
}else{
	// jika user tidak ketemu
	$_SESSION['level'] = "";
	header("Location:login.php");
}
?>