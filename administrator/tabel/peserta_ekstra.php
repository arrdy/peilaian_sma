<?php
include_once "koneksi.php";

if(!empty($_GET['eks'])) { $eks=$_GET['eks']; }else{ $eks='';  }
				$cari = mysqli_query($con,"select * from siswa inner join kelas on kelas.id_kelas=siswa.id_kelas where siswa.id_kelas='$eks' ") or die ('Pencarian Gagal !!!');
?>

<table border="1" cellpadding="5">
	<tr class="head">
		<td width="30">NO</td>
		<td width="50">NIS</td>
		<td width="250">NAMA</td>
		<td width="200">JURUSAN</td>
		<td width="200">EKSTRAKURIKULER</td>
		<td width="40">AKSI</td>
	</tr>
	<?php 
			if(mysqli_num_rows($cari)>0)
			{	$i=1; 
					while ($g = mysqli_fetch_assoc($cari))
					{	
						echo "<tr class='satu'>
									<td>".$i."</td>
									<td>".$g['nis']."</td>
									<td>".$g['nama']."</td>
									<td>".$g['jurusan']."</td>
									<td>";
											$e = mysqli_query($con,"select *,e.nama as a_e from peserta_ekstrakurikuler pe inner join ekstrakurikuler e on pe.id_ekstrakurikuler=e.id_ekstrakurikuler where nis='".$g['nis']."' ");
											if(mysqli_num_rows($e)>0)
											{	$n=1; 
													while ($ek = mysqli_fetch_assoc($e))
													{ ?>
														<?php echo $ek['a_e']." (".$ek['nilai'].") "; ?><a href='#' onclick="javascript:konfir_hapus('<?php echo "man/m_peserta_ekstrakurikuler.php?ak=hapus&id_peserta_ekstrakurikuler=".$ek['id_peserta_ekstrakurikuler']."&view=".$eks; ?>','<?php echo $ek['a_e'].", nis : ".$ek['nis']; ?>')"> <img src='../icon/delete.png' width='20' height='20' align='center'/></a> </br>													
													<?php	$n++;
													}
											}	
									echo "</td>
									<td align='center'> <a href='?form=peserta_ekstra&act=edit&nis=".$g['nis']."&kelas=".$g['kelas']."&jurusan=".$g['jurusan']."&view=".$eks."'><img src='../icon/add.png' width='20' height='20' align='center'/></a></td>
							 </tr>";	$i++;
					}
			}
	?>					
</table>