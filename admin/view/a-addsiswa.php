<?php 
if(isset($_GET['q'])){
  $poskelas=mysqli_query($con,"SELECT * FROM kelas where c_kelas='$_GET[q]' ");$dkelas=mysqli_fetch_array($poskelas); 
}
?>
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='tambah'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Siswa Berhasil Ditambahkan
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } $_SESSION['pesan'] = '';?>
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Siswa Kelas <?php echo $dkelas['kelas']; ?></h3><span style="float:right;"><a href="<?php echo $basead.'siswa/'.$_GET['q']; ?>" class="btn btn-circle btn-primary"><i class="glyphicon glyphicon-th-list"></i> Lihat Siswa</a></span>
            </div>
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $basead; ?>a-control/<?php echo md5('addsiswa'); ?>/access">
            <input type="hidden" name="c_kelas" value="<?php echo $_GET['q']; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label>NISN</label>
                  <input type="text" required="" name="nisn" class="form-control">
                </div>
                <div class="form-group">
                  <label>NAMA LENGKAP</label>
                  <input type="text" required="" name="nama" class="form-control">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ALAMAT LAHIR</label>
                      <input type="text" required="" name="alamat" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>TANGGAL LAHIR</label>
                      <div class="controls input-append date form_date" data-date="1998-10-14" data-date-format="dd MM yyyy" data-link-field="dtp_input1">
                          <input class="form-control" type="text" name="tl" value="" required="">
                          <span class="add-on"><i class="icon-th"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>JENIS KELAMIN</label>&nbsp;&nbsp;&nbsp;
                  <label><input type="radio" name="jk" value="L"> Laki-Laki</label>&nbsp;&nbsp;
                  <label><input type="radio" name="jk" value="P"> Perempuan</label>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-circle"><i class="glyphicon glyphicon-ok"></i> Simpan Siswa</button>
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
