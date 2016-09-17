<script type="text/javascript">
    function cekvalidasi(text){
        if(text=='capca'){ alert('Captcha Salah'); document.getElementById('cc').focus();  }
        else if(text=='cek')
            { alert('Silahkan periksa USERNAME dan PASSWORD anda...!!!'); }
        else{}
    }
</script>

<?php
    session_start();
    if(!empty($_SESSION['id']) and !empty($_SESSION['nama']) and !empty($_SESSION['level']))
        { header('location:../administrator/home.php'); }
    if (!empty($_GET['user'])){ $user=$_GET['user']; }else{ $user=''; }
    if (! empty($_GET['pass'])) { $text=$_GET['pass']; } else { $text=''; }
?>

<html>
    <head>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="shortcut icon" type="text/css" href="image/logo.png">
    <title>LOGIN SISWA</title>
    </head>
    <body onload="cekvalidasi('<?php echo $text; ?>');">
    	<form name="frm" action="cek_login.php" method="post" class="login">

            <img src="image/logo.png" width="97" height="90" hspace="50" align="top">
            </br>
            <h1>Login Siswa</h1>
            </br>
        	<input type="text" name="user" value="<?php echo $user; ?>" required="required" class="login-input" placeholder="username" autofocus>
            <input type="password" name="pass" required="required"  class="login-input" placeholder="password">
            <img src="gambar.php" alt="gambar" class="img-chaptcha">
            <input type="text" id="cc" name="nilaiCaptcha" required="required"  class="login-input" placeholder="Isi Code di atas">
            <input type="submit" value="Masuk" class="login-submit">
            <h1>SMA Muhammadiyah Pleret</h1>
        </form>
    </body>
</html>
