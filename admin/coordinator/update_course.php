<?php session_start();
?>
<?php
	require_once 'conn.php';

	
	if(ISSET($_POST['update'])){
		$cid = $_POST['cid'];
		$firstname = $_POST['firstname'];
        
		
		mysqli_query($conn, "update `courses` set  courseName='$firstname '  where cid='$cid'") or die(mysqli_error());
		
	echo "<script>alert('Successfully updated!')</script>";
		echo "<script>window.location = 'courses.php'</script>";
	}
?>