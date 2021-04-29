code siswa <br>
<?php 
$siswa = $_GET['pilihsis'];
$jumabsis = count($siswa);
for($ff=0;$ff<$jumabsis;$ff++){
  echo 'ini code siswa '.$siswa[$ff].'<br>';
  $benpel = $_GET['pilihben'];
  $jumaben = count($benpel);
  for($fg=0;$fg<$jumaben;$fg++){
    echo 'code pelanggaran '.$benpel[$fg].'<br>';
  }
}
?>
<br>code bentuk pelanggaran<br>
<?php 
$benpel = $_GET['pilihben'];
$jumaben = count($benpel);
for($fg=0;$fg<$jumaben;$fg++){
  echo $benpel[$fg].'<br>';
}
?>