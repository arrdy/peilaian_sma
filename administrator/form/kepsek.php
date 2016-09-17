<?php
if(!empty($_GET['act']))
{
	$nip=$_GET['nip'];
	$nm=$_GET['nama'];
	$alm=$_GET['alamat'];
	$ak=$_GET['act'];
}
else
{
	$nip='';
	$nm='';
	$alm='';
	$ak='';
}

?>


<form name="frm" action="man/m_kepsek.php?ak=<?php echo $ak; ?>" method="POST">
<ul class="form-style-1">
	<li>
	<label>Nip</label>
		<input type="text" name="nip" placeholder='Nip' value="<?php echo $nip; ?>">
	</li>
	<li>
	<label>Nama</label>
		<input type="text" name="nama" placeholder='Nama' value="<?php echo $nm; ?>">
	</li>
	<li>
	<label>Alamat</label>
		<input type="text" name="alamat" placeholder='Alamat' value="<?php echo $alm; ?>">
	</li>
	<li>
		<input type="submit" value="Simpan"/> <input type="reset" value="Bersih">
	</li>
</ul>

</form>