<?php include ('../security.php'); ?>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" type="text/css" href="image/title-logo.png">
<link rel="stylesheet" type="text/css" href="image/asset.css">
<link rel="stylesheet" type="text/css" href="image/asset.min.css">
<title>SMA Muhammadiyah Pleret</title>
<!--skript pesan-->
<script type="text/javascript">
    function konfir_hapus(url,ket)
    {
        pil = confirm("anda yakin ingin menghapus data '"+ket+"' ?");
        if(pil==true)
            { document.location=url; }
    }
    function tabel_penilaian(penilaian)
    {
        var s = document.getElementById('sem').value;
        var n = document.getElementById('nis').value;
        document.location.href='?pn='+penilaian+'&sem='+s+'&nis='+n;
    }
    function tabel_rapot(nis,kelas)
    {
        var s = document.getElementById('sem').value;
        document.location.href='?panggil=rapot_per_siswa&nis='+nis+'&sem='+s+'&kelas='+kelas;
    }
</script>
<!--end-->
</head>
    <body>
    <div id="header">
    	<div id="logo-header">
        <img src="image/title-logo.png" width="100%" height="100%"></div>
        <div id="judul-header">SMA Muhammadiyah Pleret <div class="alamat">  Jl.Kanggotan, Pleret, Kab.Bantul</div></div>
    	</div>
 		<div id="line-menu"> 

        <!--dropdown-->
  	    <div id="dropdown">
        <ul>
            <li><div style="font-size:14; width:250; margin-left:-80;"><img src="../icon/pengguna.png" width="30" height="30" align="center" /><?php echo substr( $_SESSION['nama'], 0,12)." ( ".$_SESSION['level']." )"; ?></div>
                <ul>
                    <li><img src="../icon/gantipass.png" width="30" height="30" align="center" /><a href="?form=ganti_pass">Ganti Password</a></li>
                    <li><img src="../icon/logout.png" width="30" height="30" align="center" /><a href="../logout.php">Logout</a></li>
                </ul>
                </li>
        </ul>
        </div>
        <!--end dropdown-->
		</div>
    </div>
    <!--content-->
    <div id="content">
        <?php include "../config/koneksi.php"; 
                include "page.php"; 
          //      session_start();
        ?>
    </div>
    <div id="sidebar">
    <?php if($_SESSION['level']=='tata_usaha'){ ?> 
    <div class="tampilan">
        <div class="tampilan-title"><h3>Master Data</h3></div>
        <ul>
            <li><img src="../icon/admin.png" width="25" height="25"><a href="?panggil=tu">Data Tata Usaha</a></li>
            <li><img src="../icon/mapel.png" width="25" height="25"><a href="?panggil=tu"><a href="?panggil=mapel">Data Mata Pelajaran</a></li>
            <li><img src="../icon/kelas.png" width="25" height="25"><a href="?panggil=tu"><a href="?panggil=kelas">Data Kelas</a></li>
            <li><img src="../icon/ekstrakurikuler.png" width="25" height="25"><a href="?panggil=tu"><a href="?panggil=ekstrakurikuler">Data Ekstrakurikuler</a></li>
            <li><img src="../icon/siswa.png" width="25" height="25"><a href="?panggil=tu"><a href="?panggil=siswa">Data Siswa</a></li>
            <li><img src="../icon/absensi.png" width="25" height="25"><a href="?panggil=tu"><a href="?panggil=absensi">Data Absensi</a></li>
            <li><img src="../icon/guru.png" width="25" height="25"><a href="?panggil=tu"><a href="?panggil=guru">Data Guru</a></li>
            <li><img src="../icon/pengajar.png" width="25" height="25"><a href="?panggil=tu"><a href="?panggil=pengajar">Data Pengajar</a></li>
            <li><img src="../icon/walikelas.png" width="25" height="25"><a href="?panggil=tu"><a href="?panggil=wali_kelas">Data Wali Kelas</a></li>
            <li><img src="../icon/kepsek.png" width="25" height="25"><a href="?panggil=tu"><a href="?panggil=kepsek">Kepala Sekolah</a></li>
        </ul>
    </div>

    <?php }
    $status_wali= ''; 
    if($_SESSION['level']=='guru'){ ?> 
    <div class="tampilan">
        <?php include_once "koneksi.php";
            $cari = mysqli_query($con,"select * from wali_kelas p
                                        inner join kelas k on k.id_kelas=p.id_kelas where p.id_guru='".$_SESSION['id']."' ") or die ('Pencarian Gagal !!!');
            if(mysqli_num_rows($cari)>0)
            {  $status_wali= 'wali';
             echo "<div class='tampilan-title'><h3>Wali Kelas</h3></div> <ul>"; 
                    while ($g = mysqli_fetch_assoc($cari))
                    {   
                        echo "<li><img src='../icon/kenaikankelas.png' width='25' height='25'><a href='?kk=".$g['id_kelas']."'>Kenaikan Kelas ( ".$g['kelas']." )</a></li>";
                        echo "<li><img src='../icon/pesertaekstra.png' width='25' height='25'><a href='?eks=".$g['id_kelas']."'>Peserta Ekstrakurikuler ( ".$g['kelas']." )</a></li>";
                    }   
            echo  
            "</ul></div>";
           } 
        } 
        ?>



    <?php if($_SESSION['level']=='guru' ){ 
            include_once "koneksi.php";
            $cari = mysqli_query($con,"select p.*,g.nama,m.nama_mapel,k.kelas from pengajar p 
                                        left join guru g on g.id_guru=p.id_guru 
                                        left join mata_pelajaran m on m.id_mapel=p.id_mapel
                                        left join kelas k on k.id_kelas=p.id_kelas where g.id_guru='".$_SESSION['id']."' ") or die ('Pencarian Gagal !!!');
            if(mysqli_num_rows($cari)>0)
            {   echo "<div class='tampilan'>
                        <div class='tampilan-title'><h3>Penilaian</h3></div>
                        <ul>";
                    while ($g = mysqli_fetch_assoc($cari))
                    {   
                        echo "<li><img src='../icon/penilaian.png' width='25' height='25'><a href='?pn=".$g['id_pengajar']."'>".$g['nama_mapel']."( ".$g['kelas']." )</a></li>";
                    }  
                echo "</ul></div>";    
            } 
    } 
    ?>



   <?php if($_SESSION['level']=='siswa'|| ( $_SESSION['level']=='guru' and $status_wali=='wali' ) || $_SESSION['level']=='ortu'){ ?>   
    <div class="tampilan">
        <div class="tampilan-title"><h3>Laporan</h3></div>
        <ul>
         <?php if($_SESSION['level']=='guru' ){ ?> <li><img src="../icon/raport.png" width="25" height="25"><a href="?panggil=peringkat">Peringkat</a></li> <?php } ?>
         <?php if($_SESSION['level']=='siswa' or $_SESSION['level']=='ortu'){ ?> <li><img src="../icon/raport.png" width="25" height="25"><a href="?panggil=rapot_per_tingkat">Raport</a></li>  <?php } ?>  
        </ul>
    </div>
    <?php } ?>
    <!--end side bar-->
	</div>   
	<!--div id="footer">Copyright@ SMA Muhammadiyah Pleret.com</div-->
    </body>
</html>