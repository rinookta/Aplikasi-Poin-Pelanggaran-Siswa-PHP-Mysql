<?php $cor=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM orangtua where c_siswa='$_GET[q]' ")); $csis=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa where c_siswa='$_GET[q]' ")); ?>
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='edit'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Wali Murid Berhasil Disetting
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } $_SESSION['pesan'] = '';?>
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <span style="float:right;"><a class="btn btn-circle btn-primary btn-sm" href="<?php echo $basead; ?>walimurid"><i class="glyphicon glyphicon-list"></i> Wali Murid</a></span>
              
              <h3 class="box-title">Setting Wali Murid Dari</h3><br>
              <p>NISN : <?php echo $csis['nisn']; ?><br>NAMA : <?php echo $csis['nama']; ?></p>
            </div>
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $basead; ?>a-control/<?php echo md5('orangtua'); ?>/access">
            <input type="hidden" name="c_siswa" class="form-control" value="<?php echo $_GET['q']; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label>NAMA</label>
                  <input type="text" name="nama" class="form-control" value="<?php echo $cor['nama']; ?>">
                </div>
                <div class="form-group">
                  <label>USERNAME</label>
                  <input type="text" name="username" class="form-control" value="<?php echo $cor['username']; ?>">
                </div>
                <div class="form-group">
                  <label>PASSWORD</label>
                  <input type="text" name="password" class="form-control" value="<?php echo $cor['password']; ?>">
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