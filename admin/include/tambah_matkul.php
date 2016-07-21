
          <h1>
            <b>Tambah Matkul</b>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-user"></i> Tambah Matkul</a></li>
          </ol>
       
		<hr>

		<h5><b><?php echo date("l, M Y"); ?></b></h5>
		<hr>
    <a href="index.php?page=4" class="btn btn-primary btn-lg" style="margin-right:10px;float:right;"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                
		<h5><b>Tambah Matkul</b></h5>
		<p>Isilih Form dibawah untuk dapat menambah matkul:
		</p>
		<br>


<!-- quick email widget -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-user"></i>
                  <h3 class="box-title">Tambah Matkul</h3>
                  <?php  
                   if (isset($_SESSION['pesan']) && $_SESSION['pesan'] != "") {
                     echo $_SESSION['pesan'];
                     unset($_SESSION['pesan']);
                   }else echo "";
                  ?>
                </div>

                <?php  
                  $query="select * from matkul order by kode_matkul desc limit 1";
                  $baris=mysqli_query($conn,$query);
                  if($baris){
                    if(mysqli_num_rows($baris)>0){
                      $auto=mysqli_fetch_array($baris);
                      $kode=$auto['kode_matkul'];
                      $baru=substr($kode,2,3);
                        $nol=(int)$baru;
                    } 
                    else{
                      $nol=0;
                      }
                    $nol=$nol+1;
                    $nol2="";
                    $nilai=3-strlen($nol);
                    for ($i=1;$i<=$nilai;$i++){
                      $nol2= $nol2."0";
                      }

                      $kode2 ="KP".$nol2.$nol;
                      
                  }
                  else{
                  echo mysqli_error();
                  }

                ?>

                <div class="box-body">
                  <form action="" method="post">
                    <div class="form-group">
                      <label for="">Kode Matkul</label>
                      <input type="text" class="form-control" readonly="readonly" name="kd_matkul" id="kd_matkul" placeholder="Kode Matkul" value="<?php echo $kode2; ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Nama Matkul</label>
                      <input type="text" class="form-control" name="nm_matkul" id="nm_matkul" placeholder="Nama Matkul">
                    </div>
                    <div class="form-group">
                      <label for="">Jumalah SKS</label>
                      <input type="number" class="form-control" name="sks" id="sks" placeholder="Jumlah SKS" min="0" value="0">
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
      $query = mysqli_query($conn,"INSERT INTO matkul VALUES('$kd_matkul','$nm_matkul','$sks')");
      if ($query) {
        $_SESSION['pesan'] = "<div class='alert alert-success' style='margin-top:5px;'>
                                <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                Berhasil Input Matkul!
                              </div>";
        echo "<script>window.location = 'index.php?page=5'</script>";
      }else{
        $_SESSION['pesan'] = "<div class='alert alert-danger' style='margin-top:5px;'>
                                <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                Gagal Input Matkul!
                              </div>";
        echo "<script>window.location = 'index.php?page=5'</script>";
      }
    }
  }

?>
