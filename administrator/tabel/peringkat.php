<?php
include_once "koneksi.php";
$id = $_SESSION['id'];

if($_SESSION['level']=='guru')
{
	$look = mysqli_query($con,"select id_kelas from wali_kelas where id_guru='$id' ");
	if(mysqli_num_rows($look)>0)
	{	
		$cr = mysqli_fetch_assoc($look); 
		$kls = $cr['id_kelas'];
	}
}
else
{
	$look = mysqli_query($con,"select id_kelas from wali_kelas where nis='$id' ");
	if(mysqli_num_rows($look)>0)
	{	
		$cr = mysqli_fetch_assoc($look); 
		$kls = $cr['id_kelas'];
	}
}
		$cari = mysqli_query($con,"select s.nis,k.kelas,s.nama,s.jenis_kelamin,round(rata.nr,3) as rata from siswa s 
							   left join (select n.nis,avg(coalesce(n.nilai,0))as nr from nilai n group by n.nis )rata on rata.nis =s.nis
							   left join kelas k on k.id_kelas=s.id_kelas
							   where s.id_kelas='$kls'
							   group by s.nis
							   order by round(rata.nr,3) desc") or die ('Pencarian Gagal !!!');


?>
</br>
<center><font size="5"> <b> RANKING SISWA </b> </font>
</br>
<a href="../laporan/lap_peringkat.php" target="_blank" ><img src="../icon/print.png" width="30" height="30"></a> </br></br>
<table border="1" cellpadding="5">
	<tr>
		<td width="30" height="50">PERINGKAT</td>
		<td width="100" align="center">NIS</td>
		<td width="250" align="center">NAMA</td>
		<td width="150" align='center'>JENIS KELAMIN</td>
		<td width="100">RATA - RATA</td>
		<td width="100" align="center">PILIHAN</td>
	</tr>
	<?php 
			if(mysqli_num_rows($cari)>0)
			{	$i=1; 
					while ($g = mysqli_fetch_assoc($cari))
					{	
						echo "<tr>
									<td align='center'>Ke- ".$i."</td>
									<td>".$g['nis']."</td>
									<td>".$g['nama']."</td>
									<td>".$g['jenis_kelamin']."</td>
									<td align='center'>".$g['rata']."</td>
									<td align='center'> <a href='?panggil=rapot_per_siswa&nis=".$g['nis']."&kelas=".$g['kelas']."'>Lihat Rapot</a></td>
							 </tr>";	$i++;
					}
			}
	?>					
</table>
</center>