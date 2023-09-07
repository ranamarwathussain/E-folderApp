<?php session_start();
?>
<?php
	 require_once 'conn.php';
	
	if(ISSET($_GET['id'])){
		
		$did = $_GET['id'];
		//$password = md5($_POST['password']);
		 
		mysqli_query($conn, "delete from courses WHERE `coursecode` = '$did'") or die(mysqli_error());
		mysqli_query($conn, "delete from courses_section  WHERE `coursecode` = '$did'") or die(mysqli_error());
		mysqli_query($conn, "delete from  courses_assign WHERE `corsecode` = '$did'") or die(mysqli_error());
        //mysqli_query($conn, "delete from deans_assigndep WHERE `dcode` = '$did'") or die(mysqli_error());
		echo "<script>alert('Successfully Deleted!')</script>";
		echo "<script>window.location = 'courses.php'</script>";
		}
		if(ISSET($_GET['section']) ){
		
		$did = $_GET['section'];
		//$password = md5($_POST['password']);
		 
		
		mysqli_query($conn, "delete from courses_section  WHERE `coursecode` = '$did'") or die(mysqli_error());
		mysqli_query($conn, "delete from  courses_assign WHERE `corsecode` = '$did'") or die(mysqli_error());
        //mysqli_query($conn, "delete from deans_assigndep WHERE `dcode` = '$did'") or die(mysqli_error());
		echo "<script>alert('Successfully Deleted!')</script>";
		echo "<script>window.location = 'courses.php'</script>";
		}
		

	
?>