<?php session_start();
?>
<?php
	require_once 'conn.php';

	
	if(ISSET($_POST['save'])){
		$depcode = $_POST['depcode'];
		$depname = $_POST['depname'];
		$depschool = $_POST['depschool'];
		$deploc= $_POST['deploc'];
		
		//$password = md5($_POST['password']);
		$sql1="select * from departments where depcode='$depcode' || depname='$depname'";
		$result1=$conn->query($sql1);
		if(mysqli_num_rows($result1)>0)
		{
		echo "<script>alert('Record Code Or Name Already Found!')</script>";
		echo "<script>window.location = 'department.php'</script>";
		}
		else
		{
		mysqli_query($conn, "INSERT INTO `departments` VALUES('', '$depschool', '$depcode', '$depname', '$deploc', '".$row['firstname'].'-'.$row['username']."', NOW())") or die(mysqli_error());
		
		header('location: department.php');
	   }
	}
?>