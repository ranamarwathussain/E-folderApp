<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['update'])){
		 
		$depname = $_POST['depname'];
		$depschool = $_POST['depschool'];
		$deploc= $_POST['deploc'];
		$did = $_POST['did'];
		//$password = md5($_POST['password']);
		
		mysqli_query($conn, "UPDATE `departments` SET   `depname` = '$depname', `depschool` = '$depschool', `deploc` = '$deploc'  WHERE `did` = '$did'") or die(mysqli_error());
		
		echo "<script>alert('Successfully updated!')</script>";
		echo "<script>window.location = 'department.php'</script>";
	}
?>