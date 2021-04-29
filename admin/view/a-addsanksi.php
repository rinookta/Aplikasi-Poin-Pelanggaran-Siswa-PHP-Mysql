
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='tambah'){?>
          <div style="display: none;" class="alert alert-info alert-dismissable">Sanksi Pelanggaran Berhasil Ditambahkan
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } $_SESSION['pesan'] = '';?>
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Sanksi Pelanggaran</b></h3><span style="float:right;"><a href="<?php echo $basead; ?>sanksipelanggaran" class="btn btn-circle btn-primary"><i class="glyphicon glyphicon-th-list"></i> Data Sanksi</a></span>
            </div>
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $basead; ?>a-control/<?php echo md5('addsanksi'); ?>/access">
              <div class="box-body">
                <div class="form-group">
                  <label>KRITERIA PELANGGARAN</label>
                  <input type="text" name="kriteria" class="form-control">
                </div>
                <div class="row">
                  <div class="col-xs-6">
                    <label>BOBOT DARI</label>
                    <input type="" name="dari" class="form-control" onkeypress="return hanyaangka(event)">
                  </div>
                  <div class="col-xs-6">
                    <label>BOBOT SAMPAI</label>
                    <input type="" name="sampai" class="form-control" onkeypress="return hanyaangka(event)">
                  </div>
                </div><br>
                <div class="form-group">
                  <label>SANKSI DAN PEMBINAAN</label>
                  <textarea type="text" name="sanksi" class="form-control" placeholder="Gunakan <br> untuk mengganti baris"></textarea> 
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