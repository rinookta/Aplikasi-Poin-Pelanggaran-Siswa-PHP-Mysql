<?php date_default_timezone_set('Asia/Jakarta'); session_start();
function random($length){
  $data='1234567890AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSstuuUvVwWxXyYyZz';
  $string='';
  for($i=1;$i<=$length;$i++){
    $pos=rand(0,strlen($data)-1);
    $string.=$data{$pos};
  }
  return $string;
}
require '../../php/config.php';
if(empty($_GET['smkakh']) or empty($_GET['q'])){
	header('location:../../login');
}
else{
	require 'action.php';
	$smk=new action();
	$akh=($_GET['smkakh']);
  if($akh==md5('gantifotosudahada')){
    $dd=mysqli_fetch_array(mysqli_query($con,"SELECT * from guru where c_guru='$_POST[c_guru]' "));
      if($dd['foto']!=NULL)
      {
        unlink('../'.$dd['foto']);
      }
    $tmp_name=$_FILES['foto']['tmp_name'];
    $name=$_FILES['foto']['name'];
    $type=$_FILES['foto']['type'];
    $loc="../foto/$name";$foto="foto/$name";
    move_uploaded_file($tmp_name,$loc);
    $smk->gantifotosudahada($con,$_POST['c_guru'],$foto);
  }
  else if($akh==md5('gantifotobelumada')){
    $tmp_name=$_FILES['foto']['tmp_name'];
    $name=$_FILES['foto']['name'];
    $type=$_FILES['foto']['type'];
    $loc="../foto/$name";$foto="foto/$name";
    move_uploaded_file($tmp_name,$loc);
    $smk->gantifotobelumada($con,$_POST['c_guru'],$foto);
  }
  else if($akh==md5('inputpel')){
    $siswa = $_POST['pilihsis'];
    $jumabsis = count($siswa);
    for($ff=0;$ff<$jumabsis;$ff++){
      $benpel = $_POST['pilihben'];
      $jumaben = count($benpel);
      for($fg=0;$fg<$jumaben;$fg++){
        $c_pelanggaran=random(4); $ab=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM benpel where c_benpel='$benpel[$fg]' ")); $ak=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa where c_siswa='$siswa[$ff]' "));
        $smk->inputpel($con,$c_pelanggaran,$siswa[$ff],$ak['c_kelas'],$benpel[$fg],$ab['bobot'],$_SESSION['c_guru'],date('Y-m-d H:i:s'));
      }
    }
    $_SESSION['pesan']='selesai';
    header('location:../../history');
  }
  else if($akh==md5('tambahchat')){
    $smk->tambahchat($con,$_SESSION['c_guru'],$_GET['q']);
  }
  else if($akh==md5('kirimpesanguru')){ $at=date('Y-m-d H:i:s'); $wg='g';
    $smk->kirimpesanguru($con,$_SESSION['c_guru'],$_GET['q'],$_POST['pesan'],$at,$wg);
  }
  else if($akh==md5('hapuschat')){
    $smk->hapuschat($con,$_SESSION['c_guru'],$_GET['q']);
  }
  else if($akh==md5('hapuspel')){
    $smk->hapuspel($con,$_GET['q']);
  }
  else{
    //header('location:../../login');
    echo "string";
  }
}
?>
