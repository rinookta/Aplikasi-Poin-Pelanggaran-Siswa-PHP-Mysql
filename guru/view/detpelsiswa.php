<?php $sis=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa where c_siswa='$_GET[q]' ")); ?>
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='hapus'){?>
          <div style="display: none;" class="alert alert-danger alert-dismissable">Pelanggaran Siswa Berhasil Dihapus
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header  with-border">
              <h3 class="box-title">&nbsp;Seluruh Pelanggaran Siswa (<?php echo $sis['nama']; ?>)</h3><p class="pull-right"><a target="_blank" class="btn bg-blue btn-sm" href="<?php echo $basegu.'print/printpelsiswa?siswa='.$_GET['q'].''; ?>"><i class="glyphicon glyphicon-print"></i> Print</a></p>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="1%">NO</th>
                  <th width="50%">BENTUK PELANGGARAN</th>
                  <th width="10%">BOBOT</th>
                  <th>PADA</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM pelanggaran where c_siswa='$_GET[q]' order by at desc ");$vr=1;while($akh=mysqli_fetch_array($smk)){
$kel=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kelas where c_kelas='$akh[c_kelas]' "));
$gur=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM guru where c_guru='$akh[c_guru]' "));
$ben=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM benpel where c_benpel='$akh[c_benpel]' "));
?>
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $ben['benpel']; ?></td>
                  <td><?php echo $akh['bobot']; ?></td>
                  <td><?php echo date("d/m/Y", strtotime($akh['at'])); ?></td>
                </tr>
<?php $vr++; } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->