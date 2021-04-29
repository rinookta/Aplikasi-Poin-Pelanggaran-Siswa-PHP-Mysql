<?php require 'php/config.php'; session_start(); if(isset($_SESSION['c_admin'])){ header('location:admin/'); }elseif(isset($_SESSION['c_guru'])){ header('location:guru/');}elseif(isset($_SESSION['c_orangtua'])){ header('location:walimurid/'); }?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login PPS</title>
  <link rel="icon" href="favicon.ico">
  <link rel="shortcut icon" href="php/img/logo.ico">
  <script type="text/javascript" src="jquery.js"></script> 
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="theme/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="theme/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="theme/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
    
  </style>
</head>
<?php ?>
<body class="hold-transition login-page" style="background:url(theme/dist/img/photo4.jpg)
no-repeat center center fixed; background-size: cover;
 -webkit-background-size: cover; 
 -moz-background-size: cover; -o-background-size: cover;"><div class="login-box">
  <div class="login-logo">
    <h2>PPS<br>SMK AL-KHOIRIYAH</h2></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Masukkan Username dan Password</p>
    <p><i class="btn btn-block btn-success btn-flat"></i></p>  
    <?php if(isset($_SESSION['pesan']) && $_SESSION['pesan']=='gagal'){?>
      <p><div style="display: none;" class="alert alert-danger alert-dismissable">Username atau Password Salah!
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      </div></p>
    <?php }$_SESSION['pesan'] = '';?>
    <form action="php/<?php echo md5('login'); ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username" required="" autocomplete="" autofocus="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required="" autocomplete="off">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="form-group">
            <label>Masuk Sebagai</label>
            <select class="form-control" name="v">
              <option disabled="">Pilih Akses</option>
              <option value="admin">Admin</option>
              <option value="guru">Guru</option>
              <option value="wali">Wali Murid</option>
            </select>  
          </div>
        </div>
      </div>
        <button class="btn btn-primary btn-flat btn-lg" style="width:100%;">Log In <i class="glyphicon glyphicon-log-in"></i></button>
    </form>
  </div>
</div>

<!-- jQuery 2.2.3 -->
<script src="theme/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="theme/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="theme/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<script>
//angka 500 dibawah ini artinya pesan akan muncul dalam 0,5 detik setelah document ready
$(document).ready(function(){setTimeout(function(){$(".alert").fadeIn('fast');}, 100);});
//angka 3000 dibawah ini artinya pesan akan hilang dalam 3 detik setelah muncul
setTimeout(function(){$(".alert").fadeOut('fast');}, 10000);
</script>
</body>
</html>
