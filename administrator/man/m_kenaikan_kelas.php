<?php
$nis=$_POST['nis'];
$kls=$_POST['id_kelas'];
$view=$_POST['view'];
$kk=$_POST['kk'];
$ta = $_POST['ta'];

include_once"../koneksi.php";

	mysqli_query($con,"update siswa set id_kelas='$kls',jurusan='$view' where nis='$nis' ") or die('Gagal Hapus Data!!!');
	mysqli_query($con,"insert into tahun_ajaran values('$ta','$nis','$kls') ") or die('Gagal Hapus Data!!!');


header('location:../?kk='.$kls.'&data=sukses');
?>