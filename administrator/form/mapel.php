<?php
	if(!empty($_GET['act']))
	{
		$id= $_GET['id_mapel'];
		$nm= $_GET['nama_mapel'];
		$jrs= $_GET['jurusan'];
		$tngkt= $_GET['tingkat'];
		$kkm= $_GET['kkm'];
		$ak =$_GET['act'];
	}
	else
	{
		include_once"koneksi.php";
		$id=mysqli_query($con,"select coalesce(max(substring(id_mapel,2,9)),0)+1 as no from mata_pelajaran") or die ('Pencarian Gagal!!!');
	$k = mysqli_fetch_assoc($id);
	$kode = $k['no'];
			for ($i=1; $i<=6-strlen($kode); $i++)
				{$kode='0'.$kode;}

		$id='M'.$kode;
		$nm='';
		$jrs='';
		$kkm= '';
		$ak='';	
		$tngkt='';	
	}
?>

<form name="frm" action="man/m_mapel.php?ak=<?php echo $ak; ?>" method="post">
	<ul class="form-style-1">
		<li>
			<label>Id Mata Pelajaran</label>
			<input type="text" name="id_mapel" required=required value="<?php echo $id; ?>" readonly=readonly /> </br>
		</li>
		<li>
			<label>Nama</label>
			<input type="text" placeholder='Nama Mapel' name="nama_mapel" required=required value="<?php echo $nm; ?>"/> </br>
		</li>
		<li>
			<label>Jurusan</label>	
			<input type="radio" name="jurusan" value="umum" <?php if($jrs == 'umum'){
			echo "checked='checked'"; }  ?> /> UMUM

			<input type="radio" name="jurusan" value="ipa" <?php if($jrs == 'ipa'){
			echo ' checked=checked'; } ?> />IPA 

			<input type="radio" name="jurusan" value="ips" <?php if($jrs == 'ips'){
			echo 'checked=checked'; } ?> />IPS </br>
		</li>
		<li>
			<label>Tingkat</label>
			<input type=" text" placeholder='Tingkat' name="tingkat" value="<?php echo $tngkt; ?>"></br>
		</li>
		<li>
			<label>KKM</label>
			<input type="text" placeholder='KKM' name="kkm" required=required value="<?php echo $kkm; ?>"> </br>
		</li>
		<li>
			<input type="submit" value="Simpan"/> <input type="reset" value="Bersih">
		</li>
	</ul>
</form>
