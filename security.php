<?php
	session_start();
	if(empty($_SESSION['id']) or empty($_SESSION['nama']) or empty($_SESSION['level']))
		{  header('location:../'); }
?>