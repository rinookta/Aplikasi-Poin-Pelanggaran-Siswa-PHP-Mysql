<?php session_start(); if(empty($_SESSION['c_admin'])){header('location:../login');}
header('location:master/'.$_GET['kelas'].'/'.$_GET['bulan'].'/'.$_GET['tahun'].'/'.$_GET['re'].'');
?>
