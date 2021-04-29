<?php date_default_timezone_set('Asia/Jakarta');$date=date('Y-m-d'); require '../php/config.php'; require '../php/function.php'; session_start(); if(empty($_SESSION['c_guru'])){header('location:../login');} $na=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM guru where c_guru='$_SESSION[c_guru]' ")); //$setting=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM setting limit 1 ")); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Guru PPS</title>
  <link rel="icon" href="favicon.ico">
  <link rel="shortcut icon" href="<?php echo $base; ?>php/img/logo.ico">
  <script type="text/javascript" src="<?php echo $basead; ?>main/js/jquery.js"></script>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo $base; ?>theme/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $base; ?>theme/plugins/datatables/dataTables.bootstrap.css">
  <!-- jvectormap -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $base; ?>theme/dist/css/AdminLTE.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo $base; ?>theme/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo $base; ?>theme/plugins/iCheck/square/blue.css">
  <script type="text/javascript">
      $(document).ready(function() {
        $("#cari").keyup(function(){
        $("#fbody").find("tr").hide();
        var data = this.value.split("");
        var jo = $("#fbody").find("tr");
        $.each(data, function(i, v)
        {
              jo = jo.filter("*:contains('"+v+"')");
        });
          jo.fadeIn();

        })
  });

  </script>
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo $base; ?>theme/plugins/select2/select2.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="<?php echo $base; ?>theme/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script type="text/javascript">
   var auto_refresh = setInterval(
      function(){
        $('#tampildata').load('../../view/loadpesan.php?guru=<?php echo $_SESSION['c_guru']; ?>&ortu=<?php echo $_GET['q'];?>&_=' +Math.random()).show();
      },4000);
  </script>
  <?php if(empty($_GET['q'])){ ?>
  <script type="text/javascript">
   var auto_refresh = setInterval(
      function(){
        $('#pesanbaru').load('view/cekpesanbaru.php?guru=<?php echo $_SESSION['c_guru']; ?>&_=' +Math.random()).show();
      },3000);
  </script>
<?php }else{ ?>
  <script type="text/javascript">
   var auto_refresh = setInterval(
      function(){
        $('#pesanbaru').load('../../view/cekpesanbaru.php?guru=<?php echo $_SESSION['c_guru']; ?>&_=' +Math.random()).show();
      },3000);
  </script>
<?php } ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tampildata').load("../../view/loadpesan.php?guru=<?php echo $_SESSION['c_guru']; ?>&ortu=<?php echo $_GET['q'];?>");
    $("#tombol-simpan").click(function(){
      var data = $('#form-kirim').serialize();
      $.ajax({
        type: 'POST',
        url: "<?php echo $basegu; ?>g-control/<?php echo md5('kirimpesanguru').'/'.$_GET['q']; ?>",
        data: data,
        success: function() {
          $('#tampildata').load("../../view/loadpesan.php?guru=<?php echo $_SESSION['c_guru']; ?>&ortu=<?php echo $_GET['q'];?>");
        }
      });
    });
  });
