    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='edit'){?>
          <div style="display: none;" class="alert alert-info alert-dismissable">Kategori Pelanggaran Berhasil Diedit
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='tambah'){?>
          <div style="display: none;" class="alert alert-warning alert-dismissable">Kategori Pelanggaran Berhasil Disimpan
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='hapus'){?>
          <div style="display: none;" class="alert alert-danger alert-dismissable">Kategori Pelanggaran Telah Dihapus
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></span>&nbsp;Sanksi Pelanggaran</h3><span style="float:right;"><a class="btn btn-circle btn-primary btn-sm" href="<?php echo $basead; ?>addsanksi"><i class="glyphicon glyphicon-plus"></i> Tambah Sanksi Pelanggaran</a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th>KRITERIA PELANGGARAN</th>
                  <th style="text-align:center;">BOBOT</th>
                  <th style="text-align:center;">OPSI</th>
                </tr>
                </thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM sanksi order by bobot_dari asc ");$vr=1;while($akh=mysqli_fetch_array($smk)){ ?>
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['kriteria']; ?></td>
                  <td><?php echo $akh['bobot_dari'].' - '.$akh['bobot_sampai']; ?></td>
                  <td align="center">
                  <a class="btn btn-info btn-sm" data-target="#sanksi<?php echo $akh['c_sanksi']; ?>" data-toggle="modal"><i class="glyphicon glyphicon-stats"></i> Lihat Sanksi</a>
                  <a href="<?php echo $basead; ?>editsanksi/<?php echo $akh['c_sanksi']; ?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a data-target="#hapus<?php echo $akh['c_sanksi']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i></a>
                </tr>
<div id="sanksi<?php echo $akh['c_sanksi']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Sanksi Dan Pembinaan <?php echo $akh['kriteria']; ?></h4>
        </div>
        <div class="modal-body">
        <p>Bobot Pelanggaran <?php echo $akh['bobot_dari'].' - '.$akh['bobot_sampai']; ?></p>
          <p><b><?php echo $akh['sanksi']; ?></b></p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tutup</button>
        </div>
        </div>
    </div>
</div>
<div id="hapus<?php echo $akh['c_sanksi']; ?>" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Sanksi</h4>
        </div>
        <div class="modal-footer">
          <a href="<?php echo $basead; ?>a-control/<?php echo md5('hapussanksi').'/'.$akh['c_sanksi']; ?>" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a> 
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