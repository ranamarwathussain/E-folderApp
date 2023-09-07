<?php
		$conn = mysqli_connect("localhost", "root", "", "db_sfms");
	
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
	
	$default_query = mysqli_query($conn, "SELECT * FROM `cods`") or die(mysqli_error());
	$check_default = mysqli_num_rows($default_query);
	$row=$default_query->fetch_assoc();
	if($check_default === 0){
		$enrypted_password = md5('admin');
		mysqli_query($conn, "INSERT INTO `user` VALUES('', 'Administrator', '', 'admin', '$enrypted_password', 'administrator')") or die(mysqli_error());
		return false;
	}
?>