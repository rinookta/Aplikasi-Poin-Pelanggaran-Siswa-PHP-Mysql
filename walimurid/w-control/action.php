<?php date_default_timezone_set('Asia/Jakarta');
class action{
  function kirimpesanwali($con,$c_guru,$c_orangtua,$pesan,$at,$wg){
    $akh=mysqli_query($con,"INSERT INTO chat set c_guru='$c_guru',c_orangtua='$c_orangtua',pesan='$pesan',at='$at',w_g='$wg',sg='n' ");
    header('location:../../pesan/'.$c_guru.'/_');
  }
  function tambahchat($con,$c_guru,$c_orangtua){
    $akh=mysqli_query($con,"INSERT INTO relasichat set c_guru='$c_guru',c_orangtua='$c_orangtua' ");
    session_start();
    $_SESSION['pesan']='chat';
    header('location:../../guru');
  }
}
?>
