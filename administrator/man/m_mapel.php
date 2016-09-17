<?php

$id= $_REQUEST['id_mapel'];
$nm= $_POST['nama_mapel'];
$jrs= $_POST['jurusan'];
$tngkt= $_POST['tingkat'];
$kkm= $_POST['kkm'];

include_once "../koneksi.php";

if(!empty($_GET['ak']) and $_GET['ak']=='edit'){
	mysqli_query($con,"update mata_pelajaran set nama_mapel='$nm', jurusan='$jrs', tingkat='$tngkt', kkm='$kkm' where id_mapel='$id'") or die ('Gagal Edit Data!!!');
}
else
if(!empty($_GET['ak']) and $_GET['ak']=='hapus'){
	mysqli_query($con,"delete from mata_pelajaran where id_mapel='$id' ") or die('Gagal Hapus Data!!!');
}
else
{
	mysqli_query($con,"insert into mata_pelajaran values('$id','$nm','$jrs','$tngkt','$kkm')") or die ('Gagal Input Data !!!');
}
header('location:../?panggil=mapel');

?>
