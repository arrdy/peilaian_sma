
<?php
include_once "../koneksi.php";

$sem = $_REQUEST['sem'];
$tgl = $_POST['tgl'];
$kkm = $_POST['kkm'];
$id  = $_REQUEST['id'];
$pengajar = $_REQUEST['pengajar'];
$status = $_POST['status'];
$id_kelas = $_POST['id_kelas'];
$ket = $_POST['ket'];

if(!empty($_GET['ak']) and $_GET['ak']=='edit')
{
	for($i=1;$i<$_POST['jumlah'];$i++)
	{ 
		$idn = $_POST['idn'.$i]; 
		$nilai = $_POST['n'.$i];
		mysqli_query($con,"update nilai set nilai='$nilai' where id_nilai='$idn' ");
	}
}
else if(!empty($_GET['ak']) and $_GET['ak']=='hapus')
{

		mysqli_query($con,"delete from penilaian where id_penilaian='$id'");
		mysqli_query($con,"delete from nilai where id_penilaian='$id'");;
}
else 
{
	mysqli_query($con,"insert into penilaian values ('$id','$pengajar','$status','$tgl','$ket','$kkm','$id_kelas','$sem') ");

	for($i=1;$i<$_POST['jumlah'];$i++)
	{ 
		$nis = $_POST['nis'.$i]; 
		$nilai = $_POST['n'.$i];  
		mysqli_query($con,"insert into nilai values ('','$id','$nis','$nilai') ");
	}
}
	header('location:../?pn='.$pengajar."&sem=".$sem);
?>