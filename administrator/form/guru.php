<?php
if(!empty($_GET['act']))
{
	$id=$_GET['id_guru'];
	$nm=$_GET['nama'];
	$user=$_GET['username'];
	$pass=$_GET['password'];
	$ak=$_GET['act'];
}
else
{
	include_once"koneksi.php";
	$id=mysqli_query($con,"select coalesce(max(substring(id_guru,2,9)),0)+1 as no from guru") or die ('Gagal Pencarian Data!!!');
	$k = mysqli_fetch_assoc($id);
	$kode = $k['no'];
		for ($g=1; $g<=6-strlen($kode); $g++)
			{ $kode='0'.$kode;}
	$id='G'.$kode;
	$nm='';
	$user='';
	$pass='';
	$ak='';
}
?>

<form name="frm" action="man/m_guru.php?ak=<?php echo $ak; ?>" method="POST">
	<ul class="form-style-1">
		<li>
			<label>Id Guru</label>
			<input type="text" name="id_guru" value="<?php echo $id; ?>" readonly=readonly></br>
		</li>
		<li>
			<label>Nama</label>
			<input type="text" name="nama" required=required value="<?php echo $nm; ?>"></br>
		</li>
		<li>
			<label>Username</label>
			<input type="text" required=required name="username" value="<?php echo $user; ?>" placeholder='username'><br>
		</li>
		<li>
			<label>Password</label>
			<input type="text" required=required name="password" value="<?php echo $pass; ?>" placeholder='password'><br>
		</li>
		<li>
		<input type="submit" value="Simpan"> <input type="reset" value="Bersih">
		</li>
	</ul>
</form>