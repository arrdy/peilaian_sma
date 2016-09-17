
<?php
include_once "../koneksi.php";

$p = $_REQUEST['pengajar'];
$tgl = $_REQUEST['tgl'];
$sem = $_REQUEST['sem'];

if(!empty($_GET['ak']) and $_GET['ak']=='edit')
{
	for($i=1;$i<$_POST['jumlah'];$i++)
	{ 
		$id = $_POST['ida'.$i]; 
		$ket = $_POST['a'.$i];  
		mysqli_query($con,"update absensi set semester='$sem',keterangan='$ket' where id_absensi='$id' ");
		header('location:../?panggil=absensi');
	}
}
else if(!empty($_GET['ak']) and $_GET['ak']=='hapus')
{
		mysqli_query($con,"delete from absensi where id_pengajar='$p' and tgl='$tgl' ");
		header('location:../?panggil=absensi');
}
else 
{
	$cari = mysqli_query($con,"select * from absensi where id_pengajar='$p' and tgl='$tgl' ");
	if (mysqli_num_rows($cari)>0)
	{ header('location:../?pengajar='.$p.'&form=absen&info=gagal'); }
	else
	{	
			for($i=1;$i<$_POST['jumlah'];$i++)
			{ 
				$nis = $_POST['nis'.$i]; 
				$ket = $_POST['a'.$i];  
				mysqli_query($con,"insert into absensi values ('','$nis','$p','$sem','$tgl','$ket') ");
				header('location:../?panggil=absensi');
			}
	}	
}


?>