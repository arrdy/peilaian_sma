<?php
$nis=$_REQUEST['nis'];
$nm=$_POST['nama'];
$kls=$_POST['id_kelas'];
$jrs=$_POST['jurusan'];
$tmpt_lhr=$_POST['tempat_lahir'];
$tgl_lhr=$_POST['tgl_lahir'];
$jenis_k=$_POST['gender'];
$agm=$_POST['agama'];
$status_k=$_POST['status_keluarga'];
$anak_k=$_POST['anak_ke'];
$alm=$_POST['alamat'];
$no_tlp=$_POST['no_telp'];
$nm_ayah=$_POST['nama_ayah'];
$nm_ibu=$_POST['nama_ibu'];
$alm_ortu=$_POST['alamat_ortu'];
$pkrjn_ayah=$_POST['pekerjaan_ayah'];
$pkrjn_ibu=$_POST['pekerjaan_ibu'];
$pass_siswa=$_POST['password_siswa'];
$pass_ortu=$_POST['password_ortu'];
$ta=$_POST['ta'];

include_once"../koneksi.php";
if(!empty($_GET['ak']) and $_GET['ak']=='edit'){
	mysqli_query($con,"update siswa set tahun_ajaran='$ta',nama='$nm',id_kelas='$kls',jurusan='$jrs',tempat_lahir='$tmpt_lhr',tgl_lahir='$tgl_lhr',jenis_kelamin='$jenis_k',agama='$agm',status_keluarga='$status_k',anak_ke='$anak_k',alamat='$alm',no_telp='$no_tlp',nama_ayah='$nm_ayah',nama_ibu='$nm_ibu',alamat_ortu='$alm_ortu',pekerjaan_ayah='$pkrjn_ayah',pekerjaan_ibu='$pkrjn_ibu',password_siswa='$pass_siswa',password_ortu='$pass_ortu' where nis='$nis'") or die('Gagal Edit Data!!!');
}
else 
if(!empty($_GET['ak']) and $_GET['ak']=='hapus'){
	mysqli_query($con,"delete from siswa where nis='$nis'") or die('Gagal Hapus Data!!!');

}
else
{
	mysqli_query($con,"insert into siswa values('$nis','$nm','$kls','$jrs','$tmpt_lhr','$tgl_lhr','$jenis_k','$agm',
		'$status_k','$anak_k','$alm','$no_tlp','$nm_ayah','$nm_ibu','$alm_ortu','$pkrjn_ayah','$pkrjn_ibu','$pass_siswa','$pass_ortu','$ta')") or die ('Gagal Input Data!!!');
}
header('location:../?panggil=siswa');
?>