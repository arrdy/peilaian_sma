<?php
echo $_REQUEST['id_pengajar'];

	$id= $_REQUEST['id_pengajar'];
	$guru=$_POST['id_guru'];
	$mapel=$_POST['id_mapel'];
	$kls=$_POST['id_kelas'];

	include_once"../koneksi.php";

	if(!empty($_GET['ak']) and $_GET['ak']=='edit'){
		mysqli_query($con,"update pengajar set id_guru='$guru',id_mapel='$mapel',id_kelas='$kls' where id_pengajar='$id' ") or die('Gagal Edit Data!!!');
	}
	else
	if(!empty($_GET['ak']) and $_GET['ak']=='hapus'){
			mysqli_query($con,"delete from pengajar where id_pengajar='$id'") or die('Gagal hapus data!!!');
			echo "string";
		}
	else
	{
		mysqli_query($con,"insert into pengajar values('$id','$guru','$mapel','$kls')") or die('Gagal Input Data!!!');
	}
	header('location:../?panggil=pengajar');


?>
