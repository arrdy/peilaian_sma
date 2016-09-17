<?php
	$cari = mysqli_query($con,"select * from wali_kelas w 
								left join guru g on g.id_guru= w.id_guru
								left join kelas k on k.id_kelas= w.id_kelas") or die ('Pencarian Gagal!!');
?>
<a href="?form=wali_kelas"><button><img src="../icon/addwalikelas.png" width="30" height="30"/></button></a><br></br>
<table border="1">
	<tr class="head">
		<td width="30" align="center">NO</td>
		<td width="150" align="center">ID WALI KELAS</td>
		<td width="500" align="center">GURU</td>
		<td width="100" align="center">KELAS</td>
		<td width="50" align="center">PILIHAN</td>
	</tr>

<?php
if(mysqli_num_rows($cari)==0)
{
	echo " <tr>
				<td colspan='5'>Data Kosong!!!</td>
			</tr>";}
	else{
		$no=1;
		while ($tampil = mysqli_fetch_assoc($cari))
		{
			echo"<tr class='satu'>
					<td>".$no."</td>
					<td>".$tampil['id_walikelas']."</td>
					<td>".$tampil['nama']."</td>
					<td>".$tampil['kelas']."</td><td>";
					// <a href='?form=wali_kelas&act=edit&id_walikelas=".$tampil['id_walikelas']."&id_guru=".$tampil['id_guru']."&id_kelas=".$tampil['id_kelas']."'> Edit</a> 
					
?>
							<a href='#'onclick="javascript:konfir_hapus('<?php echo "man/m_wali_kelas.php?ak=hapus&id_walikelas=".$tampil['id_walikelas']; ?>','<?php echo $tampil['id_walikelas']; ?>')"><img src='../icon/delete.png' width='20' height='20' align='center'/></a>
							<?php
							echo"
							</td>
						</tr>";
						$no++;
		}
	}
?>
</table>