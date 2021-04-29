<?php require '../../php/config.php';$na=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM guru where c_guru='$_GET[guru]' "));$nw=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM orangtua where c_orangtua='$_GET[ortu]' ")); ?>
      <!-- DIRECT CHAT WARNING -->
        <div class="box-body">
          <div class="direct-chat-messages" style="height:400px;">
    <?php /*chatdisini*/ 
    $uc=mysqli_query($con,"UPDATE chat SET sg='y' where c_guru='$_GET[guru]' and c_orangtua='$_GET[ortu]' ");
    $chat=mysqli_query($con,"SELECT * FROM chat where c_guru='$_GET[guru]' and c_orangtua='$_GET[ortu]' order by at desc ");while($chatnya=mysqli_fetch_array($chat)){
      if($chatnya['w_g']=='g'){?>
            <div class="direct-chat-msg right">
              <div class="direct-chat-info clearfix">
                <span class="direct-chat-name pull-right"><?php echo $na['nama']; ?></span>
                <span class="direct-chat-timestamp pull-left"><?php echo date("d/m/Y H:i",strtotime($chatnya['at'])); ?>
                <?php if($chatnya['sw']=='y'){?>
                  <span style="color:#5bc0de;"><i class="glyphicon glyphicon-ok"></i><i class="glyphicon glyphicon-ok"></i></span>
                <?php }else{ ?>
                  <span style="color:#d9534f;"><i class="glyphicon glyphicon-arrow-up"></i></span>
                <?php } ?>
                </span>
              </div>
          <?php if($na['foto']==NULL){ ?>
                <img src="<?php echo $base; ?>php/img/avatar1.png" class="direct-chat-img" alt="User Image">
              <?php }else { ?> 
                <img src="<?php echo $basegu.$na['foto']; ?>" class="direct-chat-img" alt="User Image">
              <?php } ?>
              <div class="direct-chat-text">
                <?php echo $chatnya['pesan']; ?>
              </div><!-- /.direct-chat-text -->
            </div><!-- /.direct-chat-msg -->
      <?php } else { ?>
            <div class="direct-chat-msg">
              <div class="direct-chat-info clearfix">
                <span class="direct-chat-name pull-left"><?php echo $nw['nama']; ?></span>
                <span class="direct-chat-timestamp pull-right">
                  <?php echo date("d/m/Y H:i",strtotime($chatnya['at'])); ?></span>
              </div><!-- /.direct-chat-info -->
              <img class="direct-chat-img" src="<?php echo $base; ?>php/img/ortu.png" alt="message user image"><!-- /.direct-chat-img -->
              <div class="direct-chat-text">
                <?php echo $chatnya['pesan']; ?>
              </div><!-- /.direct-chat-text -->
            </div>
      <?php } ?>

    <?php } ?>
          </div><!--/.direct-chat-messages-->
        </div><!-- /.box-body -->
        <?php //echo $_GET['guru'].'<br>'.$_GET['ortu']; ?>            
