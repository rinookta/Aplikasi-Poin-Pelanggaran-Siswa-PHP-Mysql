<?php require '../../php/config.php';$cpb=mysqli_num_rows(mysqli_query($con,"SELECT * FROM chat where c_orangtua='$_GET[ortu]' and sw='n' "));
if($cpb>0){echo '<span class="label label-warning">'.$cpb.'</span>';}else{} ?>
