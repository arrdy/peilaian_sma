
<?php
	include "../config/koneksi.php";
	include "../fungsi/terbilang.php";
session_start();
$id = $_SESSION['id'];
$l = $_SESSION['level'];

if($l=='guru')
{ $id_siswa = $_GET['nis']; }
else
{ $id_siswa = $id; }

if(!empty($_GET['sem'])) { $sem=$_GET['sem']; }else{ $sem=1;  }

$ident = mysqli_query($con,"select s.*,kelas.kelas,coalesce(t.tahun_ajaran,s.tahun_ajaran)as tahun_ajaran  from siswa s
		inner join kelas on kelas.id_kelas=s.id_kelas 
		left join (select * from tahun_ajaran order by tahun_ajaran limit 1) t on t.nis=s.nis
		left join kelas kt on kt.id_kelas=t.id_kelas
		where s.nis='$id_siswa' ") or die ('Pencarian Gagal !!!');

$kepsek = mysqli_query($con,"select k.nama from kepsek k") or die('Gagal Pencarian Data!!!..');

$cari = mysqli_query($con,"select rata.nama_mapel,rata.kkm,rata.id_pengajar,s.id_kelas,s.nis,s.nama,s.jenis_kelamin,round(rata.nr,1) as rata,round(pr.nr,1) as praktik
	,case when (sikap.nr >= 85) then 'A' when (sikap.nr >= 75) then 'B' when (sikap.nr >= 65) then 'C' when (sikap.nr > 0) then 'D' else '-' end as sikap 
	  
	from siswa s 

left join 
(select p.id_pengajar,p.nama_mapel,p.kkm,n.nis,avg(coalesce(n.nilai,0))as nr from nilai n 
inner join 
(select mp.*,p.id_penilaian,p.semester from penilaian p inner join 
(select m.nama_mapel,m.id_mapel,m.kkm ,p.id_pengajar from pengajar p inner join mata_pelajaran m on m.id_mapel=p.id_mapel)mp on mp.id_pengajar=p.id_pengajar) 
p on n.id_penilaian=p.id_penilaian where p.semester='$sem' group by n.nis,p.id_pengajar )rata on rata.nis =s.nis

left join
(select p.id_pengajar,p.nama_mapel,p.kkm,n.nis,avg(coalesce(n.nilai,0))as nr from nilai n 
inner join 
(select mp.*,p.id_penilaian,p.semester from penilaian p inner join 
(select m.nama_mapel,m.id_mapel,m.kkm ,p.id_pengajar from pengajar p inner join mata_pelajaran m on m.id_mapel=p.id_mapel)mp on mp.id_pengajar=p.id_pengajar where p.status='Praktik') 
p on n.id_penilaian=p.id_penilaian where p.semester='$sem' group by n.nis,p.id_pengajar )pr on pr.nis =s.nis

left join
(select p.id_pengajar,p.nama_mapel,p.kkm,n.nis,avg(coalesce(n.nilai,0))as nr from nilai n 
inner join 
(select mp.*,p.id_penilaian,p.semester from penilaian p inner join 
(select m.nama_mapel,m.id_mapel,m.kkm ,p.id_pengajar from pengajar p inner join mata_pelajaran m on m.id_mapel=p.id_mapel)mp on mp.id_pengajar=p.id_pengajar where p.status='Sikap') 
p on n.id_penilaian=p.id_penilaian where p.semester='$sem' group by n.nis,p.id_pengajar )sikap on sikap.nis =s.nis



							   where s.nis='$id_siswa' group by id_pengajar
							   order by s.nis asc ") or die ('Pencarian Gagal !!!');



			if(mysqli_num_rows($ident)>0)
			{	 
				$idd = mysqli_fetch_assoc($ident);
				$id_k = $idd['id_kelas'];
				echo "<input type='text' value='".$idd['nis']."' /></br>";	
				echo "<input type='text' value='".$idd['nama']."' /></br>";
				echo "<input type='text' value='".$idd['jenis_kelamin']."' /></br>";
				echo "<input type='text' value='".$idd['alamat']."' /></br></br>";
			}
	$nm_ayh = $idd['nama_ayah'];	
	$content = "
	<table align='center' cellpadding='5' border='0'>
		<tr>
						<td align='center' colspan='3'>KETERANGAN TENTANG DIRI PESERTA DIDIK</td>
		</tr>
		<tr>
						<td align='left' width=300> Nama lengkap </td>
						<td align='left' width=10> :   </td>
						<td align='left' width=500> ".$idd['nama']." </td>
		</tr>
		<tr>				
					    <td align='left' width=300> Nomor Induk Siswa </td>
						<td align='left' width=10> :   </td>
						<td align='left' width=500> ".$idd['nis']." </td>
		</tr>
		<tr>			    
					  	<td align='left' width=300> Tempat Lahir</td>
						<td align='left' width=10> :   </td>
						<td align='left' width=500> ".$idd['tempat_lahir']." </td>
		</tr>
		<tr>			    
					  	<td align='left' width=300> Tanggal Lahir </td>
						<td align='left' width=10> :   </td>
						<td align='left' width=500> ".$idd['tgl_lahir']." </td>
		</tr>
		<tr>			    
					  	<td align='left' width=300> Jenis Kelamin </td>
						<td align='left' width=10> :   </td>
						<td align='left' width=500> ".$idd['jenis_kelamin']." </td>
		</tr>
		<tr>			    
					  	<td align='left' width=300> Agama </td>
						<td align='left' width=10> :   </td>
						<td align='left' width=500> ".$idd['agama']." </td>
		</tr>
		<tr>			    
					  	<td align='left' width=300> Status Dalam Keluarga </td>
						<td align='left' width=10> :   </td>
						<td align='left' width=500> ".$idd['status_keluarga']." </td>
		</tr>
		<tr>			    
					  	<td align='left' width=300> Anak Ke</td>
						<td align='left' width=10> :   </td>
						<td align='left' width=500> ".$idd['anak_ke']." </td>
		</tr>
		<tr>			    
					  	<td align='left' width=300> Alamat Peserta Didik </td>
						<td align='left' width=10> :   </td>
						<td align='left' width=500> ".$idd['alamat']." </td>
		</tr>
		<tr>			    
					  	<td align='left' width=300> </td>
						<td align='left' width=10>    </td>
						<td align='left' width=500> </td>
		</tr>
		<tr>			    
					  	<td align='left' width=300> No Telp </td>
						<td align='left' width=10> :   </td>
						<td align='left' width=500> ".$idd['no_telp']." </td>
		</tr>
		<tr>			    
					  	<td align='left' width=300> Nama Ayah </td>
						<td align='left' width=10> :   </td>
						<td align='left' width=500> ".$idd['nama_ayah']." </td>
		</tr>
		<tr>			    
					  	<td align='left' width=300> Nama Ibu </td>
						<td align='left' width=10> :   </td>
						<td align='left' width=500> ".$idd['nama_ibu']." </td>
		</tr>
		<tr>			    
					  	<td align='left' width=300> Alamat Orang Tua </td>
						<td align='left' width=10> :   </td>
						<td align='left' width=500> ".$idd['alamat_ortu']." </td>
		</tr>
		<tr>			    
					  	<td align='left' width=300> Pekerjaan Ayah </td>
						<td align='left' width=10> :   </td>
						<td align='left' width=500> ".$idd['pekerjaan_ayah']." </td>
		</tr>
		<tr>			    
					  	<td align='left' width=300> Pekerjaan Ibu </td>
						<td align='left' width=10> :   </td>
						<td align='left' width=500> ".$idd['pekerjaan_ibu']." </td>
		</tr>
		<tr >			    
					  	<td align='left' width=300 height='180'> </td>
						<td align='left' width=10>    </td>
						<td align='left' width=500>  </td>
		</tr>
		<tr >			    
					  	<td align='left' width=300 height='520'> </td>
						<td align='left' width=10>    </td>
						<td align='left' width=500>  </td>
		</tr>
	</table>


	<table align='left'  >
		<tr>
						<td align='left' width='600'> Nama Peserta Didik : ".$idd['nama']." </td>
						<td align='left'> Kelas : ".$idd['kelas']."</td>
		</tr>
		<tr>
						<td align='left' width='600'> Nomor Induk : ".$idd['nis']." </td>
						<td align='left' > Semester  :  "; if($sem=='1'){ $content .= "Ganjil"; }else{ $content .= "Genap"; } $content .= " </td>
		</tr>
		<tr >			    
					  	<td align='left' width='600'> Nama Sekolah : SMA Muhammadiyah Pleret </h5> </td>
					  	 <td align='left' width='200'> Tahun Ajaran  :  ".$idd['tahun_ajaran']." </td>
		</tr>
	</table>

	<hr><br>
	
	<table  border='1' style='border-collapse:collapse' align='center'>
		<tr >
			<td width='5%' rowspan='2'><center>No</center></td>
			<td width='25%' rowspan='2'><center>Komponen</center></td>
			<td width='5%' rowspan='2'><center>KKM</center></td>
			<td width='20%' colspan='2'><center>Pengetahuan</center></td>
			<td width='20%' colspan='2'><center>Praktik</center></td>
			<td width='5%' rowspan='2'><center>Sikap</center></td>
			<td width='10%' rowspan='2'><center>Pencapaian Kompetensi</center></td>
		</tr>
		<tr >
			<td width='10%'><center>Angka</center></td>
			<td width='20%'><center>Huruf</center></td>
			<td width='10%'><center>Angka</center></td>
			<td width='10%'><center>Huruf</center></td>
		</tr>";
	$no = 1;
	while ($d = mysqli_fetch_array($cari)) {
		$content .= "
		<tr>
			<td><center>".$no."</center></td>
			<td>".$d['nama_mapel']."</td>
			<td align='center'>".$d['kkm']."</td>
			<td align='center'>".$d['rata']."</td>
			<td>".ucwords(konversi($d['rata']))."</td>
			<td align='center'>".$d['praktik']."</td>
			<td >".ucwords(konversi($d['praktik']))."</td>
			<td align='center'>".$d['sikap']."</td>
			<td><center>"; if($d['rata']>=$d['kkm']){ $content .= "Tuntas"; }else{ $content .= "Belum tuntas"; } $content .= "</center></td>
		</tr>"
		;
		$no++;
	}

$content .= "</table>";

if(!empty($_GET['nis'])) { $eks=$_GET['nis']; }else{ $eks='';  }
				$cari = mysqli_query($con,"select w.*, g.nama,kp.nama as ks from wali_kelas w 
left join guru g on g.id_guru= w.id_guru
left join kelas k on k.id_kelas= w.id_kelas
left join kepsek kp on 1=1
 where k.id_kelas='$id_k'  ") or die ('Gagal Pencarian Data!!!...');



$content.="
	<table  style='border-collapse:collapse'  >
		<tr>
			<td  colspan='30' height='130'>  </h5> </td>
		</tr>
		<tr>
			<td  colspan='30' align='right'> Pleret,  ".date('d - m - Y')." </h5> </td>
		</tr>
		<tr>
			<td width='100'  > Orang Tua/Wali Peserta Didik </td>
			<td width='100'  align='center'> Wali kelas </td>
			<td width='100'  align='right'> Kepala Sekolah </td>
		</tr>
		<tr>
		<td height='100'></td>
		</tr>";
				if(mysqli_num_rows($kepsek)>0)
			{	$i=1; 
					while ($tampil = mysqli_fetch_assoc($cari))
					{	
						$content.=  "<tr>
									<td width='250' >".$nm_ayh." </td>
									<td width='250'  align='center'>".$tampil['nama']." </td>
									<td width='250'  align='right'>".$tampil['ks']." </td>
									
							 		</tr>
							 		<tr>
							 			<td><td colspan='30' align='right'>Nip.1964032999008</td></td>
							 		</tr>
							 		<tr>
							 			<td><td colspan='30' align='right' height='50'></td></td>
							 		</tr>

							 ";	$i++;
					}
			}		



$content .="</table>
		";





if(!empty($_GET['nis'])) { $eks=$_GET['nis']; }else{ $eks='';  }
				$cari = mysqli_query($con,"select *,e.nama as a_e from peserta_ekstrakurikuler pe inner join ekstrakurikuler e on pe.id_ekstrakurikuler=e.id_ekstrakurikuler where nis='$eks' ") or die ('Pencarian Gagal !!!');


$content .= "
<table align='left' >
		<tr>
						<td align='left' width='600'> Nama Peserta Didik : ".$idd['nama']." </td>
						<td align='left'> Kelas : ".$idd['kelas']."</td>
		</tr>
		<tr>
						<td align='left' width='600'> Nomor Induk : ".$idd['nis']." </td>
						<td align='left' > Semester  :  "; if($sem=='1'){ $content .= "Ganjil"; }else{ $content .= "Genap"; } $content .= " </td>
		</tr>
		<tr >			    
					  	<td align='left' width='600'> Nama Sekolah : SMA Muhammadiyah Pleret </h5> </td>
					  	 <td align='left' width='200'> Tahun Ajaran  :  ".$idd['tahun_ajaran']." </td>
		</tr>
	</table>




</br><hr>
<h5 >Pengembangan Diri</h5>
<table  style='border-collapse:collapse' width='50%' border='1'>
	<tr>
		<td width='40' align='center'>No</td>
		<td width='500' align='center' >Jenis Kegiatan</td>
		<td width='200' align='center' >Nilai</td>
	</tr>";
			if(mysqli_num_rows($cari)>0)
			{	$i=1; 
					while ($g = mysqli_fetch_assoc($cari))
					{	
						$content.=  "<tr>
									<td align='center'>".$i."</td>
									<td>".$g['a_e']."</td>
									<td align='center'>".$g['nilai']."</td>
							 </tr>";	$i++;
					}
			}					
$content .= "</table><br>";




$content .= "</br>
<h5 >Akhlak Mulia</h5>
<table  style='border-collapse:collapse' width='30%' border='1'>
	<tr>
		<td width='40' align='center'>No</td>
		<td width='500' align='center' >Aspek yang dinilai</td>
		<td width='200' align='center' >Keterangan</td>
	</tr>

	<tr>
		<td width='40' align='center'>1</td>
		<td width='300'  >Kedisiplinan</td>
		<td width='200' align='center' >Baik</td>
	</tr>
	<tr>
		<td width='40' align='center'>2</td>
		<td width='300' >Kebersihan</td>
		<td width='200' align='center' >Baik</td>
	</tr>
	<tr>
		<td width='40' align='center'>3</td>
		<td width='300'  >Tanggung Jawab</td>
		<td width='200' align='center' >Baik</td>
	</tr>
		<tr>
		<td width='40' align='center'>4</td>
		<td width='300'  >Sopansantun</td>
		<td width='200' align='center' >Baik</td>
	</tr>
	<tr>
		<td width='40' align='center'>5</td>
		<td width='300' >Percayadiri</td>
		<td width='200' align='center' >Baik</td>
	</tr>
	<tr>
		<td width='40' align='center'>6</td>
		<td width='300'  >Kompetitif</td>
		<td width='200' align='center' >Baik</td>
	</tr>
	<tr>
		<td width='40' align='center'>7</td>
		<td width='300'  >Hubungan Sosial</td>
		<td width='200' align='center' >Baik</td>
	</tr>
	<tr>
		<td width='40' align='center'>8</td>
		<td width='300'  >Kejujuran</td>
		<td width='200' align='center' >Baik</td>
	</tr>
	<tr>
		<td width='40' align='center'>9</td>
		<td width='300'  >Pelaksanaan Ibadah Ritual</td>
		<td width='200' align='center' >Baik</td>
	</tr>




	";
							
$content .= "</table>
	<br>";







	if(!empty($_GET['nis'])) { $eks=$_GET['nis']; }else{ $eks='';  }
				$cari = mysqli_query($con,"select 'Sakit' as ket,count(*) as jml from absensi where semester='$sem' and keterangan='sakit' and nis='$id_siswa'
											union
											select 'Izin' as ket, count(*) as jml from absensi where semester='$sem' and keterangan='izin' and nis='$id_siswa'
											union
											select 'Alfa' as ket, count(*) as jml from absensi where semester='$sem' and keterangan='alfa' and nis='$id_siswa' ") or die ('Pencarian Gagal !!!');

$content .= "</br>
<h5 >Ketiidak Hadiran</h5>
<table  style='border-collapse:collapse' width='30%' border='1'>
	<tr>
		<td width='40' align='center'>No</td>
		<td width='500' align='center' >Alasan Ketidak Hadiran</td>
		<td width='200' align='center' >Keterangan</td>
	</tr>

	";
			if(mysqli_num_rows($cari)>0)
			{	$i=1; 
					while ($g = mysqli_fetch_assoc($cari))
					{	
						$content.=  "<tr>
									<td align='center'>".$i."</td>
									<td>".$g['ket']."</td>
									<td align='center'>".$g['jml']." Hari</td>
							 </tr>";	$i++;
					}
			}					
$content .= "</table>
	<br>";






$content .= "</br>
<h5 >Catatan Wali Kelas</h5>
<table  style='border-collapse:collapse' width='30%' border='1'>
	<tr>
		<td width='800' height='50'>Keterangan Kenaikan Kelas : Naik/Tidak Naik*)</td>

	</tr>";		
$content .= "</table>
<h7 >*)Coret yang tidak perlu</h7>
	<br>";








	/*  jajal*/


if(!empty($_GET['nis'])) { $eks=$_GET['nis']; }else{ $eks='';  }
				$cari = mysqli_query($con,"select w.*, g.nama,kp.nama as ks from wali_kelas w 
left join guru g on g.id_guru= w.id_guru
left join kelas k on k.id_kelas= w.id_kelas
left join kepsek kp on 1=1
 where k.id_kelas='$id_k'  ") or die ('Gagal Pencarian Data!!!...');



$content.="
	<table  style='border-collapse:collapse'  >
	<tr>
			<td  colspan='30' height='40'> </h5> </td>
		</tr>
		<tr>
			<td  colspan='30' align='right'> Pleret,  ".date('d - m - Y')." </h5> </td>
		</tr>
		<tr>
			<td width='100'  > Orang Tua/Wali Peserta Didik </td>
			<td width='100'  align='center'> Wali kelas </td>
			<td width='100'  align='right'> Kepala Sekolah </td>
		</tr>
		<tr>
		<td height='100'></td>
		</tr>";
				if(mysqli_num_rows($kepsek)>0)
			{	$i=1; 
					while ($tampil = mysqli_fetch_assoc($cari))
					{	
						$content.=  "<tr>
									<td width='250' >".$nm_ayh." </td>
									<td width='250'  align='center'>".$tampil['nama']." </td>
									<td width='250'  align='right'>".$tampil['ks']." </td>
									
							 		</tr>
							 		<tr>
							 			<td><td colspan='30' align='right'>Nip.1964032999008</td></td>
							 		</tr>

							 ";	$i++;
					}
			}		



$content .="</table>
		";

	
	

/*	if($_POST['format']=='1') {
		header("Content-type: application/x-msdownload");
		header("Content-Disposition: attachment; filename=lap_pinjam_$tglnow.doc");
		header("Pragma: no-cache");
		header("Expires: 0");
		echo $content;
	}
	elseif($_POST['format']=='2') {
		header("Content-type: application/x-msdownload");
		header("Content-Disposition: attachment; filename=lap_pinjam_$tglnow.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		echo $content;
	}
	elseif($_POST['format']=='3') {
*/ // Define relative path from this script to mPDF
	$nama_dokumen='lap_peringkat'; //Beri nama file PDF hasil.
	define('_MPDF_PATH','../fungsi/mpdf/');
	include(_MPDF_PATH . "mpdf.php");
	$mpdf=new mPDF('utf-8', 'A4-P'); // Create new mPDF Document
	//Beginning Buffer to save PHP variables and HTML tags
	ob_start(); 
		echo $content;
	$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
	ob_end_clean();
	//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
	$mpdf->WriteHTML(utf8_encode($html));
	$mpdf->Output($nama_dokumen.".pdf" ,'I');
//	}
?>