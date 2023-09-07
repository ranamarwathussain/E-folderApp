<?php session_start();
?>
<?php
	require_once 'conn.php';

	
	if(ISSET($_POST['save'])){

		
		extract($_POST);
			
		$sql="select * from sessions where 	session='$sessionname'";
		$result=$conn->query($sql);
		if(mysqli_num_rows($result)>0)
		{
		echo "<script>alert('Session Already Found!')</script>";
		echo "<script>window.location = 'session.php'</script>";
		}
		else
		{
			
			$sessionname11=$sessionname.$sessionyear;
		mysqli_query($conn, "INSERT INTO `sessions` VALUES('','$sessionname11','IN Active')") or die(mysqli_error());
		
		echo "<script>window.location = 'session.php'</script>";
	     }
	}
	 
?>