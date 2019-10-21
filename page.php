<?php 
include "session.php"; error_reporting(0);
include "session.php";
if(isset($_GET['page'])){
	$page = $_GET['page'];

	switch ($page) {
		case 'admin':
		include "admin/index.php";
		break;

		case 'pegawai':
		include "user/index.php";
		break;

		case 'tambah_pegawai':
		include 'admin/add_pegawai.php';
		break;

		case 'data_pegawai':
		include 'admin/data_pegawai.php';
		break;

		case 'edit':
		include 'admin/edit_pegawai.php';
		break;
		
		default:
		echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
		break;
	}
}else{
	if($_SESSION['level']=="pegawai")
	{
		include 'user/index.php';
	}
	elseif ($_SESSION['level']=="admin") 
	{
		include 'admin/index.php';
	}
}

?>