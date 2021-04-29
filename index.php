<?php session_start(); 
if(isset($_SESSION['c_admin'])){ header('location:admin/'); }
elseif(isset($_SESSION['c_guru'])){ header('location:guru/'); }
elseif(isset($_SESSION['c_orangtua'])){ header('location:walimurid/'); }
else{header('location:login');} ?>