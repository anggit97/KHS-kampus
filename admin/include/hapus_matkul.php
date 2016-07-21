<?php 
session_start();
include '../../koneksi/koneksi.php'; 
if (isset($_GET['kd_matkul'])) {
	$kd_matkul = $_GET['kd_matkul'];
	$query = mysqli_query($conn,"DELETE FROM matkul WHERE kode_matkul='$kd_matkul'");
	if ($query) {
		$_SESSION['pesan'] = "<div class='alert alert-success' style='margin-top:5px;'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                Berhasil Hapus Matkul!
                              </div>";
        echo "<script>window.location = '../dashboard/index.php?page=4'</script>";
                              echo $_SESSION['pesan'];
	}else{
		$_SESSION['pesan'] = "<div class='alert alert-danger' style='margin-top:5px;'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                Gagal Input Matkul!
                              </div>";
       	echo "<script>window.location = '../dashboard/index.php?page=4'</script>";                
	}
}
?>