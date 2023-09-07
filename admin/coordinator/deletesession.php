<?php session_start();
?>
<?php
	 require_once 'conn.php';
	
	if(ISSET($_GET['id'])){
		
		$did = $_GET['id'];
		//$password = md5($_POST['password']);
		 
		mysqli_query($conn, "delete from sessions WHERE `sid` = '$did'") or die(mysqli_error());
        //mysqli_query($conn, "delete from deans_assigndep WHERE `dcode` = '$did'") or die(mysqli_error());
		echo "<script>alert('Successfully Deleted!')</script>";
		echo "<script>window.location = 'session.php'</script>";
		}
		
	 
	/*
	if(ISSET($_POST['stud_id'])){
		$stud_id = $_POST['stud_id'];
		$query = mysqli_query($conn, "SELECT * FROM `student` WHERE `stud_id` = '$stud_id'") or die(mysqli_error());
		$fetch  = mysqli_fetch_array($query);
		$stud_no = $fetch['stud_no'];
		
		if(file_exists("../files/".$stud_no)){
			removeDir("../files/".$stud_no);
			mysqli_query($conn, "DELETE FROM `student` WHERE `stud_id` = '$stud_id'") or die(mysqli_error());
		}
	}
	
	function removeDir($dir) {
		$items = scandir($dir);
		foreach ($items as $item) {
			if ($item === '.' || $item === '..') {
				continue;
			}
			$path = $dir.'/'.$item;
			if (is_dir($path)) {
				xrmdir($path);
			} else {
				unlink($path);
			}
		}
		rmdir($dir);
	}
	*/
	
?>