<?php
if(!empty($_GET['form']))
            {
				if($_GET['form']=='tu') { include "form/tu.php"; }
				else if($_GET['form']=='mapel') {include "form/mapel.php";}
				else if($_GET['form']=='kelas') {include "form/kelas.php";}
				else if($_GET['form']=='ekstrakurikuler') {include "form/ekstrakurikuler.php" ;}
				else if($_GET['form']=='absensi') {include "form/absensi.php";}
				else if($_GET['form']=='guru') {include "form/guru.php";}
				else if($_GET['form']=='wali_kelas') {include "form/wali_kelas.php";}
                else if($_GET['form']=='pengajar') {include "form/pengajar.php";}
                else if($_GET['form']=='siswa') {include "form/siswa.php";}
                else if($_GET['form']=='absen') {include "form/absen.php"; }
                else if($_GET['form']=='detail_siswa') {include "form/detail_siswa.php"; }
                else if($_GET['form']=='peserta_ekstra') {include"form/peserta_ekstra.php";}
                else if($_GET['form']=='ganti_pass') {include"form/ganti_pass.php";}
                else if($_GET['form']=='kenaikan_kelas') {include"form/kenaikan_kelas.php";}
                else if($_GET['form']=='kepsek') {include"form/kepsek.php";}
            }  
else            
if(!empty($_GET['panggil']))
            {
                if($_GET['panggil']=='tu') { include "tabel/tu.php"; }
                else if($_GET['panggil']=='mapel') { include "tabel/mapel.php"; }
                else if($_GET['panggil']=='guru') { include "tabel/guru.php"; }
                else if($_GET['panggil']=='kelas') { include "tabel/kelas.php"; }
                else if($_GET['panggil']=='siswa') { include "tabel/siswa.php"; }
                else if($_GET['panggil']=='ekstrakurikuler') {include "tabel/ekstrakurikuler.php"; }
                else if($_GET['panggil']=='wali_kelas') {include "tabel/wali_kelas.php"; }
                else if($_GET['panggil']=='absensi') {include "tabel/absensi.php"; }
                else if($_GET['panggil']=='pengajar') {include "tabel/pengajar.php"; }
                else if($_GET['panggil']=='peringkat') {include "tabel/peringkat.php"; }
                else if($_GET['panggil']=='rapot_guru') {include "tabel/rapot_guru.php"; }
                else if($_GET['panggil']=='rapot_per_siswa') {include "tabel/rapot_per_siswa.php"; }
                else if($_GET['panggil']=='rapot_per_tingkat') {include "tabel/rapot_per_tingkat.php"; }
                else if($_GET['panggil']=='kepsek') {include "tabel/kepsek.php"; }
            }             

if(!empty($_GET['pn'])) //tabel penilaian berdasarkan id pengajar
            {
                include "tabel/penilaian.php";
            } 
if(!empty($_GET['eks'])) //tabel penilaian berdasarkan id kelas
            {
                include "tabel/peserta_ekstra.php";
            }  
if(!empty($_GET['kk'])) //tabel penilaian berdasarkan id kelas
            {
                include "tabel/kenaikan_kelas.php";
            }                
if(!empty($_GET['penilaian'])) //form penilaian beru berdasarkan id pengajar 
            {
                include "form/penilaian.php";
            }  

?>            