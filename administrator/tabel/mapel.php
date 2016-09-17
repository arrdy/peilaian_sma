
<?php
	$cari = mysqli_query($con,"select * from mata_pelajaran") or die('Pencarian Gagal !!!');
?>

<a href="?form=mapel"><button><img src="../icon/addbook.png" width="30" height="30"/></button></a></br></br>
<table border=1>
	<tr class="head">
		<td width=30 align="center">NO</td>
		<td width=100 align="center">ID MAPEL</td>
		<td width=400 align="center">NAMA MATA PELAJARAN</td>
		<td width=100 align="center">JURUSAN</td>
		<td width=100 align="center">TINGKAT</td>
		<td width=90 align="center">KKM</td>
		<td width=50 align="center">PILIHAN</td>
	</tr>
<?php
	if(mysqli_num_rows($cari)==0)
		{ echo " <tr>
				<td colspan='7' > Data kosong !!!</td>
				</tr>"; }
	else{
		$no = 1;
		while ($tampil = mysqli_fetch_assoc($cari))
			{ echo "<tr class='satu'>
			  			<td >".$no."</td>
			  			<td >".$tampil['id_mapel']."</td>
			  			<td >".$tampil['nama_mapel']."</td>
			  			<td >".$tampil['jurusan']."</td>
			  			<td >".$tampil['tingkat']."</td>
			  			<td >".$tampil['kkm']."</td>
			  			<td ><a href='?form=mapel&act=edit&id_mapel=".$tampil['id_mapel']."&nama_mapel=".$tampil['nama_mapel']."&jurusan=".$tampil['jurusan']."&tingkat=".$tampil['tingkat']."&kkm=".$tampil['kkm']."'><img src='../icon/edit.png' width='20' height='20' align='center'/></a> 
			  			";
?>
						<a href='#' onclick="javascript:konfir_hapus('<?php echo "man/m_mapel.php?ak=hapus&id_mapel=".$tampil['id_mapel']; ?>','<?php echo $tampil['nama_mapel']; ?>')"><img src='../icon/delete.png' width='20' height='20' align='center'/></a>
			  		<?php
			  		echo "
			  		</td>
			  		</tr>"; 
			  		$no++; 
			}

	}
?>
</table>