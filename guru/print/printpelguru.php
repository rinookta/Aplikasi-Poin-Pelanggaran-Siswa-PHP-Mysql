<?php
require '../../php/config.php'; require '../../php/function.php';
session_start();
if(empty($_SESSION['c_guru'])){header('location:'.$base.'');}
require_once("../../master/dompdf/dompdf_config.inc.php"); require 'cssprint.php';
$gur=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM guru where c_guru='$_GET[guru]' "));
$content.='
<title>Pelanggaran Diinputkan Guru ('.$gur['nama'].')</title>
<div style="page-break-after: always;">
<h3 class="text-center">Laporan Pelanggaran Diinputkan Guru ('.$gur['nama'].')</h3>
<table class="table table-bordered">
    <tr class="text-center">
      <td width="1%">NO</td>
      <td>NAMA SISWA</td>
      <td width="50%">BENTUK PELANGGARAN</td>
      <td width="1%">BOBOT</td>
      <td width="10%">TANGGAL</td>
    </tr>';
$smk=mysqli_query($con,"SELECT * FROM pelanggaran where c_guru='$_GET[guru]' order by at desc ");
foreach($smk as $kumpul){ $c_sis[]=$kumpul['c_siswa']; }
$ar=0; $vr=1; $jar= count($c_sis);
foreach($smk as $akh){
$sis=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM siswa where c_siswa='$akh[c_siswa]' "));
$kel=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kelas where c_kelas='$akh[c_kelas]' "));
$ben=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM benpel where c_benpel='$akh[c_benpel]' "));
$content.='
    <tr>';
      if($ar==0){
        $content.= '<td class="text-center">'.$vr.'</td><td>'.$sis['nama'].' ('.$kel['kelas'].')</td>';
      }else{
        $ar2= $ar-1;
        if($c_sis[$ar]==$c_sis[$ar2]){
          $content.= '<td></td><td></td>';
        }
        else{
          $vr2= $vr+1;
          $content.= '<td class="text-center">'.$vr2.'</td><td>'.$sis['nama'].' ('.$kel['kelas'].')</td>';
          $vr++;
        }
      }  
      $content.='
      <td>'.$ben['benpel'].'</td>
      <td class="text-center">'.$akh['bobot'].'</td>
      <td>'.date("d/m/Y", strtotime($akh['at'])).'</td>
    </tr>';
$ar++; }
$content.='
</table>
<div style="position: absolute;bottom: 0;right: 0;">
	Dicetak Pada '.date('d-m-Y H:i').'
</div>
</div>';
$dompdf = new DOMPDF();
$dompdf->set_paper('A4','Landscape');
$dompdf->load_html($content);
$dompdf->render();
$dompdf->stream('Pelanggaran Diinputkan Guru ('.$gur['nama'].').pdf',array("Attachment"=>0));
?>
