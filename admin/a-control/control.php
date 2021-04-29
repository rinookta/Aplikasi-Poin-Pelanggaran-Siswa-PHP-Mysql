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
//kategori bentuk pelanggaran
  if($akh==md5('addjenispelanggaran')){ $c_katbenpel=random(9);
    $smk->addjenispelanggaran($con,$c_katbenpel,$_POST['katbenpel']);
  }
  else if($akh==md5('editjenispelanggaran')){
    $smk->editjenispelanggaran($con,$_POST['c_katbenpel'],$_POST['katbenpel']);
  }
  else if($akh==md5('hapuskatbenpel')){
    $smk->hapuskatbenpel($con,$_GET['q']);
  }
//bentuk pelanggaran
  else if($akh==md5('addbenpel')){ $c_benpel=random(9);
    $smk->addbenpel($con,$c_benpel,$_POST['c_katbenpel'],$_POST['benpel'],$_POST['bobot']);
  }
  else if($akh==md5('editbenpel')){
    $smk->editbenpel($con,$_POST['c_benpel'],$_POST['c_katbenpel'],$_POST['benpel'],$_POST['bobot']);
  }
  else if($akh==md5('editbenpel2')){
    $smk->editbenpel2($con,$_POST['c_benpel'],$_POST['c_katbenpel'],$_POST['benpel'],$_POST['bobot']);
  }
  else if($akh==md5('hapusbenpel')){
    $kben=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM benpel where c_benpel='$_GET[q]' "));
    $smk->hapusbenpel($con,$_GET['q'],$kben['c_katbenpel']);
  }
  else if($akh==md5('hapusbenpel2')){
    $smk->hapusbenpel2($con,$_GET['q']);
  }
//sanksi
  else if($akh==md5('addsanksi')){ $c_sanksi=random(9);
    $smk->addsanksi($con,$c_sanksi,$_POST['kriteria'],$_POST['dari'],$_POST['sampai'],$_POST['sanksi']);
  }
  else if($akh==md5('editsanksi')){
    $smk->editsanksi($con,$_POST['c_sanksi'],$_POST['kriteria'],$_POST['dari'],$_POST['sampai'],$_POST['sanksi']);
  }
  else if($akh==md5('hapussanksi')){
    $smk->hapussanksi($con,$_GET['q']);
  }
//kelas
  else if($akh==md5('addkelas')){ $c_kelas=random(9);
    $smk->addkelas($con,$c_kelas,$_POST['kelas']);
  }
  else if($akh==md5('editkelas')){
    $smk->editkelas($con,$_POST['c_kelas'],$_POST['kelas']);
  }
  else if($akh==md5('hapuskelas')){
    $smk->hapuskelas($con,$_GET['q']);
  }
//siswa
  else if($akh==md5('addsiswa')){ $c_siswa=random(9); $tl=date('Y-m-d',strtotime($_POST['tl']));
    $smk->addsiswa($con,$c_siswa,$_POST['c_kelas'],$_POST['nisn'],$_POST['nama'],$_POST['jk'],$_POST['alamat'],$tl);
  }
  else if($akh==md5('editsiswa')){ $tl=date('Y-m-d',strtotime($_POST['tl']));
    $smk->editsiswa($con,$_POST['c_siswa'],$_POST['nisn'],$_POST['nama'],$_POST['jk'],$_POST['alamat'],$tl);
  }
  else if($akh==md5('hapussiswa')){
    $ck=mysqli_fetch_array(mysqli_query($con,"SELECT * from siswa where c_siswa='$_GET[q]' "));
    $smk->hapussiswa($con,$_GET['q'],$ck['c_kelas']);
  }
  else if($akh==md5('hapussiswa2')){
    $smk->hapussiswa2($con,$_GET['q']);
  }
//guru
  else if($akh==md5('addguru')){ $c_guru=random(9);
    $smk->addguru($con,$c_guru,$_POST['nama'],$_POST['username'],$_POST['password']);
  }
  else if($akh==md5('editguru')){
    $smk->editguru($con,$_POST['c_guru'],$_POST['nama'],$_POST['username'],$_POST['password']);
  }
  else if($akh==md5('hapusguru')){
    $dd=mysqli_fetch_array(mysqli_query($con,"SELECT * from guru where c_guru='$_GET[q]' "));
    if($dd['foto']!=NULL){
        unlink('../../guru/'.$dd['foto'].'');
    }
    $smk->hapusguru($con,$_GET['q']);
  }
//orangtua
  else if($akh==md5('orangtua')){
    $cor=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM orangtua where c_siswa='$_POST[c_siswa]' "));
    if($cor==NULL){ $c_orangtua=random(9);
      $smk->inputorangtua($con,$c_orangtua,$_POST['c_siswa'],$_POST['nama'],$_POST['username'],$_POST['password']);
    }
    else{
      $smk->editorangtua($con,$cor['c_orangtua'],$_POST['c_siswa'],$_POST['nama'],$_POST['username'],$_POST['password']);
    }
  }
  else if($akh==md5('hapusorangtua')){
    $smk->hapusorangtua($con,$_GET['q']);
  }
//pelanggaran
  else if($akh==md5('hapuspel')){
    $smk->hapuspel($con,$_GET['q']);
  }
  else if($akh==md5('hapuspelsiswa')){
    $smk->hapuspelsiswa($con,$_GET['q']);
  }
  else if($akh==md5('testtoken')){
    echo $_GET['q'].'<br>';
    echo $t2=md5(date('H:i:s'));
  }
  else{
    //header('location:../../login');
    echo "string";
  }
}
?>
