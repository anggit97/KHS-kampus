

          <h1>
            <b>Mata Kuliah</b>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-user"></i>Matkul</a></li>
          </ol>
       
		

		<h5><b><?php echo date("l, M Y"); ?></b></h5>
		<hr>

		<h5><b>Daftar Matakuliah</b></h5>
		<p>Berikut ini adalah daftar matakuliah anda pada semester ini:
		</p>
		<br>

<!-- quick email widget -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-pencil"></i>
                  <h3 class="box-title">Matkul</h3>
                  <!-- tools box -->
                      
                </div>
                
                <?php  
                   if (isset($_SESSION['pesan']) && $_SESSION['pesan'] != "") {
                     echo $_SESSION['pesan'];
                     unset($_SESSION['pesan']);
                   }else echo "";
                ?>


                <div class="box-body">

                <table id="table" class="row-border" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama Matkul</th>
                          <th>Tgl.Ujian</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                          <th>No</th>
                          <th>Nama Matkul</th>
                          <th>Tgl.Ujian</th>
                      </tr>
                  </tfoot>
                  <tbody>
                    <?php  
                      $query = mysqli_query($conn,"SELECT DISTINCT kode_matkul,tgl_ujian FROM ujian where nid=$nid");
                      if ($query) {
                        if (mysqli_num_rows($query)>0) {
                          $no = 1;
                          while ($rows = mysqli_fetch_array($query)) {
                            $kd_matkul = $rows['kode_matkul'];
                            
                            $query_nma = mysqli_query($conn,"SELECT DISTINCT * FROM matkul where kode_matkul = '$rows[kode_matkul]'");
                            if ($query_nma) {
                              
                              while ($rowss = mysqli_fetch_array($query_nma)) {
                    ?>
                                <tr>
                                  <td><h4><?php echo $no; ?></h4></td>
                                  <td><h4><a href="index.php?page=7&&kode_matkul=<?php echo $kd_matkul; ?>"><?php echo $rowss['nama_matkul']; ?></a></h4></td>
                                  <td><h4><a href="#" data-toggle="modal" data-tt="tooltip" title="Klik untuk mengubah Tanggal Ujian!" data-target="#confirm-edit_<?php echo $rows['kode_matkul']; ?>"><?php echo $rows['tgl_ujian']; ?></a></h4></td>
                                </tr>

                                <div class="modal fade" id="confirm-edit_<?php echo $rows['kode_matkul'] ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                Ubah Tanggal Ujian
                                            </div>
                                            <div class="modal-body">
                                                <form action="../include/ubah_tgl_ujian.php" method="post">
                                                  <div class="form-group">
                                                    <label for="">Kode Matkul</label>
                                                    <input type="text" class="form-control" name="kd_matkul" readonly="readonly" value="<?php echo $rows['kode_matkul']; ?>" placeholder="Kode Matkul">  
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="">Nama Matkul</label>
                                                    <input type="text" class="form-control" name="nm_matkul" readonly="readonly" value="<?php echo $rowss['nama_matkul']; ?>" placeholder="Nama Matkul">  
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="">Tanggal Ujian</label>
                                                    <input type="date" class="form-control" name="tgl_ujian" value="<?php echo $rows['tgl_ujian']; ?>" placeholder="Tanggal Ujian">  
                                                  </div> 
                                            </div>
                                            <div class="modal-footer">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                  <button name="ubahTgl" class="btn btn-primary"><i class="fa fa-pencil"></i> Ubah Tanggal Ujian</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php
                                $no++;
                              }
                            }else echo mysqli_error($conn);
                          }

                        }else echo "<center><h4>Tidak ada mata kuliah Semester ini</h4></center>";
                      }else echo mysqli_error($conn);
                    ?>
                    </tbody>
                  </table>
                </div>
                
                <div class="box-footer clearfix">
                  <button class="pull-right btn btn-primary" id="sendEmail">Simpan <i class="fa fa-arrow-circle-right"></i></button>
                </div>
              </div>


<script>
  $(document).ready(function() {
      $('#table').DataTable();
  } );

   $(".btn btn-danger").click(function(e) {
      var id = $(this).attr('id');
      var modal_id = "confirm-edit_"+id;
      $("#"+modal_id).modal('hide');
    });

   $(document).ready(function(){
        $('[data-tt="tooltip"]').tooltip(); 
    });
</script>