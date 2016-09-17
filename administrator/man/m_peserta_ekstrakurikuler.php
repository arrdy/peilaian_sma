<?php
$id_pes=$_REQUEST['id_peserta_ekstrakurikuler'];
$nis=$_POST['nis'];
$nilai=$_POST['nilai'];
$id_eks=$_POST['id_ekstrakurikuler'];
$kls=substr($_POST['kelas'],0,2);
$view=$_REQUEST['view'];

include_once"../koneksi.php";

if(!empty($_GET['ak']) and $_GET['ak']=='hapus'){
	mysqli_query($con,"delete from peserta_ekstrakurikuler where id_peserta_ekstrakurikuler='$id_pes'") or die('Gagal Hapus Data!!!');
}
else 
{
	mysqli_query($con,"insert into peserta_ekstrakurikuler values('$id_pes','$nis','$id_eks','$kls','$nilai')") or die ('Gagal Input Data!!!');
}
header('location:../?eks='.$view);
?>