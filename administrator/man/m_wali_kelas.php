<?php
$id=$_REQUEST['id_walikelas'];
$guru=$_POST['id_guru'];
$kls=$_POST['id_kelas'];

include_once"../koneksi.php";

if(!empty($_GET['ak']) and $_GET['ak']=='edit'){
		mysqli_query($con,"update wali_kelas set id_guru='$guru',id_kelas='$kls' where id_walikelas='$id' ") or die('Gagal Edit Data!!!');
}
else 
if (!empty($_GET['ak']) and $_GET['ak']=='hapus'){
	mysqli_query($con, "delete from wali_kelas where id_walikelas='$id'") or die('Gagal Hapus Data!!!');

}
else
{
mysqli_query($con,"insert into wali_kelas values('$id','$guru','$kls')") or die('Gagal Input Data!!!');
}
header('location:../?panggil=wali_kelas');
?>