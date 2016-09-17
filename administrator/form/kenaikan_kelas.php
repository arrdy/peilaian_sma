<?php

	$id_kls = $_GET['view'];
	$nis = $_GET['nis'];
	$nama = $_GET['nama'];
	$kls = $_GET['kelas'];
	$jrs = $_GET['jurusan'];
	$ta = $_GET['ta'];

	$taw = explode("/", $ta);

	include_once "koneksi.php";


?>
<form action="man/m_kenaikan_kelas.php" method="POST">
	<ul class="form-style-1">
		<li>
			<label>Nis</label>
			<input type="text" name="nis" value="<?php echo $nis; ?>" readonly=readonly></br>
		</li>
		<li>
			<label>Nama</label>
			<input type="text" name="nama" value="<?php echo $nama; ?>" readonly=readonly></br>
		</li>
		<li>
			<label>Jurusan</label>
		<?php if($_GET['jurusan']!='umum'){ ?>	
			<input type="text" name="view" value="<?php echo $jrs; ?>" readonly=readonly />
			<input type="hidden" name="view" value="<?php echo $id_kls; ?>" />
		<?php 
		}else
		{
		?>
		<select name='view'>		
			<option value='ipa' <?php if($_GET['jurusan']=='ipa'){ echo " selected=selected "; }  ?> >Ipa</option>
			<option value='ips' <?php if($_GET['jurusan']=='ips'){ echo " selected=selected "; }  ?> >Ips</option>
		</select>
		<?php } ?>
		</li>
		<li>
			<label>TA</label>
		<input type="text" name="ta" value="<?php echo $taw[0]+1; ?>/<?php echo $taw[1]+1; ?>" />
		</li>
		<li>
			<label>Kelas Sekarang</label>
		</li>
		<li>
			<input type="text" name="kelas" value="<?php echo $kls; ?>" readonly='readonly' ></br></br>
			Ke : <select name="id_kelas" required=required>
			<?php include_once "koneksi.php";
					$cari = mysqli_query($con,"select * from kelas ") or die ('Pencarian Gagal !!!');
					if(mysqli_num_rows($cari)>0)
					{	
							while ($k = mysqli_fetch_assoc($cari))
							{	
								echo "<option value='".$k['id_kelas']."' >".$k['kelas']."</option>";
							}	
			    	} 
			 ?>	
			</select> 
			</br></br>
		</li>

		<input type="submit" value="Simpan">
	</ul>
</form>