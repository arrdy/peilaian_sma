<?php

if(!empty($_GET['act']))
{
	$id= $_GET['id'];
	$nm= $_GET['nama'];
	$jab= $_GET['jabatan'];
	$alm= $_GET['alamat'];
	$user= $_GET['user'];
	$pass= $_GET['pass'];
	$ak= $_GET['act'];
}
else
{
	/* kode otomatis*/
	include_once"koneksi.php";
	$id=mysqli_query($con,"select coalesce(max(substring(id_tatausaha,2,9)),0)+1 as no from tata_usaha") or die ('Gagal Pencarian Data!!!');
	$k = mysqli_fetch_assoc($id);
	$kode = $k['no'];

		for ($i=1; $i<=6-strlen($kode); $i++)
			{ $kode='0'.$kode;}

		$id = 'K'.$kode;	/*end kode*/
	$nm= '';
	$jab= '';
	$alm= '';
	$user= '';
	$pass= '';
	$ak='';
}

?>

<form name='frm' action='man/m_tu.php?ak=<?php echo $ak; ?>' method='post' >
	<ul class="form-style-1">
		<li>
			<label>Id Tata Usaha</label>
			<input type="text" name="id" required=required value="<?php  echo $id; ?> " readonly=readonly/> </br>
		</li>
		<li>
		<label>Nama</label>
			<input type="text" placeholder='Nama' name="nama" required=required value="<?php  echo $nm; ?>"/> </br>
		</li>
		<li>
			<label>Jabatan</label>
			<select name="jab" required=required >
				<option value="Ketua" <?php if($jab=='ketua'){ echo 'selected=selected'; } ?> >Ketua</option>
				<option value="bendahara" <?php if($jab=='bendahara'){ echo 'selected=selected'; } ?> >Bendahara</option>
				<option value="karyawan"  <?php if($jab=='karyawan'){ echo 'selected=selected'; } ?> >Karyawan</option>
			</select> </br>
		</li>
		<li>
			<label>Alamat</label>
			<textarea name="alamat" required=required > <?php  echo $alm; ?></textarea> </br>
		</li>
		<li>
			<label>Username</label>
			<input type="text" placeholder='username' name="user" required=required value="<?php  echo $user; ?>" /> </br>
		</li>
		<li>
			<label>Password</label>
			<input type="text" placeholder='password' name="pass" required=required value="<?php  echo $pass; ?>" /> </br>
		</li>
		<li>
			<input type="submit" value='Simpan' /> <input type="reset" value="Bersih" />
		</li>
	</ul>
</form>