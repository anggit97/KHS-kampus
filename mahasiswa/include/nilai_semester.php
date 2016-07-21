
          <h1>
            <b>Nilai Semester</b>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-user"></i>Nilai Semester</a></li>
          </ol>
        
		

		<h5><b><?php echo date("l, M Y"); ?></b></h5>
		<hr>

		<h5><b>Nilai Semester</b></h5>
		<p>Berikut ini adalah nilai anda pada semester ini:
		</p>
		<br>

<!-- quick email widget -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-user"></i>
                  <h3 class="box-title">Nilai Semester</h3>
                  <!-- tools box -->
                  <table class="table table-hover table-striped">
                    <tr>
                      <td>No.</td>
                      <td>Kode</td>
                      <td>Matakuliah</td>
                      <td>Absen</td>
                      <td>Tugass</td>
                      <td>UTS</td>
                      <td>UAS</td>
                    </tr>
                    <?php  
                    $sqli = mysqli_query($conn, "SELECT a.*,b.* FROM ujian a, detil_ujian b where b.nim='$nim' AND a.id_ujian=b.id_ujian");
                    if ($sqli) {
                      if (mysqli_num_rows($sqli)==0) {
                    ?>
                       <tr >
                        <td colspan="5" align="center"><h1>Kosong</h1></td>
                      </tr>
                    <?php
                      }else{
                        $no = 1;
                        while ($rows = mysqli_fetch_array($sqli)) {
                        $sqli2 = mysqli_query($conn, "SELECT nama_matkul from matkul where kode_matkul='$rows[kode_matkul]'");
                        $rowss = mysqli_fetch_array($sqli2);
                    ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $rows['kode_matkul']; ?></td>
                          <td><?php echo $rowss['nama_matkul'] ?></td>
                          <td><?php echo $rows['nilai_absen'] ;?></td>
                          <td><?php echo $rows['nilai_tugas'] ?></td>
                          <td><?php echo $rows['nilai_uts'] ;?></td>
                          <td><?php echo $rows['nilai_uas'] ?></td>
                        </tr>
                    <?php
                        $no++;
                        }
                      } 
                    }
                    ?>
                    
                  </table>
                </div>
                <div class="box-body">
                  
                </div>
                
               
              </div>


<?php  
	
?>