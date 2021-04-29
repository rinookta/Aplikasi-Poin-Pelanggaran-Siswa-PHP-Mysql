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
  if($akh==md5('tambahchat')){
    $smk->tambahchat($con,$_GET['q'],$_SESSION['c_orangtua']);
  }
  else if($akh==md5('kirimpesanwali')){ $at=date('Y-m-d H:i:s'); $wg='w';
    $smk->kirimpesanwali($con,$_GET['q'],$_SESSION['c_orangtua'],$_POST['pesan'],$at,$wg);
  }
  else{
    //header('location:../../login');
    echo "string";
  }
}
?>
