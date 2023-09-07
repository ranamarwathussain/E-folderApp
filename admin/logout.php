<?php session_start();
	unset($_SESSION['user']);
	unset($_SESSION['status']);
	unset($_SESSION['faculty']);
	header("location: index.php");
?>