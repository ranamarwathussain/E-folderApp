<?php session_start();
?>
<?php
	require_once 'conn.php';

	
	if(ISSET($_POST['update'])){
		extract($_POST);
		if($sessionstatus=='Active')
		{
		$sql="select * from sessions where 	status='$sessionstatus'";
		$result=$conn->query($sql);
		if(mysqli_num_rows($result)>0)
		{
		echo "<script>alert('Session Already Active!')</script>";
		echo "<script>window.location = 'session.php'</script>";
		}else
		{
		mysqli_query($conn, "update `sessions` set  status='$sessionstatus ' where sid='$sid'") or die(mysqli_error());
		
	echo "<script>alert('Successfully updated!')</script>";
		echo "<script>window.location = 'session.php'</script>";
		}
		}else
		{
			mysqli_query($conn, "update `sessions` set  status='$sessionstatus ' where sid='$sid'") or die(mysqli_error());
		
			echo "<script>alert('Successfully updated!')</script>";
			echo "<script>window.location = 'session.php'</script>";

		}
	}
?>