</script>
  <style type="text/css">
    body{font-family:arial;}
    .judul{width: 100%; background-color: #FFF; padding: 10px;margin-bottom: 10px; }
  </style>

</head>
<body class="skin-purple hold-transition fixed" 
oncontextmenu="return false">
<!--modal ganti foto-->
<div id="gantifoto" class="modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Ganti Foto Anda</h4>
        </div>
        <div class="modal-body">
        <?php if($na['foto']==NULL){ ?>
          <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $basegu; ?>g-control/<?php echo md5('gantifotobelumada'); ?>/access">
        <?php } else{ ?>
          <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $basegu; ?>g-control/<?php echo md5('gantifotosudahada'); ?>/access">
        <?php } ?>
                <input type="hidden" name="c_guru" class="form-control" value="<?php echo $_SESSION['c_guru']; ?>">
                <div class="form-group">
                  <label>Pilih Foto</label>
                  <input type="file" name="foto" class="form-control" required>
                </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-circle"><i class="glyphicon glyphicon-ok"></i> Simpan Perubahan</button>&nbsp;&nbsp;<button class="btn btn-circle btn-success" data-dismiss="modal"><i class="glyphicon glyphicon-repeat"></i>  Batal</a> 
          </form>
        </div>
        </div>
    </div>
</div>
<script src="<?php echo $base; ?>php/olahangka.js"></script>
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>AKH</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>GURU</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="glyphicon glyphicon-th" data-toggle="offcanvas" role="button" style="color: #fff;margin-top: 15px;margin-left: 15px;font-size: 15px;"> Menu
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <?php /*if(empty($_GET['thisaction']) or $_GET['thisaction']!='grafik'){ ?>
          <li>
            <a href="<?php echo $basecon; ?>grafik"><i class="glyphicon glyphicon-stats"></i> Grafik</a>
          </li>
        <?php } else{?>
          <li class="active">
            <a href="<?php echo $basecon; ?>grafik"><i class="glyphicon glyphicon-stats"></i> Grafik</a>
          </li>
        <?php }*/ ?>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-search"></i> Cari Siswa
            </a>
            <ul class="dropdown-menu" style="border-bottom: 2px solid#aaa;">
              <li class="header text-center">Masukkan NISN Atau NAMA Siswa</li>
              <li>
              <form action="<?php echo $basegu; ?>kesearch" method="get">
                <ul class="menu">
                  <li>
                    <input autofocus="" autocomplete="off" required="" type="text" name="search" class="form-control" style="margin-left:5%;width:90%;">
                  </li>
                </ul>
              </li>
              <li class="footer text-center" style="padding:10px;"><button class="btn btn-success btn-sm btn-flat" style="width:96%;">Mulai Mencari...</button></li>
              </form>
            </ul>
          </li>

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php if($na['foto']==NULL){ ?>
              <img src="<?php echo $base; ?>php/img/avatar1.png" class="user-image" alt="User Image">
            <?php }else { ?> 
              <img src="<?php echo $basegu.'/'.$na['foto']; ?>" class="user-image" alt="User Image">
            <?php } ?> 
              <span class="hidden-xs"><?php echo $na['nama'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              <?php if($na['foto']==NULL){ ?>
                <img src="<?php echo $base; ?>php/img/avatar1.png" class="img-circle" alt="User Image">
              <?php }else { ?> 
                <img src="<?php echo $basegu.$na['foto']; ?>" class="img-circle" alt="User Image">
              <?php } ?> 
                <p>
                  <?php echo $na['nama']; ?>
                  <small></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a data-target="#gantifoto" data-toggle="modal" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-picture"></i> Ganti Foto</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo $base; ?>php/<?php echo md5('logout'); ?>" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-off"></i> Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="glyphicon glyphicon-cog"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $base; ?>php/img/logo.ico" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $na['nama']; ?></p>
          <i class="glyphicon glyphicon-time"></i> <?php echo tgl(date('d-m-Y')); ?>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">

      </form>
<?php //navigasi aktif
if(empty($_GET['smkakh'])){
  $aak='class="active"';$bak='';$cak='';$dak='';$eak='';
}
else{
  $act=($_GET['smkakh']);
  if($act=='inputpelanggaran' or $act=='nextinput'){
    $aak='';$bak='class="active"';$cak='';$dak='';$eak='';
  }
  else if($act=='sanksi'){
    $aak='';$bak='';$cak='class="active"';$dak='';$eak='';
  }
  else if($act=='pesan'){
    $aak='';$bak='';$cak='';$dak='class="active"';$eak='';
  }
  else if($act=='history'){
    $aak='';$bak='';$cak='';$dak='';$eak='class="active"';
  }
  else{
    $aak='';$bak='';$cak='';$dak='';$eak='';
  }
}
//akhir navigasi aktif
?>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li <?php echo $aak; ?>>
          <a href="<?php echo $basegu; ?>">
            <i class="glyphicon glyphicon-th"></i> <span>Dashboard</span>
          </a>
        </li>
        <li <?php echo $bak; ?>>
          <a href="<?php echo $basegu; ?>inputpelanggaran">
            <i class="glyphicon glyphicon-ok"></i> <span>Input Pelanggaran</span>
          </a>
        </li>
        <li <?php echo $cak; ?>>
          <a href="<?php echo $basegu; ?>sanksi">
            <i class="glyphicon glyphicon-list-alt"></i> <span>Sanksi Pelanggaran</span>
          </a>
        </li>
        <li <?php echo $dak; ?>>
          <a href="<?php echo $basegu; ?>pesan">
            <i class="glyphicon glyphicon-comment"></i> <span>Pesan</span><span id="pesanbaru"></span>
          </a>
        </li>
        <li>
          <a href="<?php echo $basegu; ?>walimurid">
            <i class="glyphicon glyphicon-user"></i> <span>Wali Murid</span>
          </a>
        </li>
        <li>
          <a href="<?php echo $basegu; ?>history">
            <i class="glyphicon glyphicon-calendar"></i> <span>History</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

<?php
  if(empty($_GET['smkakh'])){require 'view/home.php';}
  else{
    $act=($_GET['smkakh']);
    if($act=='inputpelanggaran'){
      require 'view/inputpel.php';
    }
    else if($act=='nextinput'){
      require 'view/nextinput.php';
    }
    else if($act=='sanksi'){
      require 'view/sanksi.php';
    }
    else if($act=='lihatpelanggaransiswa'){
      require 'view/detpelsiswa.php';
    }
    else if($act=='walimurid'){
      require 'view/walimurid.php';
    }
    else if($act=='pesan'){
      require 'view/pesan.php';
    }
    else if($act=='history'){
      require 'view/history.php';
    }
    else if($act=='search'){
      require 'view/search.php';
    }
    else{
      require 'view/404.php';
    }
  }
?>
    </section>
    <!-- /.content -->
  </div>
</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2017 <a href="#">NAMA SEKOLAH (Tlp. )</a></strong> by Rino Oktavianto
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo $base; ?>theme/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo $base; ?>theme/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo $base; ?>theme/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $base; ?>theme/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo $base; ?>theme/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo $base; ?>theme/plugins/fastclick/fastclick.js"></script>
<!-- Sparkline -->
<script src="<?php echo $base; ?>theme/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo $base; ?>theme/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<!-- AdminLTE App -->
<script src="<?php echo $base; ?>theme/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $base; ?>theme/dist/js/demo.js"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
  });
</script>
<script src="<?php echo $base; ?>theme/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<!-- Select2 -->
<script src="<?php echo $base; ?>theme/plugins/select2/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
<script>
//angka 500 dibawah ini artinya pesan akan muncul dalam 0,5 detik setelah document ready
$(document).ready(function(){setTimeout(function(){$(".alert").fadeIn('fast');}, 100);});
//angka 3000 dibawah ini artinya pesan akan hilang dalam 3 detik setelah muncul
setTimeout(function(){$(".alert").fadeOut('fast');}, 7000);
setTimeout(function(){$("#hilang").fadeOut('fast');}, 2000);

</script>
</body>
</html>
