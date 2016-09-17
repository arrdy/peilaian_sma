<?php
$pl = $_POST['passwordl'];
$pb1 = $_POST['passwordb1'];
$pb2 = $_POST['passwordb2'];

include_once"../koneksi.php"; 
session_start();
$id=$_SESSION['id'];
$l=$_SESSION['level'];

	if($l=='tata_usaha')
	{
			$cek=mysqli_query($con,"select * from tata_usaha where id_tatausaha='$id' ") or die ('Gagal Pencarian Data!!!');
	}
	else if ($l=='siswa') 
	{
			$cek=mysqli_query($con,"select password_siswa as password from siswa where nis='$id' ") or die ('Gagal Pencarian Dsata!!!');
	}
	else if ($l=='ortu') 
	{
			$cek=mysqli_query($con,"select password_ortu as password from siswa where nis='$id' ") or die ('Gagal Pencarian Data!!!');
	}
	else
	{
		$cek=mysqli_query($con,"select password from guru where id_guru='$id' ") or die ('Gagal Pencarian Dsata!!!');	
	}

$t = mysqli_fetch_assoc($cek);
$pas_lama = $t['password'];
 
if($pas_lama != $pl)	
{
	header('location:../?form=ganti_pass&pas=pl');
}
else if($pb1 != $pb2){
	header('location:../?form=ganti_pass&pas=pb');	
}

else
{
	if($l=='tata_usaha')
	{
			$cari=mysqli_query($con,"update tata_usaha set password='$pb1' where id_tatausaha='$id' ") or die ('Gagal Pencarian Data!!!');
	}
	else if ($l=='siswa') 
	{
			$cari=mysqli_query($con,"update siswa set password_siswa='$pb1' where nis='$id' ") or die ('Gagal Pencarian Data!!!');
	}
	else if ($l=='ortu') 
	{
			$cari=mysqli_query($con,"update siswa set password_ortu='$pb1' where nis='$id' ") or die ('Gagal Pencarian Data!!!');
	}
	else
	{
		mysqli_query($con,"update guru set password='$pb1' where id_guru='$id' ") or die('Gagal Edit Data!!!');	
	}
	header('location:../?form=ganti_pass&pas=sukses');
}
?>