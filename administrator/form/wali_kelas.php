<?php
if(!empty($_GET['act']))
{
	$id=$_GET['id_walikelas'];
	$guru=$_GET['id_guru'];
	$kls=$_GET['id_kelas'];	
	$ak=$_GET['act'];
}
else
{
	include_once"koneksi.php";
	$id=mysqli_query($con,"select coalesce(max(substring(id_walikelas,2,9)),0)+1 as no from wali_kelas") or die ('Gagal Pencarian Data!!!');
	$k = mysqli_fetch_assoc($id);
	$kode = $k['no'];
		for ($i=1; $i<=6-strlen($kode); $i++)
			{ $kode='0'.$kode;}
	$id='W'.$kode;
	$guru='';
	$kls='';
	$ak='';
}

?>

<form name="frm" action="man/m_wali_kelas.php?ak=<?php echo $ak; ?>" method="POST">
	<ul class="form-style-1">
		<li>
			<label>Id Walikelas</label>
			<input type="text" name="id_walikelas" value="<?php echo $id; ?>" readonly=readonly></br>
		</li>
		<li>
			<label>Guru</label>
			<select name="id_guru" required=required >
			<?php include_once "koneksi.php";
					$cari = mysqli_query($con,"select * from guru where id_guru not in (select id_guru from wali_kelas) ") or die ('Pencarian Gagal !!!');
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
			<label>Kelas</label>
			<select name="id_kelas" required=required>
				<?php include_once "koneksi.php";
					$cari = mysqli_query($con,"select * from kelas where id_kelas not in (select id_kelas from wali_kelas) ") or die('Gagal Pencarian!!!');
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