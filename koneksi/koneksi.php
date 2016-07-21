<?php  
/*
Atur Database disini
*/
$host 	  = "localhost";
$username = "root";
$password = "";
$database = "khs";

$conn	  = new mysqli($host,$username,$password,$database) or die("Gagal Konek database");

?>