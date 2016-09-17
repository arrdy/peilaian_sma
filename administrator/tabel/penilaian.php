
<?php
include_once "koneksi.php";

if(!empty($_GET['pn'])) { $pn=$_GET['pn']; }else{ $pn='';  }
if(!empty($_GET['sem'])) { $sem=$_GET['sem']; }else{ $sem=1;  }

if(!empty($_GET['nis']) ){ $where  = "where s.nis='$_GET[nis]'"; $tn=$_GET['nis']; }
else if( $_SESSION['level']=='siswa' or $_SESSION['level']=='ortu'){  $where  = "where s.nis='$_SESSION[id]'"; $tn=$_SESSION['id']; }
	else
	{ $where  = "where pn.id_pengajar='$pn'"; $tn=''; }	
				$cari = mysqli_query($con,"select coalesce(am.absenmurid,0)as hadir,
coalesce(masuk.msk,0)as ada,coalesce(pn.kkm,0) as kkm,s.nis as nis,s.nama,
u1.nilai as 'Ulangan 1',u2.nilai as 'Ulangan 2',u3.nilai as 'Ulangan 3',
t1.nilai as 'Tugas 1',t2.nilai as 'Tugas 2',t3.nilai as 'Tugas 3',
uts.nilai as 'UTS',uas.nilai as 'UAS',prak.nilai as 'PRAKTIK',rapot.nilai as 'RAPOT',round(rh.nilai,1) as 'RH',round(nr.nilai,1) as 'NR'
, sikap.nilai as sikap
from siswa s 

left join (select count(*)as absenmurid,nis from absensi where id_pengajar='$pn' and keterangan='hadir' group by nis )am on am.nis=s.nis

left join (select count(*) as msk,id_pengajar from (select id_pengajar from absensi where id_pengajar='$pn' group by tgl,id_pengajar)tm )masuk on masuk.id_pengajar='$pn'

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
           
left join (select n.nis,coalesce(n.nilai,0)as nilai from penilaian p left join nilai n on n.id_penilaian=p.id_penilaian 
           where p.status='Sikap' and p.id_pengajar='$pn' and p.semester='$sem') sikap on sikap.nis=s.nis

left join (select n.nis,avg(coalesce(n.nilai,0))as nilai from penilaian p left join nilai n on n.id_penilaian=p.id_penilaian 
           where p.status in ('Ulangan 1','Ulangan 2','Ulangan 3','Tugas 1','Tugas 2','Tugas 3') and p.semester='$sem' and p.id_pengajar='$pn' group by n.nis) rh on rh.nis=s.nis

left join (select n.nis,avg(coalesce(n.nilai,0))as nilai from penilaian p left join nilai n on n.id_penilaian=p.id_penilaian 
	and p.id_pengajar='$pn' where p.semester='$sem' group by n.nis) nr on nr.nis=s.nis

$where group by s.nis order by s.nama asc") or die ('Pencarian Gagal !!!');


 $n = $tn; echo"</br></br><a href='../laporan/lap_data_nilai.php?pn=$pn&nis=$n&sem=$sem' target='_blank' ><img src='../icon/print.png' width='30' height='30'></a> ";  

?>
</br></br>
Semester : 
<input id='nis' value="<?php echo $tn; ?>" type="hidden"/>
<select id='sem' onchange ="tabel_penilaian('<?php echo $pn; ?>')">
	<option value='1' <?php if($sem=='1'){ echo "selected='selected'";} ?> >Ganjil</option>
	<option value='2' <?php if($sem=='2'){ echo "selected='selected'";} ?> >Genap</option>
</select >
</br></br>
<table border="1" cellpadding="5">
	<tr class="head">
		<td width="10" align='center'>NO</td>
		<td width="40" align='center'>NIS</td>
		<td width="100" align='center'>NAMA</td>
		<td width="50" align='center'>UH 1</td>
		<td width="50" align='center'>UH 2</td>
		<td width="50" align='center'>UH 3</td>
		<td width="50" align='center'>Tugas 1</td>
		<td width="50" align='center'>Tugas 2</td>
		<td width="50" align='center'>Tugas 3</td>
		<td width="50" align='center'>Rata2 Harian </td>
		<td width="50" align='center'>UTS</td>
		<td width="50" align='center'>UAS</td>
		<td width="50" align='center'>Praktik</td>
		<td width="50" align='center'>Sikap</td>
		<td width="50" align='center'>Absensi<br>Hadir/Masuk</td>
		<td width="50" align='center'>Rapot</td>
	</tr>
	<?php 
			if(mysqli_num_rows($cari)>0)
			{	$i=1; 
					while ($g = mysqli_fetch_assoc($cari))
					{	
						echo "<tr class='satu'>
									<td align='center' >".$i."</td>
									<td align='center' >".$g['nis']."</td>
									<td align='center' >".ucfirst($g['nama'])."</td>
									<td "; if(!empty($g['Ulangan 1'])){ if($g['Ulangan 1'] < $g['kkm']){ echo "bgcolor='yellow'"; }else{ echo "bgcolor='skyblue'"; } } echo " align='center'>".$g['Ulangan 1']."</td>
									<td "; if(!empty($g['Ulangan 2'])){ if($g['Ulangan 2'] < $g['kkm']){ echo "bgcolor='yellow'"; }else{ echo "bgcolor='skyblue'"; } } echo " align='center'>".$g['Ulangan 2']."</td>
									<td "; if(!empty($g['Ulangan 3'])){ if($g['Ulangan 3'] < $g['kkm']){ echo "bgcolor='yellow'"; }else{ echo "bgcolor='skyblue'"; } } echo " align='center'>".$g['Ulangan 3']."</td>
									<td "; if(!empty($g['Tugas 1'])){ if($g['Tugas 1'] < $g['kkm']){ echo "bgcolor='yellow'"; }else{ echo "bgcolor='skyblue'"; } } echo " align='center'>".$g['Tugas 1']."</td>
									<td "; if(!empty($g['Tugas 2'])){ if($g['Tugas 2'] < $g['kkm']){ echo "bgcolor='yellow'"; }else{ echo "bgcolor='skyblue'"; } } echo " align='center'>".$g['Tugas 2']."</td>
									<td "; if(!empty($g['Tugas 3'])){ if($g['Tugas 3'] < $g['kkm']){ echo "bgcolor='yellow'"; }else{ echo "bgcolor='skyblue'"; } } echo " align='center'>".$g['Tugas 3']."</td>
									<td  align='center'>".$g['RH']."</td>
									<td "; if(!empty($g['UTS'])){ if($g['UTS'] < $g['kkm']){ echo "bgcolor='yellow'"; }else{ echo "bgcolor='skyblue'"; } } echo " align='center'>".$g['UTS']."</td>
									<td "; if(!empty($g['UAS'])){ if($g['UAS'] < $g['kkm']){ echo "bgcolor='yellow'"; }else{ echo "bgcolor='skyblue'"; } } echo " align='center'>".$g['UAS']."</td>
									<td "; if(!empty($g['PRAKTIK'])){ if($g['PRAKTIK'] < $g['kkm']){ echo "bgcolor='yellow'"; }else{ echo "bgcolor='skyblue'"; } } echo " align='center'>".$g['PRAKTIK']."</td>
									<td "; if(!empty($g['sikap'])){ if($g['sikap'] < $g['sikap']){ echo "bgcolor='yellow'"; }else{ echo "bgcolor='skyblue'"; } } echo " align='center'>".$g['sikap']."</td>
									<td align='center'>". $g['hadir']." / ".$g['ada']."</td>
									<td "; if(!empty($g['NR'])){ if($g['NR'] < $g['kkm']){ echo "bgcolor='yellow'"; }else{ echo "bgcolor='skyblue'"; } } echo " align='center'>".$g['NR']."</td>
							 </tr>";	$i++;
					}
			}
	?>		

	<tr>

	<?php

if(empty($_GET['nis']) and ($_SESSION['level']!='siswa' and $_SESSION['level']!='ortu')){ 
			$stat = mysqli_query($con,"select id_pengajar,id_penilaian,u1.id as u1,u2.id as u2,u3.id as u3,t1.id as t1,t2.id as t2,t3.id as t3,uts.id as uts,uas.id as uas,prk.id as Praktik,rpt.id as Rapot,round(rr.id,1) as NRR,skp.id as sikap from penilaian
left join ( select id_penilaian as id,status from penilaian where id_pengajar='$pn' and semester='$sem') u1 on u1.status='Ulangan 1'
left join ( select id_penilaian as id,status from penilaian where id_pengajar='$pn' and semester='$sem' ) u2 on u2.status='Ulangan 2'
left join ( select id_penilaian as id,status from penilaian where id_pengajar='$pn' and semester='$sem') u3 on u3.status='Ulangan 3'
left join ( select id_penilaian as id,status from penilaian where id_pengajar='$pn' and semester='$sem' ) t1 on t1.status='Tugas 1'
left join ( select id_penilaian as id,status from penilaian where id_pengajar='$pn' and semester='$sem' ) t2 on t2.status='Tugas 2'
left join ( select id_penilaian as id,status from penilaian where id_pengajar='$pn' and semester='$sem' ) t3 on t3.status='Tugas 3'
left join ( select id_penilaian as id,status from penilaian where id_pengajar='$pn' and semester='$sem' ) uts on uts.status='UTS'
left join ( select id_penilaian as id,status from penilaian where id_pengajar='$pn' and semester='$sem' ) uas on uas.status='UAS'
left join ( select id_penilaian as id,status from penilaian where id_pengajar='$pn' and semester='$sem' ) prk on prk.status='Praktik'
left join ( select id_penilaian as id,status from penilaian where id_pengajar='$pn' and semester='$sem' ) skp on skp.status='Sikap'
left join ( select id_penilaian as id,status from penilaian where id_pengajar='$pn' and semester='$sem' ) rpt on rpt.status='Rapot'
left join ( select avg(coalesce(n.nilai,0)) as id from penilaian p left join nilai n on n.id_penilaian=p.id_penilaian where p.id_pengajar='$pn' and semester='$sem' ) rr on 1=1
where id_pengajar='$pn' 
 ");
if(mysqli_num_rows($cari)>0)
			{
	$t = mysqli_fetch_assoc($stat);
	?>	

		<td width="10" colspan="3"></td>
		<td width="50" align='center'><?php if(!empty($t['u1'])){ echo "<a href='?act=edit&penilaian=$pn&status=Ulangan 1&id_p=$t[u1]&sem=$sem'><img src='../icon/edit.png' width='30' height='30' align='center'/></a>"; ?> <br><br><a href ='#'onclick="javascript:konfir_hapus('<?php echo "man/m_penilaian.php?ak=hapus&id=".$t['u1']."&pengajar=".$t['id_pengajar']."&sem=".$sem; ?>','Ulangan 1')"><img src='../icon/delete.png' width='30' height='30' align='center'/></a> <?php } else { echo "<a href='?act=add&penilaian=$pn&status=Ulangan 1&sem=$sem'><input type='button' value='Input' /></a>"; } ?></td>
		<td width="50" align='center'><?php if(!empty($t['u2'])){ echo "<a href='?act=edit&penilaian=$pn&status=Ulangan 2&id_p=$t[u2]&sem=$sem'><img src='../icon/edit.png' width='30' height='30' align='center'/></a>"; ?> <br><br><a href ='#'onclick="javascript:konfir_hapus('<?php echo "man/m_penilaian.php?ak=hapus&id=".$t['u2']."&pengajar=".$t['id_pengajar']."&sem=".$sem; ?>','Ulangan 2')"><img src='../icon/delete.png' width='30' height='30' align='center'/></a> <?php } else { echo "<a href='?act=add&penilaian=$pn&status=Ulangan 2&sem=$sem'><input type='button' value='Input' /></a>"; } ?></td>
		<td width="50" align='center'><?php if(!empty($t['u3'])){ echo "<a href='?act=edit&penilaian=$pn&status=Ulangan 3&id_p=$t[u3]&sem=$sem'><img src='../icon/edit.png' width='30' height='30' align='center'/></a>"; ?> <br><br><a href ='#'onclick="javascript:konfir_hapus('<?php echo "man/m_penilaian.php?ak=hapus&id=".$t['u3']."&pengajar=".$t['id_pengajar']."&sem=".$sem; ?>','Ulangan 3')"><img src='../icon/delete.png' width='30' height='30' align='center'/></a> <?php } else { echo "<a href='?act=add&penilaian=$pn&status=Ulangan 3&sem=$sem'><input type='button' value='Input' /></a>"; } ?></td>
		<td width="50" align='center'> <?php if(!empty($t['t1'])){ echo "<a href='?act=edit&penilaian=$pn&status=Tugas 1&id_p=$t[t1]&sem=$sem'><img src='../icon/edit.png' width='30' height='30' align='center'/></a></a> "; ?> <br><br><a href ='#'onclick="javascript:konfir_hapus('<?php echo "man/m_penilaian.php?ak=hapus&id=".$t['t1']."&pengajar=".$t['id_pengajar']."&sem=".$sem; ?>','Tugas 1')"><img src='../icon/delete.png' width='30' height='30' align='center'/></a> <?php } else { echo "<a href='?act=add&penilaian=$pn&status=Tugas 1&sem=$sem'><input type='button' value='Input' /></a>"; } ?></td>
		<td width="50" align='center'> <?php if(!empty($t['t2'])){ echo "<a href='?act=edit&penilaian=$pn&status=Tugas 2&id_p=$t[t2]&sem=$sem'><img src='../icon/edit.png' width='30' height='30' align='center'/></a></a> "; ?> <br><br><a href ='#'onclick="javascript:konfir_hapus('<?php echo "man/m_penilaian.php?ak=hapus&id=".$t['t2']."&pengajar=".$t['id_pengajar']."&sem=".$sem; ?>','Tugas 2')"><img src='../icon/delete.png' width='30' height='30' align='center'/></a> <?php } else { echo "<a href='?act=add&penilaian=$pn&status=Tugas 2&sem=$sem'><input type='button' value='Input' /></a>"; } ?></td>
		<td width="50" align='center'> <?php if(!empty($t['t3'])){ echo "<a href='?act=edit&penilaian=$pn&status=Tugas 3&id_p=$t[t3]&sem=$sem'><img src='../icon/edit.png' width='30' height='30' align='center'/></a></a> "; ?> <br><br><a href ='#'onclick="javascript:konfir_hapus('<?php echo "man/m_penilaian.php?ak=hapus&id=".$t['t3']."&pengajar=".$t['id_pengajar']."&sem=".$sem; ?>','Tugas 3')"><img src='../icon/delete.png' width='30' height='30' align='center'/></a> <?php } else { echo "<a href='?act=add&penilaian=$pn&status=Tugas 3&sem=$sem'><input type='button' value='Input' /></a>"; } ?></td>
		<td width="50" align='center'> </td>
		<td width="50" align='center'><?php if(!empty($t['uts'])){ echo "<a href='?act=edit&penilaian=$pn&status=UTS&id_p=$t[uts]&sem=$sem'><img src='../icon/edit.png' width='30' height='30' align='center'/></a>"; ?> <br><br><a href ='#'onclick="javascript:konfir_hapus('<?php echo "man/m_penilaian.php?ak=hapus&id=".$t['uts']."&pengajar=".$t['id_pengajar']."&sem=".$sem; ?>','UTS')"><img src='../icon/delete.png' width='30' height='30' align='center'/></a> <?php } else { echo "<a href='?act=add&penilaian=$pn&status=UTS&sem=$sem'><input type='button' value='Input' /></a>"; } ?></td>
		<td width="50" align='center'><?php if(!empty($t['uas'])){ echo "<a href='?act=edit&penilaian=$pn&status=UAS&id_p=$t[uas]&sem=$sem'><img src='../icon/edit.png' width='30' height='30' align='center'/></a>"; ?> <br><br><a href ='#'onclick="javascript:konfir_hapus('<?php echo "man/m_penilaian.php?ak=hapus&id=".$t['uas']."&pengajar=".$t['id_pengajar']."&sem=".$sem; ?>','UAS')"><img src='../icon/delete.png' width='30' height='30' align='center'/></a> <?php } else { echo "<a href='?act=add&penilaian=$pn&status=UAS&sem=$sem'><input type='button' value='Input' /></a>"; } ?></td>
		<td width="50" align='center'><?php if(!empty($t['Praktik'])){ echo "<a href='?act=edit&penilaian=$pn&status=Praktik&id_p=$t[Praktik]&sem=$sem'><img src='../icon/edit.png' width='30' height='30' align='center'/></a>"; ?> <br><br><a href ='#'onclick="javascript:konfir_hapus('<?php echo "man/m_penilaian.php?ak=hapus&id=".$t['Praktik']."&pengajar=".$t['id_pengajar']."&sem=".$sem; ?>','Praktik')"><img src='../icon/delete.png' width='30' height='30' align='center'/></a> <?php  } else { echo "<a href='?act=add&penilaian=$pn&status=Praktik&sem=$sem'><input type='button' value='Input' /></a>"; } ?></td>
		<td width="50" align='center'><?php if(!empty($t['sikap'])){ echo "<a href='?act=edit&penilaian=$pn&status=Sikap&id_p=$t[sikap]&sem=$sem'><img src='../icon/edit.png' width='30' height='30' align='center'/></a>"; ?> <br><br><a href ='#'onclick="javascript:konfir_hapus('<?php echo "man/m_penilaian.php?ak=hapus&id=".$t['sikap']."&pengajar=".$t['id_pengajar']."&sem=".$sem; ?>','Sikap')"><img src='../icon/delete.png' width='30' height='30' align='center'/></a> <?php } else { echo "<a href='?act=add&penilaian=$pn&status=Sikap&sem=$sem'><input type='button' value='Input' /></a>"; } ?></td>
		<td width="50" align='center'></td>
		<td width="50" align='center'><?php  echo "<b>".$t['NRR']."</b><br>Rata2";//  if(!empty($t['Rapot'])){ echo "<a href='#'> </a> "; ?> <!--a href ='#'onclick="javascript:konfir_hapus('<?php // echo "man/m_penilaian.php?ak=hapus&id=".$t['Rapot']."&pengajar=".$t['id_pengajar']; ?>','RAPOT')"></a--> <?php // } else { // echo "<a href='?act=add&penilaian=$pn&status=Rapot'><input type='button' value='Input' /></a>"; } ?></td>
<?php  }  } ?>
	</tr>			
</table>