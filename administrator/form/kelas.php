<?php

if(!empty($_GET['act']))
{
	$id=$_GET['id'];
	$kls=$_GET['kelas'];
	$ak=$_GET['act'];
}
else
{
	include_once"koneksi.php";
	$id=mysqli_query($con,"select coalesce(max(substring(id_kelas,2,9)),0)+1 as no from kelas") or die ('Gagal Pencarian Data!!!');
	$k = mysqli_fetch_assoc($id);
	$kode = $k['no'];
		for ($i=1; $i<=6-strlen($kode); $i++)
			{ $kode='0'.$kode;}

		$id = 'K'.$kode;
	$kls='';
	$ak='';
}

?>

<form name="frm" action="man/m_kelas.php?ak=<?php echo $ak; ?>" method="post">
<ul class="form-style-1">
	<li>
		<label>Id Kelas</label>
		<input type="text" name="id" required=reuired value="<?php echo $id; ?>" readonly=readonly  /></br>
	</li>
	<li>
		<label>Kelas</label>
		<input type="text" name="kelas" required=required value="<?php echo $kls; ?>"/></br>
	</li>
	<li>
		<input type="submit" value="Simpan"/> <input type="reset" value="Bersih"/>
	</li>
</ul>
</form>