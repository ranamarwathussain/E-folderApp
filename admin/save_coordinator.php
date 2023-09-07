<?php session_start();
?>
<?php
	require_once 'conn.php';

	
	if(ISSET($_POST['save'])){

		$ccode = $_POST['ccode'];
		$firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$email= $_POST['email'];
		$password = md5($_POST['password']);
		$contactno= $_POST['contactno'];
		 
		$sql="select * from coordiantor where ccode='$ccode' || email='$email' || contactno='$contactno'";
		$result=$conn->query($sql);
		if(mysqli_num_rows($result)>0)
		{
		echo "<script>alert('Record Email Or Code Or contact Already Found!')</script>";
		echo "<script>window.location = 'coordinator.php'</script>";
		}
		else
		{
		mysqli_query($conn, "INSERT INTO `coordiantor` VALUES('', '$ccode', '$firstname ', '$lastname', '$gender','$email','$password','$contactno','-','-','-', '".$row['firstname'].'-'.$row['username']."', NOW())") or die(mysqli_error());
		
		header('location: coordinator.php');
	     }
	}
	if(ISSET($_POST['getcoor'])){
		$ccode = $_POST['ccode'];
		$depcode= $_POST['depcode'];
		$sq1l="select * from coordiantor_assigndep where ccode='$ccode' And depcode='$depcode'";
		$result1=$conn->query($sq1l);
		if(mysqli_num_rows($result1)>0)
		{
		echo "<script>alert('Record Already Found!')</script>";
		echo "<script>window.location = 'coordinator.php'</script>";
		}
		else
		{
		 
		mysqli_query($conn, "INSERT INTO `coordiantor_assigndep` VALUES('', '$ccode','$depcode','".$row['firstname'].'-'.$row['username']."', NOW())") or die(mysqli_error());
		
		header('location: coordinator.php');
		}
	}
?>