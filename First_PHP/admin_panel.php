<?php
include_once "action.php";
include "menu.php";
include "header.php";
if (isset($_GET['login']) && $_GET['login'] != "") {
	$admin = $_GET['login'];
	if(check_log($admin) == true){
		echo "<h3 style='padding-top:10%'>Привет,  $admin!</h3>";
	}
	} else {
		header("Location: index.php");
    }
include "footer.php";