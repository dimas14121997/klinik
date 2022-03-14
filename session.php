<?php
session_name('klinik');
session_start();

if (!isset($_SESSION['id_user'])) {
	header('Location:login.php');
}
?>