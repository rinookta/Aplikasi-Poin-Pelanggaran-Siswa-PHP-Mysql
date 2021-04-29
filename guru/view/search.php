<?php if(isset($_GET['q'])){ $s=str_replace("_", " ", $_GET['q']); }else{$s='@';}
$sea=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa where nisn='$s' or nama like'%$s%' ")); $kelas=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kelas where c_kelas='$sea[c_kelas]' ")); $pel=mysqli_num_rows(mysqli_query($con,"SELECT * FROM pelanggaran where c_siswa='$sea[c_siswa]' ")); $totalpel=mysqli_fetch_array(mysqli_query($con,"SELECT sum(bobot) as total FROM pelanggaran where c_siswa='$sea[c_siswa]' ")); $wali=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM orangtua where c_siswa='$sea[c_siswa]' ")); ?>
<div class="judul">Hasil Pencarian Dari <?php echo $s.' '; if($sea==NULL){echo 'Tidak Ada Data';} ?> </div>
<?php if($sea!=NULL and isset($_GET['q'])){ ?>
<div class="row">
  <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
    <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-green">
        <div class="widget-user-image">
          <img class="img-circle" src="<?php echo $base; ?>php/img/siswa.png" alt="User Avatar">
        </div>
              <!-- /.widget-user-image -->
        <h4 class="widget-user-username" style="font-size: 20px;"><?php echo $sea['nama']; ?></h4>
        <h5 class="widget-user-desc"><?php echo $kelas['kelas']; ?></h5>
        <h5 class="widget-user-desc"><?php echo $sea['alamat'].', '.tgl($sea['tl']); ?></h5>
        <h5 class="widget-user-desc"><?php if($sea['jk']=='L'){echo 'Laki - Laki';}elseif($sea['jk']=='P'){echo 'Perempuan';} ?></h5>
      </div>
      <div class="box-footer no-padding">
        <ul class="nav nav-stacked">
          <li><a>Total Pelanggaran <span style="font-size: 20px;margin-top:-3px;color: #428bca;" class="pull-right"><?php echo $pel; ?></span></a><li>
          <li><a>Poin Pelanggaran <span style="font-size: 20px;margin-top:-3px;color: #d9534f;" class="pull-right"><?php if($totalpel['total']>0){echo $totalpel['total'];}else{echo "0";} ?></span></a></li>
          <li><a>Wali Murid <span class="pull-right"><?php if($wali['nama']==NULL){echo '-';}else{ echo $wali['nama'];} ?></span></a><li>
        </ul>
      </div>
    </div>
          <!-- /.widget-user -->
  </div>
  <div class="col-xs-12 col-md-8 col-lg-8">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">&nbsp;Pelanggaran <?php echo $sea['nama'] ?></h3><span class="pull-right"><a target="_blank" class="btn bg-blue btn-sm" href="<?php echo $basegu.'print/printpelsiswa?siswa='.$sea['c_siswa']; ?>"><i class="glyphicon glyphicon-print"></i> Print</a></span>
      </div>
      <div class="box-body">
        <table id="example3" class="table table-hover">
          <thead>
            <tr><b>
              <td>NO</td>
              <td>PELANGGARAN</td>
              <td>B</td>
              <td>OLEH</td>
              </b><td>PADA</td>
            </tr>
          </thead>
          <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM pelanggaran where c_siswa='$sea[c_siswa]' order by at desc ");$vr=1;while($akh=mysqli_fetch_array($smk)){
$gur=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM guru where c_guru='$akh[c_guru]' "));
$ben=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM benpel where c_benpel='$akh[c_benpel]' "));
?>                
            <tr>
              <td><?php echo $vr; ?></td>
              <td><?php echo $ben['benpel']; ?></td>
              <td><?php echo $ben['bobot']; ?></td>
              <td><?php echo $gur['nama']; ?></td>
              <td><?php echo date("d/m/Y", strtotime($akh['at'])); ?></td>
            </tr>
<?php $vr++; } ?>
          </tbody>
        </table>
      </div>
            <!-- /.box-body -->
  </dsiv>
</div>
</div>
<?php } ?>
