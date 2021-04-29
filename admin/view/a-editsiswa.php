<?php $aksis=mysqli_query($con,"SELECT * FROM siswa where c_siswa='$_GET[q]' ");$hasis=mysqli_fetch_array($aksis);?>
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='edit'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Siswa Berhasil Diedit
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } $_SESSION['pesan'] = '';?>
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Siswa</h3><span style="float:right;"><a href="<?php echo $basead.'siswa'; ?>" class="btn btn-circle btn-primary"><i class="glyphicon glyphicon-th-list"></i> Lihat Siswa</a></span>
            </div>
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $basead; ?>a-control/<?php echo md5('editsiswa'); ?>/access">
            <input type="hidden" name="c_siswa" value="<?php echo $_GET['q']; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label>NISN</label>
                  <input type="text" required="" name="nisn" class="form-control" value="<?php echo $hasis['nisn']; ?>">
                </div>
                <div class="form-group">
                  <label>NAMA LENGKAP</label>
                  <input type="text" required="" name="nama" class="form-control" value="<?php echo $hasis['nama']; ?>">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ALAMAT LAHIR</label>
                      <input type="text" required="" name="alamat" class="form-control" value="<?php echo $hasis['alamat']; ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>TANGGAL LAHIR</label>
                      <div class="controls input-append date form_date" data-date="1998-10-14" data-date-format="dd MM yyyy" data-link-field="dtp_input1">
                          <input class="form-control" type="text" name="tl" value="<?php echo $hasis['tl']; ?>" required="">
                          <span class="add-on"><i class="icon-th"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>JENIS KELAMIN</label>&nbsp;&nbsp;&nbsp;
                  <label><input <?php if($hasis['jk']=='L'){echo 'checked';} ?> type="radio" name="jk" value="L"> Laki-Laki</label>&nbsp;&nbsp;
                  <label><input <?php if($hasis['jk']=='P'){echo 'checked';} ?> type="radio" name="jk" value="P"> Perempuan</label>
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
<!-- jQuery 2.2.3 -->
<script src="<?php echo $base; ?>theme/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="<?php echo $base; ?>theme/datetime/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo $base; ?>theme/datetime/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
        showMeridian: 1
    });
  $('.form_date').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });
  $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 1,
    minView: 0,
    maxView: 1,
    forceParse: 0
    });
</script>