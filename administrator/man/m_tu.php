<?php

$id= $_REQUEST['id'];
$nama= $_POST['nama'];
$jab= $_POST['jab'];
$alm= $_POST['alamat'];
$us= $_POST['user'];
$pas= $_POST['pass'];

include_once "../koneksi.php";

if(!empty($_GET['ak']) and $_GET['ak']=='edit'){
	mysqli_query($con,"update tata_usaha set nama='$nama',jabatan='$jab',alamat='$alm',username='$us',password='$pas' WHERE id_tatausaha='$id' ") or die('Gagal ubah data !');
}
else
if(!empty($_GET['ak']) and $_GET['ak']=='hapus'){
	mysqli_query($con,"delete from tata_usaha where id_tatausaha='$id'") or die('Gagal Hapus Data!!!');
}
else
{	
	mysqli_query($con,"insert into tata_usaha values('$id','$nama','$jab','$alm','$us','$pas') ") or die('Gagal input data !!!');
}

header('location:../?panggil=tu');

?>