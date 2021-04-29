
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
              <h3 class="box-title">&nbsp;History Input Pelanggaran Siswa</h3><span class="pull-right"><a href="<?php echo $basegu; ?>inputpelanggaran" class="btn bg-navy btn-sm"><i class="glyphicon glyphicon-plus"></i> Input Pelanggaran</a> <a target="_blank" class="btn bg-blue btn-sm" href="<?php echo $basegu.'print/printpelguru?guru='.$_SESSION['c_guru'].''; ?>"><i class="glyphicon glyphicon-print"></i> Print</a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="1%">NO</th>
                  <th>NAMA SISWA</th>
                  <th width="40%">BENTUK PELANGGARAN</th>
                  <th width="1%">B</th>
                  <th width="10%">PADA</th>
                  <th>OPSI</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM pelanggaran where c_guru='$_SESSION[c_guru]' order by at desc ");$vr=1;while($akh=mysqli_fetch_array($smk)){
$sis=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa where c_siswa='$akh[c_siswa]' "));
$kel=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kelas where c_kelas='$akh[c_kelas]' "));
$ben=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM benpel where c_benpel='$akh[c_benpel]' "));
?>
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $sis['nama']; ?><br>(<?php echo $kel['kelas']; ?>)</td>
                  <td><?php echo $ben['benpel']; ?></td>
                  <td><?php echo $akh['bobot']; ?></td>
                  <td><?php echo date("d/m/Y", strtotime($akh['at'])); ?></td>
                  <td align="center">
                  <a class="btn btn-danger btn-sm" data-target="#hapus<?php echo $akh['c_pelanggaran']; ?>" data-toggle="modal"><i class="glyphicon glyphicon-remove"></i></a></td>
                </tr>
<div id="hapus<?php echo $akh['c_pelanggaran']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Pelanggaran Siswa</h4>
        </div>
        <div class="modal-footer">
          <a href="<?php echo $basegu; ?>g-control/<?php echo md5('hapuspel').'/'.$akh['c_pelanggaran'];?>" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a> 
          <button class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tutup</button>
        </div>
        </div>
    </div>
</div>
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