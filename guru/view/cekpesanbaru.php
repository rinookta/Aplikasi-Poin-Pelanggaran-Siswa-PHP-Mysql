<?php require '../../php/config.php';$cpb=mysqli_num_rows(mysqli_query($con,"SELECT * FROM chat where c_guru='$_GET[guru]' and sg='n' "));
if($cpb>0){echo '
						<span class="label label-primary">'.$cpb.'</span>';}else{} ?>
