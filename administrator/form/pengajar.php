<?php
	if(!empty($_GET['act']))
	{
		$id=$_GET['id_pengajar'];
		$guru=$_GET['id_guru'];
		$mapel=$_GET['id_mapel'];
		$kls=$_GET['id_kelas'];
		$ak=$_GET['act'];
	}
	else
	{
		/* kode otomatis*/
	include_once"koneksi.php";
	$id = mysqli_query($con,"select coalesce(max(substring(id_pengajar,2,9)),0)+1 as no from pengajar") or die ('Gagal Pencarian!!!');
	$k = mysqli_fetch_assoc($id);
	$kode = $k['no'];
		for($i=1; $i<=6-strlen($kode); $i++)
			{$kode='0'.$kode;}   /*end kode*/
		$id='P'.$kode;
		$guru='';
		$mapel='';
		$kls='';
		$ak='';
	}
?>

<form name="frm" action="man/m_pengajar.php?ak=<?php echo $ak; ?>" method="POST">
	<ul class="form-style-1">
		<li>
			<label>Id Pengajar</label>
			<input type="text" name="id_pengajar" required=required value="<?php echo $id; ?>" readonly=readonly /> </br>
		</li>
		<li>
			<label>Guru</label>
				<select name="id_guru" required=required >
				<?php include_once "koneksi.php";
						$cari = mysqli_query($con,"select * from guru") or die ('Pencarian Gagal !!!');
						if(mysqli_num_rows($cari)>0)
						{	
								while ($g = mysqli_fetch_assoc($cari))
								{	
									echo "<option value='".$g['id_guru']."'"; if($guru==$g['id_guru']){ echo 'selected=selected'; }  echo"> ".$g['nama']."</option>";
								}	
				    	} 
				 ?>
				</select></br>
		</li>
		<li>
			<label>Mata Pelajaran</label>
				<select name="id_mapel" required=required>
					<?php include_once "koneksi.php";
						$cari = mysqli_query($con,"select * from mata_pelajaran") or die('Pencarian Gagal!!!');
						if(mysqli_num_rows($cari)>0)
						{
							while ($m = mysqli_fetch_assoc($cari))
							{
								echo "<option value='".$m['id_mapel']."'"; if($mapel==$m['id_mapel']) {echo 'selected=selected';} echo"> ".$m['nama_mapel']." </option>";
							}
						}
					?>	
				</select><br>
		</li>
		<li>
			<label>Kelas</label>
				<select name="id_kelas" required=required>
					<?php include_once "koneksi.php";
						$cari = mysqli_query($con,"select * from kelas") or die('Gagal Pencarian!!!');
						if(mysqli_num_rows($cari)>0)
						{
							while ($k=mysqli_fetch_assoc($cari))
							{
								echo "<option value='".$k['id_kelas']."'"; if($kls==$k['id_kelas']) {echo 'selected=selected';} echo"> ".$k['kelas']." </option>";
							}
						}

					?>
				</select></br>
		</li>
		<li>
				<input type="submit" value="Simpan"/> <input type="reset" value="Bersih"/>
		</li>
	</ul>
</form>