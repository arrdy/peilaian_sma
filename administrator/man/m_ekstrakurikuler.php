<?php
$id=$_REQUEST['id_ekstrakurikuler'];
$nm=$_POST['nama'];

include_once"../koneksi.php";
if(!empty($_GET['ak']) and $_GET['ak']=='edit')
{
	mysqli_query($con,"update ekstrakurikuler set nama='$nm' where id_ekstrakurikuler='$id' ") or die('Gagal Edit Data!!!');
}
else
if(!empty($_GET['ak']) and $_GET['ak']=='hapus'){
	mysqli_query($con,"delete from ekstrakurikuler where id_ekstrakurikuler='$id'") or die ('Gagal Hapus Data!!!');
	echo "masuk";
}
else
{
	mysqli_query($con, "insert into ekstrakurikuler values('$id','$nm') ") or die('Gagal Input Data!!!');
}
header('location:../?panggil=ekstrakurikuler');

?>