<?php 
	$cari = mysqli_query($con,"select * from kelas") or die('Gagal Pencarian!!!')
?>
<a href="?form=kelas"><button><img src="../icon/addclass.png" width="30" height="30"/></button></a></br></br>
<table border="1">
	<tr class="head">
		<td width="30" align="center">NO</td>
		<td width="100" align="center">ID KELAS</td>
		<td width="100" align="center">KELAS</td>
		<td width="50" align="center">PILIHAN</td>
	</tr>

	<?php
	if (mysqli_num_rows($cari)==0)
	{ echo "
			<tr>
				<td colspan='4'> Data Kosong !!!</td>
			</tr>"; }

		else{
			$no= 1;
			while ($tampil = mysqli_fetch_assoc($cari))
				{ echo "<tr class='satu'>
							<td class='satu'>".$no."</td>
							<td >".$tampil['id_kelas']."</td>
							<td >".$tampil['kelas']."</td>
							<td ><a href='?form=kelas&act=edit&id=".$tampil['id_kelas']."&kelas=".$tampil['kelas']."'><img src='../icon/edit.png' width='20' height='20' align='center'/></a>
							"; 
	?>
							<a href='#' onclick="javascript:konfir_hapus('<?php echo "man/m_kelas.php?ak=hapus&id=".$tampil['id_kelas']; ?> ','<?php echo $tampil['kelas']; ?>')"><img src='../icon/delete.png' width='20' height='20' align='center'/></a>
							<?php	
							echo "	
							</td>
						</tr>";
						$no ++; 
			}
		}
	?>
</table>