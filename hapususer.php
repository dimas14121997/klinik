<?php 
include 'session.php';
include 'koneksi.php';

$id_user=$_REQUEST['id_user'];

$sql = "delete from userr where id_user='$id_user'";
$stmt = $connect->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();

header("Location:home-admin.php?module=daftar-user");
?>