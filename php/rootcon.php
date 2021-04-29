<?php
class con{
	function loginguru($con,$username,$password){
		$sql=mysqli_fetch_array(mysqli_query($con,"SELECT * from guru where username='$username' AND password='$password' "));
		if($sql!=NULL){
			session_start();$_SESSION['c_guru']=$sql['c_guru'];
			header('location:../guru');
		}
		else{
			$_SESSION['pesan']="gagal";
			header('location:../login');
		}
	}
	function loginadmin($con,$username,$password){
		$sql=mysqli_fetch_array(mysqli_query($con,"SELECT * from admin where username='$username' AND password='$password' "));
		if($sql!=NULL){
			session_start();$_SESSION['c_admin']=$sql['c_admin'];
			header('location:../admin/');
		}
		else{
			$_SESSION['pesan']="gagal";
			header('location:../login');
		}
	}
	function loginwali($con,$username,$password){
		$sql=mysqli_fetch_array(mysqli_query($con,"SELECT * from orangtua where username='$username' AND password='$password' "));
		if($sql!=NULL){
			session_start();$_SESSION['c_orangtua']=$sql['c_orangtua'];
			header('location:../walimurid/');
		}
		else{
			$_SESSION['pesan']="gagal";
			header('location:../login');
		}
	}
	function logout(){
		session_start();unset($_SESSION['c_admin']);unset($_SESSION['c_guru']);unset($_SESSION['c_orangtua']);unset($_SESSION['pesan']);session_destroy();header('location:../login');
	}
}
?>