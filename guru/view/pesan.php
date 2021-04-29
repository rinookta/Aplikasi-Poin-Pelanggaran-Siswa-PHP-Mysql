<div class="row">
  <div class="col-md-4">
    <div class="box box-solid">
      <div class="box-header with-border">
      	<h3 class="box-title">Wali Murid</h3>
      	<div class="box-tools">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="glyphicon glyphicon-minus"></i></button>
        </div>
      </div>
      <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
      <?php $relc=mysqli_query($con,"SELECT * FROM orangtua ");while($hrel=mysqli_fetch_array($relc)){ ?>
                <li <?php if(isset($_GET['q'])){if($_GET['q']==$hrel['c_orangtua']){echo 'class="active"';}} ?> ><a href="<?php echo $basegu; ?>pesan/<?php echo $hrel['c_orangtua']; ?>/_"><?php echo $hrel['nama']; ?></a></li>
        <?php } ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-8">
  	<?php if(empty($_GET['q'])){ ?>
  		<div class="box box-primary box-solid direct-chat direct-chat-primary">
        <div class="box-header">
        </div><!-- /.box-header -->
        <div class="box-body">
  
          <div class="direct-chat-messages">
            <div class="direct-chat-msg">
              <img class="direct-chat-img" src="<?php echo $base; ?>theme/dist/img/user1-128x128.jpg" alt="message user image">
              <div class="direct-chat-text">
                Pilih Salah Satu Percakapan...
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php }else {  $ortu=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM orangtua where c_orangtua='$_GET[q]' "));  ?>
    	<div id="hilang" class="alert alert-info alert-dismissable">Memproses Pesan...</div>
    	<div class="box box-primary box-solid direct-chat direct-chat-primary" style="">
        <div class="box-header">
          <h3 class="box-title">Percakapan Anda Dengan <?php echo $ortu['nama']; ?></h3>
          <a data-target="#hapus" data-toggle="modal" class="pull-right"><i class="glyphicon glyphicon-remove"></i></a>
        </div><!-- /.box-header -->
    		<div id="tampildata"></div>
    		<div class="box-footer">
        	<form id="form-kirim" method="post">
            <div class="input-group">
              <span class="input-group-btn">
                <button type="reset" class="btn btn-danger btn-flat"><i class="glyphicon glyphicon-refresh"></i></button>
              </span>
              <input required="" autocomplete="off" type="text" name="pesan" placeholder="Tulis Pesan..." class="form-control">
              <span class="input-group-btn">
                <a id="tombol-simpan" class="btn btn-primary btn-flat">Kirim <i class="glyphicon glyphicon-send"></i></a>
              </span>
            </div>
          </form>
        </div><!-- /.box-footer-->  
      </div>
<div id="hapus" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Percakapan</h4>
        </div>
        <div class="modal-body">
          <p>Jika Anda Menghapus Data Ini, Akan Berpengaruh Pada</p>
          <b>1. Seluruh Percakapan Dengan (<?php echo $ortu['nama']; ?>) Secara Keseluruhan Juga Terhapus</b>
        </div>
        <div class="modal-footer">
          <a href="<?php echo $basegu; ?>g-control/<?php echo md5('hapuschat').'/'.$_GET['q']; ?>" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Lanjutkan</a> 
          <button class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tutup</button>
        </div>
        </div>
    </div>
</div>
    <?php } ?>
 	</div>
</div>

<!--<div id="hilang" class="alert alert-info alert-dismissable">Memproses Pesan...</div>
