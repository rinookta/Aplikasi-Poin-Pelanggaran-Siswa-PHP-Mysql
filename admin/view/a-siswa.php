<?php 
if(isset($_GET['q'])){
  $poskelas=mysqli_query($con,"SELECT * FROM kelas where c_kelas='$_GET[q]' ");$dkelas=mysqli_fetch_array($poskelas); 
}
?>
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='edit'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Siswa Berhasil Diedit
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='hapus'){?>
          <div style="display: none;" class="alert alert-danger alert-dismissable">Siswa Berhasil Dihapus
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header with-border">
            <?php if(isset($_GET['q'])){ ?>
              <h3 class="box-title"></span>&nbsp;Seluruh Siswa Kelas <?php echo $dkelas['kelas']; ?></h3><span style="float:right;"><a href="<?php echo $basead; ?>addsiswa/<?php echo $_GET['q']; ?>" class="btn btn-circle btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Siswa</a></span>
            <?php }else{?>
              <h3 class="box-title"></span>&nbsp;Seluruh Siswa</h3>
            <?php } ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                <?php if(empty($_GET['q'])){
                  echo '<th width="12%">KELAS</th>';
                } ?>
                  <th>NISN</th>
                  <th>NAMA</th>
                  <th width="25%">OPSI</th>
                  <th width="5%">POIN</th>
                </tr>
                </thead>
                <tbody>
<?php
if(isset($_GET['q'])){
  $smk=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$_GET[q]' order by nama asc ");
}else{
  $smk=mysqli_query($con,"SELECT * FROM siswa order by nama asc ");
}             $vr=1;while($akh=mysqli_fetch_array($smk)){ $kk=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kelas where c_kelas='$akh[c_kelas]' ")); $p=mysqli_fetch_array(mysqli_query($con,"SELECT sum(bobot) as p from pelanggaran where c_siswa='$akh[c_siswa]' ")); ?>                
                <tr>
                  <td><?php echo $vr; ?></td>
                <?php if(empty($_GET['q'])){
                  echo '<td>'.$kk['kelas'].'</td>';
                }?>
                  <td><?php echo $akh['nisn']; ?></td>
                  <td><a href="<?php echo $basead; ?>search/<?php echo $akh['nisn']; ?>"><?php echo $akh['nama']; ?></a></td>
                  <td>
                  <a href="<?php echo $basead; ?>orangtua/<?php echo $akh['c_siswa']; ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-user"></i> Wali Murid</a>
                  <a href="<?php echo $basead; ?>editsiswa/<?php echo $akh['c_siswa']; ?>" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-danger btn-sm" data-target="#hapus<?php echo $akh['c_siswa']; ?>" data-toggle="modal"><i class="glyphicon glyphicon-remove"></i></a>
                  <a target="_blank" class="btn bg-blue btn-sm" href="<?php echo $basead.'print/printpelsiswa?siswa='.$akh['c_siswa']; ?>"><i class="glyphicon glyphicon-print"></i> Print</a></td></td>
                  <td align="center"><a href="<?php echo $basead; ?>lihatpelanggaransiswa/<?php echo $akh['c_siswa']; ?>"><?php echo $p['p']; ?></a>
                  </td>
                </tr>
<div id="hapus<?php echo $akh['c_siswa']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Siswa</h4>
        </div>
        <div class="modal-body">
          <p>Jika Anda Menghapus Data Ini, Akan Berpengaruh Pada</p>
          <b>1. Data Wali Murid Dari Siswa (<?php echo $akh['nama']; ?>) Juga Terhapus<br>2. Data Pelanggaran Siswa (<?php echo $akh['nama']; ?>) Secara Keseluruhan Juga Terhapus</b>
        </div>
        <div class="modal-footer">
        <?php if(isset($_GET['q'])){ ?>
          <a href="<?php echo $basead; ?>a-control/<?php echo md5('hapussiswa').'/'.$akh['c_siswa']; ?>" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a> 
        <?php }else{ ?>
          <a href="<?php echo $basead; ?>a-control/<?php echo md5('hapussiswa2').'/'.$akh['c_siswa']; ?>" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a> 
        <?php } ?><button class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tutup</button>
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