<?php session_start(); if(empty($_SESSION['c_guru'])){header('location:../login');}
if(isset($_POST['c_kelas']) and $_POST['namanisn']==''){
	$k=$_POST['c_kelas'];$g='_';
}
else if(empty($_POST['c_kelas']) and $_POST['namanisn']!=''){
	$k='_';$g=str_replace(" ", "_", $_POST['namanisn']);
}
else if(isset($_POST['c_kelas']) and isset($_POST['namanisn'])){
	$k=$_POST['c_kelas'];$g=str_replace(" ", "_", $_POST['namanisn']);
}
else{
	$k='_';$g='_';
}
header('location:inputpelanggaran/'.$k.'/'.$g.'');
?>