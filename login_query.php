<?php
	
	require 'conn.php';
	
	if(ISSET($_POST['login'])){
		$stud_no = $_POST['emp_code'];
		$password =$_POST['password'];
		
		$query = mysqli_query($conn, "SELECT * FROM `faculty` WHERE `fcode` = '$stud_no' && `pass` = '$password'") or die(mysqli_error());
		$fetch = mysqli_fetch_array($query);
		$row = $query->num_rows;
		
		if($row > 0){
			$_SESSION['faculty'] = $fetch['fcode'];
			
			echo '<script>
			window.location.href="faculty.php";</script>';
		
		}else{
			echo "<center><label class='text-danger'>Invalid username or password</label></center>";
		}
	}
?>