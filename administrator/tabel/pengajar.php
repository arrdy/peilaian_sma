<?php
	$cari = mysqli_query($con,"select * from pengajar p 
										left join guru g on g.id_guru=p.id_guru
										left join mata_pelajaran m on m.id_mapel=p.id_mapel
										left join kelas k on k.id_kelas=p.id_kelas") or die('Gagal Pencarian!!!');
?>
<a href='?form=pengajar'><button><img src="../icon/addpengajar.png" width="30" height="30"/></button></a></br></br>
<table border="1">
	<tr class="head">
		<td width="30" align="center">NO</td>
		<td width="110" align="center">ID PENGAJAR</td>
		<td width="400" align="center">GURU</td>
		<td width="200" align="center">MATA PELAJARAN</td>
		<td width="50" align="center">KELAS</td>
		<td width="50" align="center">PILIHAN</td>
	</tr>
	<?php
		if(mysqli_num_rows($cari)==0)
		{ echo "<tr>
					<td colspan= 6>Data Kosong!!!</td>
				</tr>";}
			else{
				$no = 1;
				while ($tampil = mysqli_fetch_assoc($cari))
				{ echo "<tr class='satu'>
							<td>".$no."</td>
							<td>".$tampil['id_pengajar']."</td>
							<td>".$tampil['nama']."</td>
							<td>".$tampil['nama_mapel']."</td>
							<td>".$tampil['kelas']."</td>
							<td><a href='?form=pengajar&act=edit&id_pengajar=".$tampil['id_pengajar']."&id_guru=".$tampil['id_guru']."&id_mapel=".$tampil['id_mapel']."&id_kelas=".$tampil['id_kelas']."'><img src='../icon/edit.png' width='20' height='20' align='center'/></a>
								";
			?>
							<a href='#' onclick="javascript:konfir_hapus('<?php echo "man/m_pengajar.php?ak=hapus&id_pengajar=".$tampil['id_pengajar']; ?>','<?php echo $tampil['nama']; ?>')"><img src='../icon/delete.png' width='20' height='20' align='center'/></a>
							<?php
							echo"
							</td>
						</tr>";
						$no++;
			}

		}
	?>
</table>