<?php
	include "../config/koneksi.php";

session_start();
$id = $_SESSION['id'];

if($_SESSION['level']=='guru')
{
	$look = mysqli_query($con,"select w.id_kelas,k.kelas from wali_kelas w left join kelas k on k.id_kelas=w.id_kelas where w.id_guru='$id' ");
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
		$cari = mysqli_query($con,"select s.nis,s.nama,s.jenis_kelamin,round(rata.nr,3) as rata from siswa s 
							   left join (select n.nis,avg(coalesce(n.nilai,0))as nr from nilai n group by n.nis )rata on rata.nis =s.nis
							   where s.id_kelas='$kls'
							   group by s.nis
							   order by round(rata.nr,3) desc") or die ('Pencarian Gagal !!!');


	$content = "
	
	<table align='center'><tr>
	<td class='center'>
	<b><h3>LAPORAN PERINGKAT SISWA KELAS ".$cr['kelas']." <br>
	<center></h3></b>
	<h5>Tanggal Cetak : ".date('d - m - Y')."</h5></center></td></tr></table>

	<hr><br>
	
	<table width='500' border='1' style='border-collapse:collapse' align='center'>
		<tr bgcolor='green'>
			<td width='10%'><center><font color='white'>RANK</center></td>
			<td width='30%'><center><font color='white'>NIS</center></td>
			<td width='30%'><center><font color='white'>NAMA</center></td>
			<td width='30%'><center><font color='white'>JENIS KELAMIN</center></td>
			<td width='20%'><center><font color='white'>RATA-RATA</center></td>
		</tr>";
	$no = 1;
	while ($d = mysqli_fetch_array($cari)) {
		$content .= "
		<tr>
			<td><center>".$no."</center></td>
			<td><center>".$d['nis']."</center></td>
			<td>".$d['nama']."</td>
			<td>".$d['jenis_kelamin']."</td>
			<td><center>".$d['rata']."</center></td>
		</tr>";
		$no++;
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
