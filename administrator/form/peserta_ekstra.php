<?php
$id_kls=$_GET['view'];

if(!empty($_GET['act']))
{
//	$id_peks=$_GET['id_peserta_ekstrakurikuler'];
	$nis=$_GET['nis'];
//	$id_eks=$_GET['id_ekstrakurikuler'];
	$kls=$_GET['kelas'];
	$jrs=$_GET['jurusan'];
}

	include_once "koneksi.php";
	$id=mysqli_query($con,"select coalesce(max(substring(id_peserta_ekstrakurikuler,2,9)),0)+1 as no from peserta_ekstrakurikuler") or die ('Gagal Pencarian Data!!!');
	$view = mysqli_fetch_assoc($id);
	$kode = $view['no'];

		for ($peks=1; $peks<=6-strlen($kode); $peks++)
			{ $kode='0'.$kode;}
	$id_peks='P'.$kode;
	$id_eks='';
	$kls=$_GET['kelas'];


?>
<form action="man/m_peserta_ekstrakurikuler.php" method="POST">
	<ul class="form-style-1">
		<li>
			<label>Id Peserta Ekstrakurikuler</label>
			<input type="text" name="id_peserta_ekstrakurikuler" value="<?php echo $id_peks; ?>" readonly=readonly></br>
		</li>
		<li>
			<label>Nis</label>
			<input type="text" name="nis" value="<?php echo $nis; ?>" readonly=readonly></br>
		</li>
		<li>
			<input type="hidden" name="view" value="<?php echo $id_kls; ?>" />
		</li>
		<li>
			<label>Ekstrakurikuler</label>
			<select name="id_ekstrakurikuler" required=required>
			<?php include_once "koneksi.php";
					$cari = mysqli_query($con,"select * from ekstrakurikuler where id_ekstrakurikuler not in (select id_ekstrakurikuler from peserta_ekstrakurikuler where nis='$nis' and kelas=left('$kls',2) ) ") or die ('Pencarian Gagal !!!');
					if(mysqli_num_rows($cari)>0)
					{	
							while ($k = mysqli_fetch_assoc($cari))
							{	
								echo "<option value='".$k['id_ekstrakurikuler']."'"; if($id_eks==$k['id_ekstrakurikuler']){ echo 'selected=selected'; }  echo" >".$k['nama']."</option>";
							}	
			    	} 
			 ?>	
			</select> </br>
		</li>
		<li>
			<label>Kelas</label>
			<input type="text" name="kelas" value="<?php echo substr($kls,0,3); ?>" readonly=readonly></br>
		</li>
		<li>
			<label>Jurusan</label>
			<input type="text" name="jurusan" value="<?php echo substr($jrs,0,8); ?>" readonly=readonly></br>
		</li>
		<li>
			<label>Nilai</label>
			<select name='nilai' required='reqired'>
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="C">C</option>
				<option value="D">D</option>
			</select>
			</br>
		</li>
		<li>
			<input type="submit" value="Simpan">
		</li>
	</ul>
</form>