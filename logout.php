<?php 

session_start();
//session_unregister("klinik");
session_destroy();
header("Location:login.php");
?>
