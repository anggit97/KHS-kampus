<?php  
	session_start();
	if (!isset($_SESSION['dosen'])) {
		header("location:../index.php");
		exit;
	}
?>