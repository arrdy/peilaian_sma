<?php
	$cari = mysqli_query($con,"select * from tata_usaha") or die ('Pencarian Gagal !!!');
?>
<a href="?form=tu"><button><img src="../icon/addadmin.png" width="30" height="30"/></button></a></br></br>
<table border="1">
	<tr class="head">
		<td width=30 align="center">NO</td>
		<td width=100 align="center">ID TU</td>
		<td width=300 align="center">NAMA</td>
		<td width=100 align="center">JABATAN</td>
		<td width=300 align="center">ALAMAT</td>
		<td width=50 align="center">PILIHAN</td>
	</tr>	
	<?php
	if(mysqli_num_rows($cari)==0)
		{ echo "	
				<tr>
					<td colspan='7' > Data kosong !!!</td>
				</tr>"; }
	else{
		$no = 1;
		while ($tampil = mysqli_fetch_assoc($cari))
		{ echo "<tr class='satu'>
				<td >".$no."</td>
				<td >".$tampil['id_tatausaha']."</td>
				<td >".$tampil['nama']."</td>
				<td >".$tampil['jabatan']."</td>
				
				<td >".substr($tampil['alamat'],0,25)."</td>
				<td><a href='?form=tu&act=edit&id=".$tampil['id_tatausaha']." & nama=".$tampil['nama']." & jabatan=".$tampil['jabatan']." & alamat=".$tampil['alamat']." & user=".$tampil['username']." & pass=".$tampil['password']."'><img src='../icon/edit.png' width='20' height='20' align='center'/></a> 
				";
?>
				 <a href='#' onclick="javascript:konfir_hapus('<?php echo "man/m_tu.php?ak=hapus&id=".$tampil['id_tatausaha']; ?>','<?php echo $tampil['nama'];?>')"><img src='../icon/delete.png' width='20' height='20' align='center'/></a>
					<?php
					echo"
				</td>
				</tr>";
				$no++;

		}
	}
?>
</table>