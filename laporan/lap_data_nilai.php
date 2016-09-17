<?php
	include "../config/koneksi.php";

if(!empty($_GET['pn'])) { $pn=$_GET['pn']; }else{ $pn='';  }

if(!empty($_GET['sem'])) { $sem=$_GET['sem']; }else{ $sem=1;  }

if(!empty($_GET['nis'])){ $where  = "where s.nis='$_GET[nis]'"; }
	else
	{ $where  = "where pn.id_pengajar='$pn'"; }	

				$cari = mysqli_query($con,"select coalesce(am.absenmurid,0)as hadir,
coalesce(masuk.msk,0)as ada,coalesce(pn.kkm,0) as kkm,s.nis as nis,s.nama,
u1.nilai as 'Ulangan 1',u2.nilai as 'Ulangan 2',u3.nilai as 'Ulangan 3',
t1.nilai as 'Tugas 1',t2.nilai as 'Tugas 2',t3.nilai as 'Tugas 3',
uts.nilai as 'UTS',uas.nilai as 'UAS',prak.nilai as 'PRAKTIK',rapot.nilai as 'RAPOT',round(rh.nilai,1) as 'RH',round(nr.nilai,1) as 'NR'
from siswa s 

left join (select count(*)as absenmurid,nis from absensi where id_pengajar='$pn' and keterangan='hadir' and semester='$sem' group by nis )am on am.nis=s.nis

left join (select count(*) as msk,id_pengajar from (select id_pengajar from absensi where id_pengajar='$pn' and semester='$sem' group by tgl,id_pengajar)tm )masuk on masuk.id_pengajar='$pn'

inner join (select m.kkm,p.id_kelas,p.id_pengajar from pengajar p left join mata_pelajaran m on m.id_mapel=p.id_mapel) pn on pn.id_kelas=s.id_kelas 


left join (select n.nis,coalesce(n.nilai,0)as nilai from penilaian p left join nilai n on n.id_penilaian=p.id_penilaian 
           where p.status='Ulangan 1' and p.id_pengajar='$pn' and p.semester='$sem') u1 on u1.nis=s.nis

left join (select n.nis,coalesce(n.nilai,0)as nilai from penilaian p left join nilai n on n.id_penilaian=p.id_penilaian 
           where p.status='Ulangan 2' and p.id_pengajar='$pn' and p.semester='$sem')  u2 on u2.nis=s.nis
           
left join (select n.nis,coalesce(n.nilai,0)as nilai from penilaian p left join nilai n on n.id_penilaian=p.id_penilaian 
           where p.status='Ulangan 3' and p.id_pengajar='$pn' and p.semester='$sem')  u3 on u3.nis=s.nis

left join (select n.nis,coalesce(n.nilai,0)as nilai from penilaian p left join nilai n on n.id_penilaian=p.id_penilaian 
           where p.status='Tugas 1' and p.id_pengajar='$pn' and p.semester='$sem') t1 on t1.nis=s.nis

left join (select n.nis,coalesce(n.nilai,0)as nilai from penilaian p left join nilai n on n.id_penilaian=p.id_penilaian 
           where p.status='Tugas 2' and p.id_pengajar='$pn' and p.semester='$sem') t2 on t2.nis=s.nis
           
left join (select n.nis,coalesce(n.nilai,0)as nilai from penilaian p left join nilai n on n.id_penilaian=p.id_penilaian 
           where p.status='Tugas 3' and p.id_pengajar='$pn' and p.semester='$sem') t3 on t3.nis=s.nis
           
left join (select n.nis,coalesce(n.nilai,0)as nilai from penilaian p left join nilai n on n.id_penilaian=p.id_penilaian 
           where p.status='UTS' and p.id_pengajar='$pn' and p.semester='$sem') uts on uts.nis=s.nis
           
left join (select n.nis,coalesce(n.nilai,0)as nilai from penilaian p left join nilai n on n.id_penilaian=p.id_penilaian 
           where p.status='UAS' and p.id_pengajar='$pn' and p.semester='$sem') uas on uas.nis=s.nis
           
left join (select n.nis,coalesce(n.nilai,0)as nilai from penilaian p left join nilai n on n.id_penilaian=p.id_penilaian 
           where p.status='Praktik' and p.id_pengajar='$pn' and p.semester='$sem') prak on prak.nis=s.nis
           
left join (select n.nis,coalesce(n.nilai,0)as nilai from penilaian p left join nilai n on n.id_penilaian=p.id_penilaian 
           where p.status='Rapot' and p.id_pengajar='$pn' and p.semester='$sem') rapot on rapot.nis=s.nis
           
left join (select n.nis,avg(coalesce(n.nilai,0))as nilai from penilaian p left join nilai n on n.id_penilaian=p.id_penilaian 
           where p.status in ('Ulangan 1','Ulangan 2','Ulangan 3','Tugas 1','Tugas 2','Tugas 3') and p.id_pengajar='$pn' and p.semester='$sem' group by n.nis) rh on rh.nis=s.nis

left join (select n.nis,avg(coalesce(n.nilai,0))as nilai from penilaian p left join nilai n on n.id_penilaian=p.id_penilaian 
	and p.id_pengajar='$pn' where p.semester='$sem' group by n.nis) nr on nr.nis=s.nis

$where group by s.nis order by s.nama asc") or die ('Pencarian Gagal !!!');

	$content = "

	
	</br></br>
<table border='1' cellpadding='5'>
	<tr bgcolor='gray'>
		<td width='10' align='center'>NO</td>
		<td width='40' align='center'>NIS</td>
		<td width='10' align='center'>NAMA</td>
		<td width='50' align='center'>UH 1</td>
		<td width='50' align='center'>UH 2</td>
		<td width='50' align='center'>UH 3</td>
		<td width='50' align='center'>Tugas 1</td>
		<td width='50' align='center'>Tugas 2</td>
		<td width='50' align='center'>Tugas 3</td>
		<td width='50' align='center'>Rata2 Harian </td>
		<td width='50' align='center'>UTS</td>
		<td width='50' align='center'>UAS</td>
		<td width='50' align='center'>Praktik</td>
		<td width='50' align='center'>Absensi<br>Hadir/Masuk</td>
		<td width='50' align='center'>Rapot</td>
	</tr>";
			if(mysqli_num_rows($cari)>0)
			{	$i=1; 
					while ($g = mysqli_fetch_assoc($cari))
					{	
						$content .= "<tr >
									<td align='center' >".$i."</td>
									<td align='center' >".$g['nis']."</td>
									<td align='center' >".ucfirst($g['nama'])."</td>
									<td "; if(!empty($g['Ulangan 1'])){ if($g['Ulangan 1'] < $g['kkm']){ $content .= "bgcolor='yellow'"; }else{ $content .= "bgcolor='skyblue'"; } } $content .= " align='center'>".$g['Ulangan 1']."</td>
									<td "; if(!empty($g['Ulangan 2'])){ if($g['Ulangan 2'] < $g['kkm']){ $content .= "bgcolor='yellow'"; }else{ $content .= "bgcolor='skyblue'"; } } $content .= " align='center'>".$g['Ulangan 2']."</td>
									<td "; if(!empty($g['Ulangan 3'])){ if($g['Ulangan 3'] < $g['kkm']){ $content .= "bgcolor='yellow'"; }else{ $content .= "bgcolor='skyblue'"; } } $content .= " align='center'>".$g['Ulangan 3']."</td>
									<td "; if(!empty($g['Tugas 1'])){ if($g['Tugas 1'] < $g['kkm']){ $content .= "bgcolor='yellow'"; }else{ $content .= "bgcolor='skyblue'"; } } $content .= " align='center'>".$g['Tugas 1']."</td>
									<td "; if(!empty($g['Tugas 2'])){ if($g['Tugas 2'] < $g['kkm']){ $content .= "bgcolor='yellow'"; }else{ $content .= "bgcolor='skyblue'"; } } $content .= " align='center'>".$g['Tugas 2']."</td>
									<td "; if(!empty($g['Tugas 3'])){ if($g['Tugas 3'] < $g['kkm']){ $content .= "bgcolor='yellow'"; }else{ $content .= "bgcolor='skyblue'"; } } $content .= " align='center'>".$g['Tugas 3']."</td>
									<td  align='center'>".$g['RH']."</td>
									<td "; if(!empty($g['UTS'])){ if($g['UTS'] < $g['kkm']){ $content .= "bgcolor='yellow'"; }else{ $content .= "bgcolor='skyblue'"; } } $content .= " align='center'>".$g['UTS']."</td>
									<td "; if(!empty($g['UAS'])){ if($g['UAS'] < $g['kkm']){ $content .= "bgcolor='yellow'"; }else{ $content .= "bgcolor='skyblue'"; } } $content .= " align='center'>".$g['UAS']."</td>
									<td "; if(!empty($g['PRAKTIK'])){ if($g['PRAKTIK'] < $g['kkm']){ $content .= "bgcolor='yellow'"; }else{ $content .= "bgcolor='skyblue'"; } } $content .= " align='center'>".$g['PRAKTIK']."</td>
									<td align='center'>". $g['hadir']." / ".$g['ada']."</td>
									<td "; if(!empty($g['NR'])){ if($g['NR'] < $g['kkm']){ $content .= "bgcolor='yellow'"; }else{ $content .= "bgcolor='skyblue'"; } } $content .= " align='center'>".$g['NR']."</td>";
							 $content .="</tr>";	$i++;
					}
			}	


	$content .= "</table>
	
	<br>";
	
	

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
	$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
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
