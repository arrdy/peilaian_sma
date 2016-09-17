
<?php 
$sem='';
if(!empty($_GET['info']) and $_GET['info']=='gagal' ){
	?> <script type="text/javascript">alert('Pengajar dengan tanggal ini sudah diisi.!' );</script> <?php 
}

include_once "koneksi.php";
$p=$_GET['pengajar'];

		if(!empty($_GET['act']) and $_GET['act']=='edit')
		{
			$sem=$_GET['sem'];
			$tgl=$_GET['tgl'];
			$ak=$_GET['act'];

				$cari = mysqli_query($con,"select *,a.keterangan as ket from siswa s inner join pengajar pn on pn.id_kelas=s.id_kelas 
				left join absensi a on s.nis=a.nis and a.tgl='$tgl' and a.id_pengajar=pn.id_pengajar 
				where pn.id_pengajar='$p' ") or die ('Pencarian Gagal !!!');
		}
		else
		{		$ak='add';
				$tgl=date('Y-m-d');
				$cari = mysqli_query($con,"select *,'hadir' as ket from siswa s inner join pengajar pn on pn.id_kelas=s.id_kelas 
				where pn.id_pengajar='$p' ") or die ('Pencarian Gagal !!!');
		}
?>

<form action='man/m_absen.php?ak=<?php echo $ak; ?>' method='post' >	
<table border=0 cellpadding="5">
<tr>	
	<td>NIS</td>
	<td>NAMA</td>
	<td>KETERANGAN</td>
</tr>

	<ul class="form-style-1">
		<li>
			<label>Id Pengajar</label>
			<input type="text" readonly=readonly name='pengajar' value="<?php echo $_GET['pengajar']; ?>" /></br>
		</li>
		<li>
			<label>Semester</label>
			<select name="sem">
				<option value='1' <?php if($sem=='1'){ echo "selected='selected'";} ?> >Ganjil</option>
				<option value='2' <?php if($sem=='2'){ echo "selected='selected'";} ?> >Genap</option>
			</select >
			</br>
		</li>
		<li>
			<label>Tanggal</label>
			<input type="date" name='tgl' required=required value="<?php echo $tgl; ?>" /> </br>
		</li>	
			<?php 
					if(mysqli_num_rows($cari)>0)
					{	$i=1;
							while ($g = mysqli_fetch_assoc($cari))
							{	echo "<tr>";	
								
								if(!empty($_GET['act']) and $_GET['act']=='edit')
								{   echo "<input type='hidden' name='ida".$i."' value='".$g['id_absensi']."' readonly=readonly />"; }

								echo "	
										<td><input type='text' name='nis".$i."' value='".$g['nis']."' readonly=readonly /></td>
										<td><input type='text' value='".$g['nama']."' readonly=readonly /></td>
										
									  	<td>

										<input type='radio' name='a".$i."' value='hadir'"; if($g['ket'] == 'hadir'){ echo "checked='checked'"; }  echo" /> hadir
										<input type='radio' name='a".$i."' value='izin'"; if($g['ket'] == 'izin'){ echo "checked='checked'"; }  echo" /> Izin
										<input type='radio' name='a".$i."' value='sakit'"; if($g['ket'] == 'sakit'){ echo "checked='checked'"; }  echo" /> Sakit
										<input type='radio' name='a".$i."' value='alfa'"; if($g['ket'] == 'alfa'){ echo "checked='checked'"; }  echo" /> Alfa
									  	</td>
									  </tr>";
									  $i++;
							}	
			    	} 
			 ?>
			 <input type="hidden" value='<?php echo $i; ?>' name='jumlah' /> 
			 
		</ul>
	
	 </table></br>
	 <input type='submit' value="simpan" />
 </form>