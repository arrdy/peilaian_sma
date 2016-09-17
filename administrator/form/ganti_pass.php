</br>
<?php
	include_once"koneksi.php";
	$id=$_SESSION['id'];
	$l=$_SESSION['level'];

	if($l=='tata_usaha')
	{
			$cari=mysqli_query($con,"select * from tata_usaha where id_tatausaha='$id' ") or die ('Gagal Pencarian Dataa!!!');
	}
	else if ($l=='siswa' or $l=='ortu') 
	{
			$cari=mysqli_query($con,"select nis as username from siswa where nis='$id' ") or die ('Gagal Pencarian Data!!!');
	}
	else
	{
		$cari=mysqli_query($con,"select * from guru where id_guru='$id' ") or die ('Gagal Pencarian Data!!!');	
	}
			
	$tmp = mysqli_fetch_assoc($cari);

	if(!empty($_GET['pas'])){ $p = $_GET['pas']; 
		if($p=='pl'){
			echo "<font color='red'> Password lama salah, silahkan ulangi..!! </font></br>";
		}
		else if($p=='pb'){
			echo "<font color='red'> Password baru tidah sama..!! </font></br>";
		}
		else {
			?> <script type="text/javascript"> alert('Password berhasil dirubah..'); </script> <?php
		}
	}
?>
</br>
<form name="frm" action="man/m_ganti_pass.php" method="POST">
	<ul class="form-style-1">
		<li>
			<label>Username</label>
			<input type="text" required=required name="username" value="<?php echo $tmp['username']; ?>" placeholder='username' readonly='readonly'><br>
		</li>
		<li>
			<label>Password Lama</label>
			<input type="password" required=required name="passwordl"  placeholder='password Lama'><br>
		</li>
		<li>
			<label>Password Baru</label>
			<input type="password" required=required name="passwordb1"  placeholder='password Baru'><br>
		</li>
		<li>
			<label>Password Baru</label>
			<input type="password" required=required name="passwordb2"  placeholder='password Baru'><br>
		</li>
		<li>
			<input type="submit" value="Simpan"> <input type="reset" value="Bersih">
		</li>
	</ul>
</form>
