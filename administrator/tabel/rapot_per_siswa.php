<center><font size="5"> <b> NILAI RAPOT SISWA </b> </font></center>
<?php
include_once "koneksi.php";
$id = $_SESSION['id'];
$l = $_SESSION['level'];

if(!empty($_GET['sem'])) { $sem=$_GET['sem']; }else{ $sem=1;  }

if($l=='guru')
{ $id_siswa = $_GET['nis'];  }
else
{ $id_siswa = $id; }

$kelas = $_GET['kelas'];

$ident = mysqli_query($con,"select * from siswa where nis='$id_siswa' ") or die ('Pencarian Gagal !!!');

$cari = mysqli_query($con,"select rata.kelas,rata.nama_mapel,rata.kkm,rata.id_pengajar,s.id_kelas,s.nis,s.nama,s.jenis_kelamin,round(rata.nr,1) as rata from siswa s 							   
left join 
(select p.id_pengajar,p.nama_mapel,p.kelas,p.kkm,n.nis,avg(coalesce(n.nilai,0))as nr from nilai n 
inner join 
(select mp.*,p.id_penilaian,p.semester,p.kelas from penilaian p inner join 
(select m.nama_mapel,m.id_mapel,m.kkm ,p.id_pengajar from pengajar p inner join mata_pelajaran m on m.id_mapel=p.id_mapel)mp on mp.id_pengajar=p.id_pengajar where p.semester='$sem') 
p on n.id_penilaian=p.id_penilaian group by n.nis,p.id_pengajar )rata on rata.nis =s.nis
inner join kelas k on k.id_kelas=rata.kelas

							   where s.nis='$id_siswa' and k.kelas='$kelas'
							   order by s.nis asc") or die ('Pencarian Gagal !!!');



			if(mysqli_num_rows($ident)>0)
			{	 
				$idd = mysqli_fetch_assoc($ident);
				echo "<tr>
						<label>Nis :</label></br>
						<input type='text' value='".$idd['nis']."' />
					  </tr></br></br>";	
				echo "
						<tr>
						<label>Nama :</label></br>
						<input type='text' value='".$idd['nama']."' />
						</tr>
						</br></br>";
				echo "<tr>
						<label>Jurusan :</label></br>
						<input type='text' value='".$idd['jurusan']."' />
						</tr>
						</br></br>";
				echo "
					<tr>
					<label>Jenis Kelamin :</label></br>
					<input type='text' value='".$idd['jenis_kelamin']."' />
					</tr>
					</br></br>";
				echo "
					<tr>
					<label>Alamat :</label></br>
					<input type='text' value='".$idd['alamat']."' />
					</tr>
					</br></br></br>";
			}	
?>

Semester : 
<select id='sem' onchange ="tabel_rapot('<?php echo $id_siswa; ?>','<?php echo $kelas; ?>')">
	<option value='1' <?php if($sem=='1'){ echo "selected='selected'";} ?> >Ganjil</option>
	<option value='2' <?php if($sem=='2'){ echo "selected='selected'";} ?> >Genap</option>
</select > 
 <a href="../laporan/lap_rapot.php?sem=<?php echo $sem; ?>&nis=<?php echo $idd['nis']; ?>" target="_blank" ><img src="../icon/print.png" width="30" height="30"></a></br></br>
<table border="1" cellpadding="5">
	<tr class="head">
		<td width="50" align="center" height="40">NO</td>
		<td width="300" align="center">MATA PELAJARAN</td>
		<td width="100" align="center">KKM</td>
		<td width="100" align='center'>NILAI RATA-RATA</td>
		<td width="150" align='center'>STATUS</td>
		<td width="100" align="center">PILIHAN</td>
	</tr>
	<?php 
			if(mysqli_num_rows($cari)>0)
			{	$i=1; 
					while ($g = mysqli_fetch_assoc($cari))
					{	
						echo "<tr class='satu'>
									<td align='center'>".$i."</td>
									<td>".$g['nama_mapel']."</td>
									<td align='center'>".$g['kkm']."</td>
									<td align='center'>".$g['rata']."</td>
									<td align='center'>"; if($g['rata']>=$g['kkm']){ echo "Tuntas"; }else{ echo "Belum tuntas"; } echo "</td>
									<td align='center'> <a href='home.php?pn=$g[id_pengajar]&nis=$g[nis]&sem=$sem'>Detail Nilai</a></td>
							 </tr>";	$i++;
					}
			}
	?>					
</table>

<?php

if(!empty($_GET['nis'])) { $eks=$_GET['nis']; }else{ $eks='';  }
				$cari = mysqli_query($con,"select *,e.nama as a_e from peserta_ekstrakurikuler pe inner join ekstrakurikuler e on pe.id_ekstrakurikuler=e.id_ekstrakurikuler where nis='$eks' and left(pe.kelas,2)='".substr($kelas,0,2)."' ") or die ('Pencarian Gagal !!!');
?>
</br></br>
<table border="1" cellpadding="5" width="50%">
	<tr class="head">
		<td width="30">NO</td>
		<td width="200">EKSTRAKURIKULER</td>
		<td width="50">NILAI</td>
	</tr>
	<?php 
			if(mysqli_num_rows($cari)>0)
			{	$i=1; 
					while ($g = mysqli_fetch_assoc($cari))
					{	
						echo "<tr class='satu'>
									<td>".$i."</td>
									<td>".$g['a_e']."</td>
									<td>".$g['nilai']."</td>
							 </tr>";	$i++;
					}
			}
	?>					
</table>



<?php

if(!empty($_GET['nis'])) { $eks=$_GET['nis']; }else{ $eks='';  }
				$cari = mysqli_query($con," select 'Sakit' as ket,count(*) as jml from absensi 
													inner join pengajar p on p.id_pengajar=absensi.id_pengajar 
													inner join kelas k on k.id_kelas=p.id_kelas  
													where semester='$sem' and keterangan='sakit' and nis='$id_siswa' and k.kelas='$kelas'
											union
											select 'Izin' as ket, count(*) as jml from absensi 
													inner join pengajar p on p.id_pengajar=absensi.id_pengajar 
													inner join kelas k on k.id_kelas=p.id_kelas 
													where semester='$sem' and keterangan='izin' and nis='$id_siswa' and k.kelas='$kelas'
											union
											select 'Alfa' as ket, count(*) as jml from absensi 
													inner join pengajar p on p.id_pengajar=absensi.id_pengajar 
													inner join kelas k on k.id_kelas=p.id_kelas 
													where semester='$sem' and keterangan='alfa' and nis='$id_siswa' and k.kelas='$kelas'	
				 ") or die ('Pencarian Gagal !!!');
?>
</br></br>
<table border="1" cellpadding="5" width="50%">
	<tr class="head">
		<td width="30">NO</td>
		<td width="300">ALASAN KETIDAK HADIRAN</td>
		<td width="200">KETERANGAN</td>
	</tr>
	<?php 
			if(mysqli_num_rows($cari)>0)
			{	$i=1; 
					while ($g = mysqli_fetch_assoc($cari))
					{	
						echo "<tr class='satu'>
									<td>".$i."</td>
									<td>".$g['ket']."</td>
									<td>".$g['jml']." Hari</td>
							 </tr>";	$i++;
					}
			}
	?>					
</table>

</br></br></br></br></br>