
<?php
	$cari = mysqli_query($con,"select * from guru ") or die('Pencarian Gagal !!!');
?>
<a href='?form=guru'><button><img src="../icon/addguru.png" width="30" height="30"/></button></a></br></br>
<table border=1>
	<tr class="head">
		<td width=30 align="center">NO</td>
		<td width=80 align="center">ID GURU</td>
		<td width=500 align="center">NAMA</td>
		<td width=130 align="center">USERNAME</td>
		<td width=130 align="center">PASSWORD</td>
		<td width=50 align="center">PILIHAN</td>
	</tr>
<?php
	if(mysqli_num_rows($cari)==0)
		{ echo "	
				<tr>
					<td colspan='6' > Data kosong !</td>
				</tr>"; }
	else{
		$no = 1;
		while ($tampil = mysqli_fetch_assoc($cari))
			{ echo "<tr class='satu'>
			  			<td >".$no."</td>
			  			<td >".$tampil['id_guru']."</td>
			  			<td >".substr($tampil['nama'],0,25)."</td>
			  			<td >".$tampil['username']."</td>
			  			<td >".$tampil['password']."</td>
			  			<td ><a href='?form=guru&act=edit&id_guru=".$tampil['id_guru']."&nama=".$tampil['nama']."&username=".$tampil['username']."&password=".$tampil['password']."'><img src='../icon/edit.png' width='20' height='20' align='center'/></a> 
			  			";
?>
			  			<a href ='#'onclick="javascript:konfir_hapus('<?php echo "man/m_guru.php?ak=hapus&id_guru=".$tampil['id_guru']; ?>','<?php echo $tampil['nama']; ?>')"><img src='../icon/delete.png' width='20' height='20' align='center'/></a>
			  			<?php
			  			echo "
			  			</td>
			  		</tr>"; 
			  			$no++; 
			}

	}
?>
</table>