<?php
$id = $_REQUEST['id'];
$kls=$_POST['kelas'];

include_once"../koneksi.php";

if(!empty($_GET['ak']) and $_GET['ak']=='edit'){
	mysqli_query($con,"update kelas set kelas='$kls' where id_kelas='$id'") or die('Gagal Edit Data!!!');
}
else
if(!empty($_GET['ak']) and $_GET['ak']=='hapus'){
	mysqli_query($con,"delete from kelas where id_kelas='$id'") or die('Gagal Hapus Data!!!');
}
else
{
	mysqli_query($con,"insert into kelas values('$id','$kls')") or die('Gagal Input Data!!!');
}
    header('location:../?panggil=kelas');
?>