<?php 

include_once "koneksi.php";
$p=$_GET['penilaian'];


		if(!empty($_GET['sem'])){ $sem=$_GET['sem']; }

		if(!empty($_GET['act']) and $_GET['act']=='edit')
		{
			
//			$tgl=$_GET['tgl'];
			$ak=$_GET['act'];
			$id=$_GET['id_p'];
//			$ket=$_GET['ket'];

				$detail = mysqli_query($con,"select k.*,m.*,p.id_pengajar,pn.Keterangan as materi,pn.tgl from pengajar p 
											inner join kelas k on p.id_kelas=k.id_kelas inner join mata_pelajaran m on m.id_mapel=p.id_mapel left join penilaian pn on pn.id_penilaian='$id' and pn.semester='$sem' where p.id_pengajar='$p' ") or die ('Pencarian Gagal !!!');
				$show = mysqli_fetch_assoc($detail);

				$cari = mysqli_query($con,"select s.nis,s.nama,n.* from siswa s 
										   left join (select nilai.* from nilai inner join (select semester,id_penilaian from penilaian)p on p.semester='$sem' and nilai.id_penilaian=p.id_penilaian) n on n.nis=s.nis and n.id_penilaian='$id' 
										   where s.id_kelas='$show[id_kelas]'	
										   order by s.nama asc ") or die ('Pencarian Gagal !!!');
				$materi = $show['materi'];
				$tgl = $show['tgl'];
		}
		else
		{		$ak='add'; $id=''; $ket=''; $materi='-'; $tgl='';
				$tgl=date('Y-m-d');

					$id = mysqli_query($con,"select coalesce(max(id_penilaian),0)+1 as no from penilaian") or die ('Gagal Pencarian !!!');
					$tmp = mysqli_fetch_assoc($id);
					$id = $tmp['no'];


				$cari = mysqli_query($con,"select s.nis,s.nama,'' as ket,'' as status,''as nilai from siswa s 
										   inner join pengajar pn on pn.id_kelas=s.id_kelas and pn.id_pengajar='$p' order by s.nama asc ") or die ('Pencarian Gagal !!!');

				$detail = mysqli_query($con,"select k.*,m.*,p.id_pengajar from pengajar p inner join kelas k on p.id_kelas=k.id_kelas inner join mata_pelajaran m on m.id_mapel=p.id_mapel where p.id_pengajar='$p' ") or die ('Pencarian Gagal !!!');
				$show = mysqli_fetch_assoc($detail);
		}
		$p=$_GET['penilaian'];
		$t=$_GET['status'];
		$jab='';
?>
</br></br>
<table border=0 cellpadding="5">
<tr>	
	<td>NIS</td>
	<td>NAMA</td>
	<td>NILAI</td>
</tr>
<form action='man/m_penilaian.php?ak=<?php echo $ak."&sem=".$sem; ?>' method='post' >

<input type="hidden" name='id' value="<?php echo $id; ?>" readonly='readonly' required='required' />
<input type="hidden" name='sem' value="<?php echo $sem; ?>" readonly='readonly' required='required' />
<label>Nama Mapel :</label></br>
<input type="text" name='pelajaran' value="<?php echo $show['nama_mapel']; ?>" placeholder='pelajaran' /></br></br>	
<label>KKM :</label></br>
<input type="text" name='kkm' value="<?php echo $show['kkm']; ?>" placeholder='kkm' /></br></br>
<label>Kelas :</label></br>
<input type="text" name='kelas' value="<?php echo $show['kelas']; ?>" placeholder='kelas' /></br></br>
<input type="hidden" name='id_kelas' value="<?php echo $show['id_kelas']; ?>" placeholder='id_kelas' />
<input type="hidden" name='pengajar' value="<?php echo $p; ?>" readonly='readonly' required='required' />
<label>Status :</label></br>
<input type="text" name='status' value="<?php echo $t; ?>" readonly='readonly' required='required' /></br></br> 
<label>Nama Ulangan :</label></br>
<input type="text" name='ket' value="<?php echo $materi; ?>" placeholder='Keterangan..' required='required' /></br></br>
<label>Tanggal :</label></br>		
<input type="date" name='tgl' required=required value="<?php echo $tgl; ?>" required='required' /> </br></br>
	
	<?php 
			if(mysqli_num_rows($cari)>0)
			{	$i=1;
					while ($g = mysqli_fetch_assoc($cari))
					{	echo "<tr>";	
						
						if(!empty($_GET['act']) and $_GET['act']=='edit')
						{   echo "<input type='hidden' name='idn".$i."' value='".$g['id_nilai']."' readonly=readonly />"; }

						echo "	
								<td><input type='text' size='10' name='nis".$i."' value='".$g['nis']."' readonly=readonly /></td>
								<td><input type='text' value='".ucfirst($g['nama'])."' readonly=readonly /></td>
								
							  	<td>
									<input type='text' required='required' size='2' value='".$g['nilai']."' name='n".$i."'";    echo " /> 
							  	</td>
							  </tr>";
							  $i++;
					}	
	    	} 
	 ?>
	 <input type="hidden" value='<?php echo $i; ?>' name='jumlah' /> 
	 
	 </table></br>
	 	 <input type='submit' value="simpan" />
	 </form>
	 </br></br></br></br>