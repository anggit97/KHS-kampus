

          <h1>
            <b>Mahasiswa</b>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-user"></i>Mahasiswa</a></li>
          </ol>
       
		

		<h5><b><?php echo date("l, M Y"); ?></b></h5>
		<hr>

		<h5><b>Daftar Mahasiswa</b></h5>
		<p>Berikut ini adalah daftar mahasiswa Universitas:
		</p>
		<br>

<!-- quick email widget -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-pencil"></i>
                  <h3 class="box-title">Mahasiswa</h3>
                  <!-- tools box -->
                      
                </div>
                
                <?php  
                   if (isset($_SESSION['pesan']) && $_SESSION['pesan'] != "") {
                     echo $_SESSION['pesan'];
                     unset($_SESSION['pesan']);
                   }else echo "";
                ?>

                <div class="box-body">
                  
                  <a href="index.php?page=13" class="btn-primary btn btn-lg" style="margin-bottom:15px;"><i class="fa fa-plus"></i> Tambah Mahasiswa</a>

                  <table id="table" class="row-border" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>JK</th>
                            <th>TTL</th>
                            <th>Agama</th>
                            <th>Ortu</th>
                            <th>Alamat</th>
                            <th>Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>JK</th>
                            <th>TTL</th>
                            <th>Agama</th>
                            <th>Ayah</th>
                            <th>Alamat</th>
                            <th>Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $no = 1;  
                      $query = mysqli_query($conn,"SELECT * FROM mahasiswa");
                      if ($query) {
                        while ($rows = mysqli_fetch_array($query)) {
                      ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $rows['nim']; ?></td>
                          <td><?php echo $rows['nama_mhs']; ?></td>
                          <td><?php echo $rows['jk']; ?></td>
                          <td><?php echo $rows['tempat_lahir']; ?>, <?php echo $rows['tgl_lahir']; ?></td>
                          <td><?php echo $rows['agama']; ?></td>
                          <td><?php echo $rows['nama_ortu']; ?></td>
                          <td><?php echo $rows['alamat']; ?></td>
                          <td><?php echo $rows['telp']; ?></td>
                          <td><a class="btn btn-success btn-sm" href="index.php?page=14&&nim=<?php echo $rows['nim']; ?>" style="margin-bottom:5px;">&nbsp;UBAH&nbsp;&nbsp;</a>  <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#confirm-delete_<?php echo $rows['nim']; ?>">HAPUS</a></td>
                        </tr>

                        <div class="modal fade" id="confirm-delete_<?php echo $rows['nim'] ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        Hapus Data Mahasiswa
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin menghapus data Mahasiswa ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                        <a class="btn btn-danger btn-ok" id="<?php echo $rows['nim'] ;?>" href="../include/hapus_mahasiswa.php?nim=<?php echo $rows['nim']; ?>">Hapus</a>
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