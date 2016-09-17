<?php
if(!empty($_GET['act']))
{
	$nis=$_GET['nis'];
	$nm=$_GET['nama'];
	$kls=$_GET['id_kelas'];
	$jrs=$_GET['jurusan'];
	$tmpt_lhr=$_GET['tempat_lahir'];
	$tgl_lhr=$_GET['tgl_lahir'];
	$jenis_k=$_GET['jk'];
	$agm=$_GET['agama'];
	$status_k=$_GET['status_keluarga'];
	$anak_k=$_GET['anak_ke'];
	$alm=$_GET['alamat'];
	$no_tlp=$_GET['no_telp'];
	$nm_ayah=$_GET['nama_ayah'];
	$nm_ibu=$_GET['nama_ibu'];
	$alm_ortu=$_GET['alamat_ortu'];
	$pkrjn_ayah=$_GET['pekerjaan_ayah'];
	$pkrjn_ibu=$_GET['pekerjaan_ibu'];
	$pass_siswa=$_GET['password_siswa'];
	$pass_ortu=$_GET['password_ortu'];
	$ta=$_GET['ta'];
	$ak=$_GET['act'];
}

?>
<form name="frm" action="man/m_siswa.php?ak=<?php echo $ak; ?>" method="POST">
	<ul class="form-style-1">
		<li>
			<label>Nis</label>
			<input type="text" placeholder="nis" name="nis" value="<?php echo "$nis"; ?>" readonly=readonly/></br>
		</li>
		<li>
			<label>Nama</label>
			<input type="text" placeholder="nama"  name="nama" value="<?php echo "$nm"; ?>" readonly=readonly/></br>
		</li>
		<li>
			<label>Kelas</label>
			<select name="id_kelas" required=required  readonly=readonly>
			<?php include_once "koneksi.php";
					$cari = mysqli_query($con,"select * from kelas") or die ('Pencarian Gagal !!!');
					if(mysqli_num_rows($cari)>0)
					{	
							while ($k = mysqli_fetch_assoc($cari))
							{	
								echo "<option value='".$k['id_kelas']."'"; if($kls==$k['id_kelas']){ echo 'selected=selected'; }  echo" >".$k['kelas']."</option>";
							}	
			    	} 
			 ?>	
			</select></br>
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
			<label>Tempat Lahir</label>
			<input type="text" placeholder="tempat lahir"  name="tempat_lahir" value="<?php echo "$tmpt_lhr"; ?>" /></br>
		</li>
		<li>
			<label>Tanggal Lahir</label>
			<input type="date" name="tgl_lahir" value="<?php echo "$tgl_lhr"; ?>" required=required /> </br>
		</li>
		<li>
			<label>Jenis Kelamin</label>
			<input type="radio" name="gender" value="Laki-laki" <?php if ($jenis_k == "Laki-laki"){
			echo "checked=checked "; } ?> />Laki-laki

			<input type="radio" name="gender" value="Perempuan" <?php if ($jenis_k == "Perempuan"){
			echo " checked=checked"; } ?> />Perempuan </br>
		</li>
		<li>
			<label>Agama</label>
			<select name="agama" readonly=readonly required=required>
				<option value="islam" <?php if($agm=='islam') { echo'selected=selected';} ?> >ISLAM</option>
				<option value="kristen" <?php if($agm=='kristen') {echo'selected=selected';} ?> >KRISTEN</option>
				<option value="katolik" <?php if($agm=='katolik') { echo'selected=selected';} ?> >KATOLIK</option>
				<option value="hindu" <?php if($agm=='hindu') {echo'selected=selected';} ?> >HINDU</option>
				<option value="buddha" <?php if($agm=='buddha') { echo'selected=selected';} ?> >BUDDHA</option>
				<option value="kong hu cu" <?php if($agm=='kong hu cu') {echo'selected=selected';} ?> >KONG HU CU</option>
			</select> </br>
		</li>
		<li>
			<label>Status Keluarga</label>
			<input type="text" placeholder="status keluarga"  name="status_keluarga" value="<?php echo "$status_k"; ?>" readonly=readonly></br>
		</li>
		<li>
			<label>Anak Ke</label>
			<input type="text" placeholder="anak ke"  name="anak_ke" value="<?php echo "$anak_k"; ?>" readonly=readonly></br>
		</li>
		<li>
			<label>Alamat</label>
			<textarea placeholder="alamat"  name="alamat" readonly=readonly> <?php echo "$alm"; ?> </textarea></br>
		</li>
		<li>
			<label>No Telp</label>
			<input placeholder="no telp"  type="text" name="no_telp" value="<?php echo "$no_tlp"; ?>" readonly=readonly></br>
		</li>
		<li>
			<label>Nama Ayah</label>
			<input placeholder="nama ayah"  type="text" name="nama_ayah" value="<?php echo "$nm_ayah"; ?>" readonly=readonly></br>
		</li>
		<li>
			<label>Nama Ibu</label>
			<input placeholder="nama ibu"  type="text" name="nama_ibu" value="<?php echo "$nm_ibu"; ?>" readonly=readonly></br>
		</li>
		<li>
			<label>Alamat Orang Tua</label>
			<textarea placeholder="alamat ortu" readonly=readonly  name="alamat_ortu"> <?php  echo "$alm_ortu"; ?></textarea></br>
		</li>
		<li>
			<label>Pekerjaan Ayah</label>
			<input placeholder="pekerjaan ayah"  type="text" name="pekerjaan_ayah" value="<?php echo "$pkrjn_ayah"; ?>" readonly=readonly></br>
		</li>
		<li>
			<label>Pekerjaan Ibu</label>
			<input placeholder="pekerjaan ibu"  type="text" name="pekerjaan_ibu" value="<?php echo "$pkrjn_ibu"; ?> " readonly=readonly></br>
		</li>
		<li>
			<label>Password Siswa</label>
			<input placeholder="password siswa"  type="text" name="password_siswa" value="<?php echo "$pass_siswa"; ?>" readonly=readonly> </br>
		</li>
		<li>
			<label>Password Orang Tua</label>
			<input placeholder="password ortu"  type="text" name="password_ortu" value="<?php echo "$pass_ortu"; ?> " readonly=readonly></br>
		</li>
		<li>
			<label>Tahun Ajaran</label>
			<input placeholder="tahun ajaran"  type="text" name="ta" value="<?php echo $ta; ?> " readonly=readonly></br>
		</li>
	</ul>
</form>