<?php $jenpel=mysqli_query($con,"SELECT * FROM katbenpel where c_katbenpel='$_GET[q]' ");$hjenpel=mysqli_fetch_array($jenpel); ?>

<div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='tambah'){?>
          <div style="display: none;" class="alert alert-info alert-dismissable">Bentuk Pelanggaran Berhasil Ditambahkan
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } $_SESSION['pesan'] = '';?>
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Bentuk Pelanggaran <b><?php echo $hjenpel['katbenpel']; ?></b></h3><span style="float:right;"><a href="<?php echo $basead; ?>bentukpelanggaran/<?php echo $_GET['q']; ?>" class="btn btn-circle btn-primary"><i class="glyphicon glyphicon-th-list"></i> Bentuk Pelanggaran</a></span>
            </div>
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $basead; ?>a-control/<?php echo md5('addbenpel'); ?>/access">
            <input type="hidden" name="c_katbenpel" value="<?php echo $_GET['q']; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label>BENTUK PELANGGARAN</label>
                  <textarea type="text" name="benpel" class="form-control"></textarea> 
                </div>
                <div class="form-group">
                  <label>BOBOT</label>
                  <input type="text" name="bobot" class="form-control" onkeypress="return hanyaangka(event)">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-circle"><i class="glyphicon glyphicon-ok"></i> Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
</div>