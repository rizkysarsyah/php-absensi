<?php 
    session_start();

    require_once"config/database.php";
 
 	if(!isset($_SESSION['nama']))
 	{
	header("location: login.php?alert=3");
	}
    ?>