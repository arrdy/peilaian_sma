<?php
if(! empty($_GET['act']))
{
	$id=$_GET['id_ekstrakurikuler'];
	$nm=$_GET['nama'];
	$ak=$_GET['act'];
}
else
{
	include_once"koneksi.php";
		$id = mysqli_query($con,"select coalesce(max(substring(id_ekstrakurikuler,2,9)),0)+1 as no from ekstrakurikuler") or die ('Pencarian Gagal!!!');
	$k = mysqli_fetch_assoc($id);
	$kode = $k['no'];
			for ($i=1; $i<=6-strlen($kode); $i++)
				{$kode='0'.$kode;}
		$id='E'.$kode;
	$nm='';
	$ak='';
}
?>

<form name="frm" action="man/m_ekstrakurikuler.php?ak=<?php echo $ak; ?>" method="POST">
	<ul class="form-style-1">
		<li>
			<label>Id Ekstrakurikuler</label>
			<input type="text" name="id_ekstrakurikuler" required=required value="<?php echo $id ?>" readonly=readonly /></br>
		</li>
		<li>
			<label>Nama</label>
			<input type="text" name="nama" required=required value="<?php echo $nm ?>" /></br>
		</li>
		<li>
			<input type="submit" value="Simpan"/> <input type="reset" value="Bersih"/>
		</li>
	</ul>	
</form>