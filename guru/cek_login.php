<?php
session_start();
	$user = mysql_real_escape_string($_POST['user']);
	$pass = mysql_real_escape_string($_POST['pass']);
	require_once "../config/koneksi.php";
	$cari = mysqli_query($con,"select *,'guru' as level from guru where username='$user' and password='$pass'  ") or die ( mysqli_error());
	$htng = mysqli_num_rows($cari);
	if(($_SESSION["Captcha"]!=$_POST["nilaiChaptcha"]))
	{ $r= $_POST["nilaiChaptcha"];
		header('location:index.php?pass=capca&user='.$user); }
	else if($htng!=0)
	{
		$u= mysqli_fetch_assoc($cari);
		
			$_SESSION['id']= $u['id_guru'];
			$_SESSION['nama']= $u['nama'];
			$_SESSION['level']= $u['level'];
		header('location:../administrator/home.php');
	}else{
		header('location:index.php?pass=cek&user='.$user);
	}
?>