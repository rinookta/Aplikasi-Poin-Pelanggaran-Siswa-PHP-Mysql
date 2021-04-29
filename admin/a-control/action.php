<?php date_default_timezone_set('Asia/Jakarta');
class action{
//kategori bentuk pelanggaran
  function addjenispelanggaran($con,$c_katbenpel,$katbenpel){
    $akh=mysqli_query($con,"INSERT into katbenpel set c_katbenpel='$c_katbenpel',katbenpel='$katbenpel' ");
    session_start();
    $_SESSION['pesan']='tambah'; 
    clearstatcache();
    header('location:../../kategoripelanggaran');
  }
  function editjenispelanggaran($con,$c_katbenpel,$katbenpel){
    $akh=mysqli_query($con,"UPDATE katbenpel set katbenpel='$katbenpel' where c_katbenpel='$c_katbenpel' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../kategoripelanggaran');
  }
  function hapuskatbenpel($con,$c_katbenpel){
    $ben=mysqli_query($con,"SELECT * FROM benpel where c_katbenpel='$c_katbenpel' ");while($hpel=mysqli_fetch_array($ben)){
      $akh=mysqli_query($con,"DELETE from pelanggaran where c_benpel='$hpel[c_benpel]' ");
    } 
    $akh2=mysqli_query($con,"DELETE from benpel where c_katbenpel='$c_katbenpel' ");
    $akh3=mysqli_query($con,"DELETE from katbenpel where c_katbenpel='$c_katbenpel' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../kategoripelanggaran');
  }
//bentuk pelanggaran
  function addbenpel($con,$c_benpel,$c_katbenpel,$benpel,$bobot){
    $akh=mysqli_query($con,"INSERT INTO benpel set c_benpel='$c_benpel',c_katbenpel='$c_katbenpel',benpel='$benpel',bobot='$bobot' ");
    session_start();
    $_SESSION['pesan']='tambah';
    header('location:../../addbentukpelanggaran/'.$c_katbenpel.'');
  }
  function editbenpel($con,$c_benpel,$c_katbenpel,$benpel,$bobot){
    $akh=mysqli_query($con,"UPDATE benpel set benpel='$benpel',bobot='$bobot' where c_benpel='$c_benpel' ");
    $akh2=mysqli_query($con,"UPDATE pelanggaran set bobot='$bobot' where c_benpel='$c_benpel' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../bentukpelanggaran/'.$c_katbenpel.'');
  }
  function editbenpel2($con,$c_benpel,$c_katbenpel,$benpel,$bobot){
    $akh=mysqli_query($con,"UPDATE benpel set benpel='$benpel',bobot='$bobot' where c_benpel='$c_benpel' ");
    $akh2=mysqli_query($con,"UPDATE pelanggaran set bobot='$bobot' where c_benpel='$c_benpel' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../bentukpelanggaran');
  }
  function hapusbenpel($con,$c_benpel,$c_katbenpel){
    $akh=mysqli_query($con,"DELETE from benpel where c_benpel='$c_benpel' ");
    $akh2=mysqli_query($con,"DELETE from pelanggaran where c_benpel='$c_benpel' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../bentukpelanggaran/'.$c_katbenpel.'');
  }
  function hapusbenpel2($con,$c_benpel){
    $akh=mysqli_query($con,"DELETE from benpel where c_benpel='$c_benpel' ");
    $akh2=mysqli_query($con,"DELETE from pelanggaran where c_benpel='$c_benpel' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../bentukpelanggaran');
  }
//sanksi
  function addsanksi($con,$c_sanksi,$kriteria,$dari,$sampai,$sanksi){
    $akh=mysqli_query($con,"INSERT INTO sanksi set c_sanksi='$c_sanksi',kriteria='$kriteria',bobot_dari='$dari',bobot_sampai='$sampai',sanksi='$sanksi' ");
    session_start();
    $_SESSION['pesan']='tambah';
    header('location:../../addsanksi');
  }
   function editsanksi($con,$c_sanksi,$kriteria,$dari,$sampai,$sanksi){
    $akh=mysqli_query($con,"UPDATE sanksi set kriteria='$kriteria',bobot_dari='$dari',bobot_sampai='$sampai',sanksi='$sanksi' where c_sanksi='$c_sanksi' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../sanksipelanggaran');
  }
  function hapussanksi($con,$c_sanksi){
    $akh=mysqli_query($con,"DELETE FROM sanksi where c_sanksi='$c_sanksi' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../sanksipelanggaran');
  }
//kelas
  function addkelas($con,$c_kelas,$kelas){
    $akh=mysqli_query($con,"INSERT INTO kelas set c_kelas='$c_kelas',kelas='$kelas' ");
    session_start();
    $_SESSION['pesan']='tambah';
    header('location:../../kelas');
  }
  function editkelas($con,$c_kelas,$kelas){
    $akh=mysqli_query($con,"UPDATE kelas set kelas='$kelas' where c_kelas='$c_kelas' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../kelas');
  }
  function hapuskelas($con,$c_kelas){
    $losis=mysqli_query($con,"SELECT * FROM siswa where c_kelas='$c_kelas' ");while($load=mysqli_fetch_array($losis)){
      $akh=mysqli_query($con,"DELETE FROM orangtua where c_siswa='$load[c_siswa]' ");
      $akh2=mysqli_query($con,"DELETE FROM pelanggaran where c_siswa='$load[c_siswa]' ");
      $akh3=mysqli_query($con,"DELETE FROM siswa where c_siswa='$load[c_siswa]' ");
    }
    $akh4=mysqli_query($con,"DELETE FROM kelas where c_kelas='$c_kelas' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../kelas');
  }
//siswa
  function addsiswa($con,$c_siswa,$c_kelas,$nisn,$nama,$jk,$alamat,$tl){
    $akh=mysqli_query($con,"INSERT INTO siswa set c_siswa='$c_siswa',c_kelas='$c_kelas',nisn='$nisn',nama='$nama',jk='$jk',alamat='$alamat',tl='$tl' ");
    session_start();
    $_SESSION['pesan']='tambah';
    header('location:../../addsiswa/'.$c_kelas.'');
  }
  function editsiswa($con,$c_siswa,$nisn,$nama,$jk,$alamat,$tl){
    $akh=mysqli_query($con,"UPDATE siswa set nisn='$nisn',nama='$nama',jk='$jk',alamat='$alamat',tl='$tl' where c_siswa='$c_siswa' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../editsiswa/'.$c_siswa.'');
  }
  function hapussiswa($con,$c_siswa,$c_kelas){
    $akh=mysqli_query($con,"DELETE from pelanggaran where c_siswa='$c_siswa' ");
    $akh2=mysqli_query($con,"DELETE from orangtua where c_siswa='$c_siswa' ");
    $akh3=mysqli_query($con,"DELETE from siswa where c_siswa='$c_siswa' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../siswa/'.$c_kelas.'');
  }
  function hapussiswa2($con,$c_siswa){
    $akh=mysqli_query($con,"DELETE from pelanggaran where c_siswa='$c_siswa' ");
    $akh2=mysqli_query($con,"DELETE from orangtua where c_siswa='$c_siswa' ");
    $akh3=mysqli_query($con,"DELETE from siswa where c_siswa='$c_siswa' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../siswa');
  }
//guru
  function addguru($con,$c_guru,$nama,$username,$password){
    $akh=mysqli_query($con,"INSERT INTO guru set c_guru='$c_guru',nama='$nama',username='$username',password='$password' ");
    session_start();
    $_SESSION['pesan']='tambah';
    header('location:../../addguru');
  }
  function editguru($con,$c_guru,$nama,$username,$password){
    $akh=mysqli_query($con,"UPDATE guru set nama='$nama',username='$username',password='$password' where c_guru='$c_guru' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../editguru/'.$c_guru.'');
  }
  function hapusguru($con,$c_guru){
    $akh=mysqli_query($con,"DELETE from pelanggaran where c_guru='$c_guru' ");
    $akh2=mysqli_query($con,"DELETE FROM chat where c_guru='$c_guru' ");
    $akh3=mysqli_query($con,"DELETE FROM relasichat where c_guru='$c_guru' ");
    $akh4=mysqli_query($con,"DELETE from guru where c_guru='$c_guru' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../guru');
  }
//orangtua
  function inputorangtua($con,$c_orangtua,$c_siswa,$nama,$username,$password){
    $akh=mysqli_query($con,"INSERT INTO orangtua set c_orangtua='$c_orangtua',c_siswa='$c_siswa',nama='$nama',username='$username',password='$password' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../orangtua/'.$c_siswa.'');
  }
  function editorangtua($con,$c_orangtua,$c_siswa,$nama,$username,$password){
    $akh=mysqli_query($con,"UPDATE orangtua set c_siswa='$c_siswa',nama='$nama',username='$username',password='$password' where c_orangtua='$c_orangtua' ");
    session_start();
    $_SESSION['pesan']='edit';
    header('location:../../orangtua/'.$c_siswa.'');
  }
  function hapusorangtua($con,$c_orangtua){
    $akh=mysqli_query($con,"DELETE FROM orangtua where c_orangtua='$c_orangtua' ");
    $akh2=mysqli_query($con,"DELETE FROM chat where c_orangtua='$c_orangtua' ");
    $akh3=mysqli_query($con,"DELETE FROM relasichat where c_orangtua='$c_orangtua' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../walimurid');
  }
//pelanggaran
  function hapuspel($con,$c_pelanggaran){
    $akh=mysqli_query($con,"DELETE FROM pelanggaran where c_pelanggaran='$c_pelanggaran' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../pelanggaransiswa');
  }
  function hapuspelsiswa($con,$c_pelanggaran){
    $akh=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM pelanggaran where c_pelanggaran='$c_pelanggaran' "));
    $akh2=mysqli_query($con,"DELETE FROM pelanggaran where c_pelanggaran='$c_pelanggaran' ");
    session_start();
    $_SESSION['pesan']='hapus';
    header('location:../../../lihatpelanggaransiswa/'.$akh['c_siswa'].'');
  }
  
}
?>
