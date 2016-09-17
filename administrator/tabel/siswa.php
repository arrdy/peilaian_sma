<?php
	$cari = mysqli_query($con,"select * from siswa s 
										left join kelas k on k.id_kelas = s.id_kelas  ") or die ('Gagal Pencarian!!!')
?>
<a href="?form=siswa"><button><img src="../icon/addsiswa.png" width="30" height="30"/></button></button></a></br></br>

<table border="1" cellpadding="5">
	<tr class="head">
		<td width="10" align="center">NO</td>
		<td width="50" align="center">NIS</td>
		<td width="200" align="center">NAMA</td>
		<td width="40" align="center">KELAS</td>
		<td width="40" align="center">JURUSAN</td>
		<td width="200" align="center">TEMPAT LAHIR</td>
		<td width="100" align="center">TGL LAHIR</td>
		<td width="100" align="center">jenis kelamin</td>
		<td width="60" align="center">PILIHAN</td>
	</tr>
	<?php
		if (mysqli_num_rows($cari)==0)
			{ echo "<tr>
						<td colspan='10'> Data Kosong!!!</td>
					</tr>"; }

			else{
				$no=1;
			while ($tampil = mysqli_fetch_assoc($cari))
			{
				echo "
					<tr class='satu'>
						<td>".$no."</td>
						<td>".$tampil['nis']."</td>
						<td>".$tampil['nama']."</td>
						<td>".$tampil['kelas']."</td>
						<td>".$tampil['jurusan']."</td>
						<td>".$tampil['tempat_lahir']."</td>
						<td>".$tampil['tgl_lahir']."</td>
						<td>".$tampil['jenis_kelamin']."</td>
						<td>
						<a href='?form=detail_siswa&act=detail&nis=".$tampil['nis']."&ta=".$tampil['tahun_ajaran']."&nama=".$tampil['nama']."&id_kelas=".$tampil['id_kelas']."&jurusan=".$tampil['jurusan']."&tempat_lahir=".$tampil['tempat_lahir']."&tgl_lahir=".$tampil['tgl_lahir']."&jk=".$tampil['jenis_kelamin']."&agama=".$tampil['agama']."&status_keluarga=".$tampil['status_keluarga']."&anak_ke=".$tampil['anak_ke']."&alamat=".$tampil['alamat']."&no_telp=".$tampil['no_telp']."&nama_ayah=".$tampil['nama_ayah']."&nama_ibu=".$tampil['nama_ibu']."&alamat_ortu=".$tampil['alamat_ortu']."&pekerjaan_ayah=".$tampil['pekerjaan_ayah']."&pekerjaan_ibu=".$tampil['pekerjaan_ibu']."&password_siswa=".$tampil['password_siswa']."&password_ortu=".$tampil['password_ortu']."'><img src='../icon/detail.png' width='20' height='20' align='center'/></a>
						<a href='?form=siswa&act=edit&nis=".$tampil['nis']."&ta=".$tampil['tahun_ajaran']."&nama=".$tampil['nama']."&id_kelas=".$tampil['id_kelas']."&jurusan=".$tampil['jurusan']."&tempat_lahir=".$tampil['tempat_lahir']."&tgl_lahir=".$tampil['tgl_lahir']."&jk=".$tampil['jenis_kelamin']."&agama=".$tampil['agama']."&status_keluarga=".$tampil['status_keluarga']."&anak_ke=".$tampil['anak_ke']."&alamat=".$tampil['alamat']."&no_telp=".$tampil['no_telp']."&nama_ayah=".$tampil['nama_ayah']."&nama_ibu=".$tampil['nama_ibu']."&alamat_ortu=".$tampil['alamat_ortu']."&pekerjaan_ayah=".$tampil['pekerjaan_ayah']."&pekerjaan_ibu=".$tampil['pekerjaan_ibu']."&password_siswa=".$tampil['password_siswa']."&password_ortu=".$tampil['password_ortu']."'><img src='../icon/edit.png' width='20' height='20' align='center'/></a>
						";
?>
					 	
					 	<a href='#'  onclick="javascript:konfir_hapus('<?php echo "man/m_siswa.php?ak=hapus&nis=".$tampil['nis']; ?>','<?php echo $tampil['nama'];?>')" ><img src='../icon/delete.png' width='20' height='20' align='center'/></a>
					 	
					    
						<?php
						echo"
						</td>

					</tr>";
						$no++;
				}
			}
	?>
	
</table>
</br></br></br></br>