<?php
 $cari = mysqli_query($con,"select * from kepsek") or die('Gagal Pencarian Data!!!...');
?>
<a href="?form=kepsek"><button><img src="../icon/addkepsek.png" width="30" height="30"/></button></a></br></br>
<table border="1">
	<tr class="head">
		<td width="30" align="center">NO</td>
		<td width="150" align="center">NIP</td>
		<td width="200" align="center">NAMA</td>
		<td width="250" align="center">ALAMAT</td>
		<td width="100" align="center">PILIHAN</td>
	</tr>
<?php
if(mysqli_num_rows($cari)==0)
{
	echo"<tr>
			<td colspan='5'>Data Kosong!!!...</td>
		</tr>";
}
else{
	$no=1;
	while($tampil=mysqli_fetch_assoc($cari))
	{
		echo "<tr class='satu'>
				<td align='center'>".$no."</td>
				<td align='center'>".$tampil['nip']."</td>
				<td align='center'>".$tampil['nama']."</td>
				<td align='center'>".$tampil['alamat']."</td>
				<td align='center'><a href='?form=kepsek&act=edit&nip=".$tampil['nip']."&nama=".$tampil['nama']."&alamat=".$tampil['alamat']."'><img src='../icon/edit.png' width='20' height='20' align='center'/></a> 
				";
?>
				 <a href='#' onclick="javascript:konfir_hapus('<?php echo "man/m_kepsek.php?ak=hapus&nip=".$tampil['nip']; ?>','<?php echo $tampil['nama'];?>')""><img src='../icon/delete.png' width='20' height='20' align='center'/></a>
					<?php
					echo"
				</td>
				</tr>";
				$no++;
	}
}
?>
</table>