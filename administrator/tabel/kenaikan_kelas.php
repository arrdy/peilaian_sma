<?php
include_once "koneksi.php";

if(!empty($_GET['kk'])) { $eks=$_GET['kk']; }else{ $eks='';  }
				$cari = mysqli_query($con,"select s.nis,s.nama,s.jurusan,coalesce(kt.kelas,k.kelas)as kelas,coalesce(t.tahun_ajaran,s.tahun_ajaran)as tahun_ajaran 
from siswa s 
inner join kelas k on k.id_kelas=s.id_kelas
left join (select * from tahun_ajaran order by tahun_ajaran limit 1)  t on t.nis=s.nis
left join kelas kt on kt.id_kelas=t.id_kelas where s.id_kelas='$eks' ") or die ('Pencarian Gagal !!!');
?>

<table border="1" cellpadding="5">
	<tr class="head">
		<td width="30" align="center">NO</td>
		<td width="50" align="center">NIS</td>
		<td width="250" align="center">NAMA</td>
		<td width="100" align="center">JURUSAN</td>
		<td width="100" align="center">TAHUN AJARAN</td>
		<td width="40" align="center">AKSI</td>
	</tr>
	<?php 
			if(mysqli_num_rows($cari)>0)
			{	$i=1; 
					while ($g = mysqli_fetch_assoc($cari))
					{	
						echo "<tr class='satu'>
									<td align='center'>".$i."</td>
									<td align='center'>".$g['nis']."</td>
									<td >".$g['nama']."</td>
									<td align='center'>".$g['jurusan']."</td>
									<td align='center'>".$g['tahun_ajaran']."</td>
									<td align='center'> <a href='?form=kenaikan_kelas&nis=".$g['nis']."&jurusan=".$g['jurusan']."&kelas=".$g['kelas']."&view=".$eks."&nama=".$g['nama']."&ta=".$g['tahun_ajaran']."'><img src='../icon/update.png' width='20' height='20' align='center'/></a></td>
							 </tr>";	$i++;
					}
			}
	?>					
</table>