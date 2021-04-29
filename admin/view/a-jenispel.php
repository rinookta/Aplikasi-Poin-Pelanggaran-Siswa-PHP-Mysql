    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='edit'){?>
          <div style="display: none;" class="alert alert-info alert-dismissable">Jenis Pelanggaran Berhasil Diedit
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='tambah'){?>
          <div style="display: none;" class="alert alert-warning alert-dismissable">Jenis Pelanggaran Berhasil Disimpan
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='hapus'){?>
          <div style="display: none;" class="alert alert-danger alert-dismissable">Jenis Pelanggaran Telah Dihapus
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></span>&nbsp;Menampilkan Kategori Pelanggaran</h3><span style="float:right;"><a class="btn btn-circle btn-primary btn-sm" data-target="#tambah" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Tambah Jenis Pelanggaran</a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>KATEGORI PELANGGARAN</th>
                  <th>BENTUK PELANGGARAN</th>
                  <th style="text-align:center;">OPSI</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM katbenpel order by katbenpel asc ");$vr=1;while($akh=mysqli_fetch_array($smk)){ $jben=mysqli_num_rows(mysqli_query($con,"SELECT * FROM benpel where c_katbenpel='$akh[c_katbenpel]' ")); ?>
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['katbenpel']; ?></td>
                  <td><?php echo $jben; ?></td>
                  <td align="center">
                  <a class="btn btn-info btn-sm" href="<?php echo $basead; ?>bentukpelanggaran/<?php echo $akh['c_katbenpel']; ?>"><i class="glyphicon glyphicon-stats"></i> Bentuk Pelanggaran</a>
                  <a class="btn btn-success btn-sm" data-target="#edit<?php echo $akh['c_katbenpel']; ?>" data-toggle="modal"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-danger btn-sm" data-target="#hapus<?php echo $akh['c_katbenpel']; ?>" data-toggle="modal"><i class="glyphicon glyphicon-remove"></i></a>
                </tr>
<div id="edit<?php echo $akh['c_katbenpel']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit jenis Pelanggaran</h4>
        </div>
        <form action="<?php echo $basead; ?>a-control/<?php echo md5('editjenispelanggaran'); ?>/access" method="post">
        <input type="hidden" name="c_katbenpel" value="<?php echo $akh['c_katbenpel']; ?>">
        <div class="modal-body">
          <div class="form-group">
            <label>JENIS BENTUK PELANGGARAN</label>
            <input type="text" name="katbenpel" class="form-control" value="<?php echo $akh['katbenpel']; ?>">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Simpan</button>
          <a class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tutup</a>
        </div>
        </form>
        </div>
    </div>
</div>
<!-- hapus kelas-->
<div id="hapus<?php echo $akh['c_katbenpel']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Kategori Pelanggaran</h4>
        </div>
        <div class="modal-body">
          <p>Jika Anda Menghapus Data ini, Akan Berpengaruh Pada</p>
          <b>1. Data Bentuk Pelanggaran Dari <?php echo $akh['katbenpel']; ?> Juga Terhapus<br>2. Data Pelanggaran Siswa Dari <?php echo $akh['katbenpel']; ?> Secara Keseluruhan Juga Terhapus</b>
        </div>
        <div class="modal-footer">
          <a href="<?php echo $basead; ?>a-control/<?php echo md5('hapuskatbenpel').'/'.$akh['c_katbenpel']; ?>" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a>
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
<div id="tambah" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style="width:50%;">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Tambah Jenis Pelanggaran</h4>
        </div>
        <form action="<?php echo $basead; ?>a-control/<?php echo md5('addjenispelanggaran'); ?>/access" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>JENIS BENTUK PELANGGARAN</label>
            <input type="text" name="katbenpel" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Simpan</button>
          <a class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tutup</a>
        </div>
        </form>
    </div>
</div>
</div>
