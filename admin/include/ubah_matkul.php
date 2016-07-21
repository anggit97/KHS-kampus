<?php  

$query = mysqli_query($conn,"SELECT * FROM matkul WHERE kode_matkul='$kd_matkul'");
if ($query) {
  $rows = mysqli_fetch_array($query);
}else echo mysqli_error($conn);

?>


          <h1>
            <b>Ubah Matkul</b>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-pencil"></i> Ubah Matkul</a></li>
          </ol>
       
		<hr>

		<h5><b><?php echo date("l, M Y"); ?></b></h5>
		<hr>

		<h5><b>Ubah Matkul</b></h5>
		<p>Isilih Form dibawah untuk dapat mengubah matkul:
		</p>
		<br>

<!-- quick email widget -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-user"></i>
                  <h3 class="box-title">Ubah Matkul</h3>
                  <?php  
                   if (isset($_SESSION['pesan']) && $_SESSION['pesan'] != "") {
                     echo $_SESSION['pesan'];
                     unset($_SESSION['pesan']);
                   }else echo "";
                  ?>
                </div>

                <a href="index.php?page=4" class="btn btn-primary btn-lg" style="margin-left:10px;"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                <div class="box-body">
                  <form action="" method="post">
                    <div class="form-group">
                      <label for="">Kode Matkul</label>
                      <input type="text" class="form-control" readonly="readonly" name="kd_matkul" id="kd_matkul" placeholder="Kode Matkul" value="<?php echo $kd_matkul; ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Nama Matkul</label>
                      <input type="text" class="form-control" name="nm_matkul" id="nm_matkul" placeholder="Nama Matkul" value="<?php echo $rows['nama_matkul']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Jumalah SKS</label>
                      <input type="number" class="form-control" name="sks" id="sks" placeholder="Jumlah SKS" min="0" value="<?php echo $rows['sks']; ?>">
                    </div>
                </div>
                
                <div class="box-footer clearfix">
                  <button class="pull-right btn btn-primary" name="simpan">Simpan <i class="fa fa-arrow-circle-right"></i></button>
                  </form>
                </div>
              </div>

<?php 

  
  if (isset($_POST['simpan'])) {
    foreach ($_POST as $key => $value) {
      ${$key} = $value;
    }
    
    if ($nm_matkul == "" || $sks == "") {
      $_SESSION['pesan'] = "<div class='alert alert-danger' style='margin-top:5px;'>
                                <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                Tidak Boleh Ada Field yang Kosong!
                              </div>";
      echo "<script>window.location = 'index.php?page=5'</script>";
    }else{
      $query = mysqli_query($conn,"UPDATE matkul SET nama_matkul='$nm_matkul',sks='$sks' WHERE kode_matkul='$kd_matkul'");
      if ($query) {
        $_SESSION['pesan'] = "<div class='alert alert-success' style='margin-top:5px;'>
                                <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                Berhasil Ubah Matkul!
                              </div>";
        echo "<script>window.location = 'index.php?page=6&&kd_matkul=$kd_matkul'</script>";
      }else{
        $_SESSION['pesan'] = "<div class='alert alert-danger' style='margin-top:5px;'>
                                <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                Gagal Input Matkul!
                              </div>";
        echo "<script>window.location = 'index.php?page=6&&kd_matkul=$kd_matkul'</script>";
      }
    }
  }

?>
