<form action='?form=absen' method='get'>
	<select name="pengajar" required=required >
	<?php include_once "../koneksi.php";
			$cari = mysqli_query($con,"select * from pengajar p 
										left join guru g on g.id_guru=p.id_guru 
										left join mata_pelajaran m on m.id_mapel=p.id_mapel
										left join kelas k on k.id_kelas=p.id_kelas") or die ('Pencarian Gagal !!!');
			if(mysqli_num_rows($cari)>0)
			{	
					while ($g = mysqli_fetch_assoc($cari))
					{	
						echo "<option value='".$g['id_pengajar']."' > ".$g['nama_mapel']." ( ".$g['nama']." / ".$g['kelas']." ) </option>";
					
					}	
	    	} 
	 ?>
	</select>
	<input type="hidden" value='absen' name='form' /> 
<button type='submit'><img src="../icon/add.png" width="25" height="25"/></button>
</form>


</br></br>	
<?php
	$cari = mysqli_query($con, "SELECT *,a.semester as sem,a.id_pengajar as id_pengajar,a.tgl as tanggal,coalesce(h.hadir,'-')as hadir1,coalesce(i.izin,'-')as izin1,
										coalesce(s.sakit,'-')as sakit1,coalesce(al.alfa,'-')as alfa1
										FROM absensi a left join (select p.*,g.nama,m.nama_mapel,k.kelas from pengajar p 
											left join guru g on g.id_guru=p.id_guru 
											left join mata_pelajaran m on m.id_mapel=p.id_mapel
											left join kelas k on k.id_kelas=p.id_kelas)pn on pn.id_pengajar=a.id_pengajar
					                        left join (select count(*) as hadir,id_pengajar,tgl from absensi where keterangan='hadir' group by tgl,id_pengajar)h on 										h.id_pengajar=a.id_pengajar and h.tgl=a.tgl  
					                        left join (select count(*) as sakit,id_pengajar,tgl from absensi where keterangan='sakit' group by tgl,id_pengajar)s on 										s.id_pengajar=a.id_pengajar and s.tgl=a.tgl
					                        left join (select count(*) as izin,id_pengajar,tgl from absensi where keterangan='izin' group by tgl,id_pengajar)i on 										i.id_pengajar=a.id_pengajar and i.tgl=a.tgl
					                        left join (select count(*) as alfa,id_pengajar,tgl from absensi where keterangan='alfa' group by tgl,id_pengajar)al on 										al.id_pengajar=a.id_pengajar and al.tgl=a.tgl
                        
                        group by a.id_pengajar, a.tgl order by a.tgl desc") or die ('Pencarian Gagal!!!');
?>

<table border="1">
	<tr class="head">
	<td width="30" align="center">NO</td>	
	<td width="150" align="center">MAPEL</td>
	<td width="50" align="center">KELAS</td>
	<td width="200" align="center">GURU</td>
	<td width="100" align="center">SEMESTER</td>
	<td width="100" align="center">TANGGAL</td>
	<td width="50" align="center">HADIR</td>
	<td width="50" align="center">SAKIT</td>
	<td width="50" align="center">IZIN</td>
	<td width="50" align="center">ALFA</td>
	<td width="50" align="center">PILIHAN</td>
	</tr>
<?php
	if (mysqli_num_rows($cari)==0)
	{ echo "<tr>
				<td colspan=11>Data Kosong!!!</td>
			</tr>";}
		else{ 
			$no=1;
			while($tampil = mysqli_fetch_assoc($cari))
			{echo"<tr class='satu'>
					<td align='center'>".$no."</td>
					<td>".$tampil['nama_mapel']."</td>
					<td align='center'>".$tampil['kelas']."</td>
					<td>".substr($tampil['nama'],0,25)."</td>
					<td align='center'>"; if($tampil['sem']=='1'){ echo "Ganjil"; }else{ echo "Genap"; } echo "</td>
					<td align='center'>".$tampil['tanggal']."</td>
					<td align='center'>".$tampil['hadir1']."</td>
					<td align='center'>".$tampil['sakit1']."</td>
					<td align='center'>".$tampil['izin1']."</td>
					<td align='center'>".$tampil['alfa1']."</td>
					<td><a href='?form=absen&act=edit&pengajar=".$tampil['id_pengajar']."&tgl=".$tampil['tanggal']."&sem=".$tampil['sem']."'><img src='../icon/edit.png' width='20' height='20' align='center'/><a/>
					"; 
					?>
			  		<a href ='#'onclick="javascript:konfir_hapus('<?php echo "man/m_absen.php?ak=hapus&pengajar=".$tampil['id_pengajar']."&tgl=".$tampil['tanggal']; ?>','<?php echo $tampil['nama']; ?>')"><img src='../icon/delete.png' width='20' height='20' align='center'/></a>

			  	<?php echo"
					</td>
				</tr>";
				$no++;

			}

		}
?>
</table>