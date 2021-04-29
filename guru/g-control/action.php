<?php date_default_timezone_set('Asia/Jakarta');
class action{
  function gantifotobelumada($con,$c_guru,$foto){
  	$akh=mysqli_query($con,"UPDATE guru SET foto='$foto' where c_guru='$c_guru' ");
  	header('location:../../');
  }
  function gantifotosudahada($con,$c_guru,$foto){
  	$akh=mysqli_query($con,"UPDATE guru SET foto='$foto' where c_guru='$c_guru' ");
  	header('location:../../');
  }
  function inputpel($con,$c_pelanggaran,$c_siswa,$c_kelas,$c_benpel,$bobot,$c_guru,$at){
  	$akh=mysqli_query($con,"INSERT INTO pelanggaran set c_pelanggaran='$c_pelanggaran',c_siswa='$c_siswa',c_kelas='$c_kelas',c_benpel='$c_benpel',bobot='$bobot',c_guru='$c_guru',at='$at' ");
  }
  function tambahchat($con,$c_guru,$c_orangtua){
    $akh=mysqli_query($con,"INSERT INTO relasichat set c_guru='$c_guru',c_orangtua='$c_orangtua' ");
    session_start();
    $_SESSION['pesan']='chat';
    header('location:../../walimurid');
  }
  function kirimpesanguru($con,$c_guru,$c_orangtua,$pesan,$at,$wg){
    $akh=mysqli_query($con,"INSERT INTO chat set c_guru='$c_guru',c_orangtua='$c_orangtua',pesan='$pesan',at='$at',w_g='$wg',sw='n' ");
    header('location:../../pesan/'.$c_orangtua.'/_');
  }
  function hapuschat($con,$c_guru,$c_orangtua){
    $akh=mysqli_query($con,"DELETE FROM chat where c_guru='$c_guru' and c_orangtua='$c_orangtua' ");
    $akh2=mysqli_query($con,"DELETE FROM relasichat where c_guru='$c_guru' and c_orangtua='$c_orangtua' ");
      header('location:../../pesan');
  }
  function hapuspel($con,$c_pelanggaran){
    $akh=mysqli_query($con,"DELETE FROM pelanggaran where c_pelanggaran='$c_pelanggaran' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../history');
  }
}
?>
