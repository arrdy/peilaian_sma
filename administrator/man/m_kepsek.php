<?php
$nip=$_REQUEST['nip'];
$nm=$_POST['nama'];
$alm=$_POST['alamat'];

include_once"../koneksi.php";
if(!empty($_GET['ak']) and $_GET['ak']=='edit')
{
	mysqli_query($con," update kepsek where nip='$nip'") or die('Gagal Updata Data!!!...');
}
else
if(!empty($_GET['ak']) and $_GET['ak']=='hapus')
{
	mysqli_query($con,"delete from kepsek where nip='$nip'") or die ('Gagal delete Data!!!...');
}
else
{
	mysqli_query($con,"insert into kepsek values ('$nip','$nm','$alm')") or die('Gagal Pencarian!!!...');
}
header('location:../?panggil=kepsek');
?>