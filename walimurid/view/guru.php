      <div class="row">
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-green">
              <p class="text-center" style="font-size: 20px;border-bottom: 1px solid #fff;">Wali Murid Dari Siswa</p>
              <div class="widget-user-image">
                <img class="img-circle" src="<?php echo $base; ?>php/img/siswa.png" alt="User Avatar">
              </div>
                    <!-- /.widget-user-image -->
              <h4 class="widget-user-username" style="font-size: 20px;"><?php echo $siswa['nama']; ?></h4>
              <h5 class="widget-user-desc"><?php echo $kelas['kelas']; ?></h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a>Total Pelanggaran <span style="font-size: 20px;margin-top:-3px;color: #428bca;" class="pull-right"><?php echo $pel; ?></span></a><li>
                <li><a>Poin Pelanggaran <span style="font-size: 20px;margin-top:-3px;color: #d9534f;" class="pull-right"><?php if($totalpel['total']>0){echo $totalpel['total'];}else{echo "0";} ?></span></a></li>
              </ul>
            </div>
          </div>
                <!-- /.widget-user -->
        </div>
        <div class="col-xs-12 col-md-8 col-lg-8">
        <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='chat'){?>
          <div style="display: none;" class="alert alert-success alert-dismissable">Percakapan Berhasil Ditambahkan
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        <?php } ?>
        <?php $_SESSION['pesan'] = '';?>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></span>&nbsp;Seluruh Guru</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-hover">
                <thead></thead>
                <tbody>
<?php $smk=mysqli_query($con,"SELECT * FROM guru order by nama asc ");$vr=1;while($akh=mysqli_fetch_array($smk)){ ?>                
                <tr>
                  <td><?php echo $vr; ?></td>
                  <td><?php echo $akh['nama']; ?></td>
                  <td align="center">
              <?php $crc=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM relasichat where c_guru='$akh[c_guru]' and c_orangtua='$_SESSION[c_orangtua]' "));
                if($crc==NULL){?>
                    <a href="<?php echo $basewa; ?>w-control/<?php echo md5('tambahchat').'/'.$akh['c_guru']; ?>" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah Percakapan</a>
              <?php } else{ ?>
                    <a href="<?php echo $basewa; ?>pesan/<?php echo $akh['c_guru']; ?>/_" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-comment"></i> Kirim Pesan</a>
              <?php } ?>
                  </td>
                </tr>
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