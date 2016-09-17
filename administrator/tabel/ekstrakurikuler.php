<?php
	$cari = mysqli_query($con,"select * from ekstrakurikuler") or die('Pencarian Gagal!!!')
?>
<a href="?form=ekstrakurikuler"><button><img src="../icon/addekstra.png" width="30" height="30"/></button></a></br></br>
<table border="1">
	<tr class="head">
		<td width="30" align="center">NO</td>
		<td width="200" align="center">ID EKTRAKURIKULER</td>
		<td width="500" align="center">NAMA</td>
		<td width="50" align="center">PILIHAN</td>
	</tr>
	<?php
		if(mysqli_num_rows($cari)==0)
		{ echo" <tr>
					<td colspan='4'>Data Kosong!!!</td>
				</tr>"; }
			else{
				$no=1;
			while ($tampil = mysqli_fetch_assoc($cari))
			{
				echo"
					<tr class='satu'>
						<td>".$no."</td>
						<td>".$tampil['id_ekstrakurikuler']."</td>
						<td>".$tampil['nama']."</td>
						<td><a href='?form=ekstrakurikuler&act=edit&id_ekstrakurikuler=".$tampil['id_ekstrakurikuler']."&nama=".$tampil['nama']."'><img src='../icon/edit.png' width='20' height='20' align='center'/></a>
						";
?>
						<a href='#'onclick="javascript:konfir_hapus('<?php echo "man/m_ekstrakurikuler.php?ak=hapus&id_ekstrakurikuler=".$tampil['id_ekstrakurikuler']; ?>','<?php echo $tampil['nama']; ?>')"><img src='../icon/delete.png' width='20' height='20' align='center'/></a>
						<?php
						echo "
						</td>
					</tr>";
					$no++;
			}
		}
	?>
</table>