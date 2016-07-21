

          <h1>
            <b>Ujian Mata Kuliah</b>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-pencil"></i> Ujian Matkul</a></li>
          </ol>
       
		

		<h5><b><?php echo date("l, M Y"); ?></b></h5>
		<hr>

		<h5><b>Daftar Matakuliah</b></h5>
		<p>Berikut ini adalah daftar matakuliah Universitas:
		</p>
		<br>

<!-- quick email widget -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-book"></i>
                  <h3 class="box-title">Matkul Yang Sudah Memiliki Dosen</h3>
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
                            <th>Kode Matkul</th>
                            <th>Nama Matkul</th>
                            <th>SKS</th>
                            <th>Dosen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode Matkul</th>
                            <th>Nama Matkul</th>
                            <th>SKS</th>
                            <th>Dosen</th>
                            <th align="center">Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $no = 1;  
                      $query = mysqli_query($conn,"SELECT * FROM matkul");
                      if ($query) {
                        while ($rows = mysqli_fetch_array($query)) {
                        	$val = "";
                          $nn = "";
                        	$query2 = mysqli_query($conn,"SELECT nama_dosen,a.nid,b.id_ujian FROM dosen a, ujian b WHERE a.nid=b.nid AND b.kode_matkul='$rows[kode_matkul]'");
                        	if ($query2) {
                        		if (mysqli_num_rows($query2)>0) {
                        			$rowss = mysqli_fetch_array($query2);
                        			$val   = $rowss['nama_dosen'];
                              $nn    = $rowss['nid'];
                        		}
                        	}
                      ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $rows['kode_matkul']; ?></td>
                          <td><?php echo $rows['nama_matkul']; ?></td>
                          <td><?php echo $rows['sks']; ?></td>
                          <td><?php echo $val; ?></td>
                          <td>
                          <?php  
                          if ($val == "") {
                          ?>
                          <a href="index.php?page=8&&kd_matkul=<?php echo $rows['kode_matkul']; ?>" class="btn btn-primary">Pilih Dosen Pengajar</a>
                          <?php
                          }else{
                          ?>
                          <a href="index.php?page=9&&kd_matkul=<?php echo $rows['kode_matkul']; ?>&&id_ujian=<?php echo $rowss['id_ujian']; ?>" class="btn btn-primary" style="margin-bottom:5px;">Pilih Dosen Pengajar</a>
                          <br>
                          <a href="index.php?page=10&&kd_matkul=<?php echo $rows['kode_matkul']; ?>&&id_ujian=<?php echo $rowss['id_ujian']; ?>" class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;Lihat Mahasiswa&nbsp;&nbsp;&nbsp;</a>
                          <?php

                          }
                          ?>
                          </td>
                        </tr>

                        <div class="modal fade" id="confirm-delete_<?php echo $rows['kode_matkul'] ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        Hapus Matkul
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin menghapus Matkul ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                        <a class="btn btn-danger btn-ok" id="<?php echo $rows['kode_matkul'] ;?>" href="../include/hapus_matkul.php?kd_matkul=<?php echo $rows['kode_matkul']; ?>">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                      <?php
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                
                
              </div>


<script>
  $(document).ready(function() {
      $('#table').DataTable();
  } );

  $(".btn btn-danger").click(function(e) {
      var id = $(this).attr('id');
      var modal_id = "confirm-delete_"+id;
      $("#"+modal_id).modal('hide');
    });
</script>