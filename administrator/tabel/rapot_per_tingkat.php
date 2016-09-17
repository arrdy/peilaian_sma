<?php
include_once "koneksi.php";
$id = $_SESSION['id'];

		$cari = mysqli_query($con,"select k.kelas,s.id_kelas,s.nis,s.nama,s.jenis_kelamin,coalesce(round(rata.nr,3),'-') as rata from siswa s 
			inner join (select n.id_penilaian,n.nis,avg(coalesce(n.nilai,0))as nr from nilai n group by n.nis,n.id_penilaian )rata on rata.nis =s.nis inner join penilaian pn on pn.id_penilaian=rata.id_penilaian left join kelas k on pn.kelas=k.id_kelas where s.nis='$id' group by s.nis,s.id_kelas,pn.kelas order by left(pn.kelas,2) asc") or die ('Pencarian Gagal !!!');


?>
</br>
<center><font size="5"> <b>  </b> </font>
</br></br> 
<table border="1" cellpadding="5">
	<tr class="head">
		<td width="30" height="50">NO</td>
		<td width="100" align="center">KELAS</td>
		<td width="100" align="center">NIS</td>
		<td width="150" align="center">RATA-RATA RAPOT</td>
		<td width="100" align="center">PILIHAN</td>
	</tr>
	<?php 
			if(mysqli_num_rows($cari)>0)
			{	$i=1; 
					while ($g = mysqli_fetch_assoc($cari))
					{	
						echo "<tr class='satu'>
									<td align='center'>".$i."</td>
									<td>".$g['kelas']."</td>
									<td>".$g['nis']."</td>
									<td align='center'>".$g['rata']."</td>
									<td align='center'> <a href='?panggil=rapot_per_siswa&nis=".$g['nis']."&kelas=".$g['kelas']."'>Lihat Rapot</a></td>
							 </tr>";	$i++;
					}
			}
	?>					
</table>
</center>