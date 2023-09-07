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
		extract($_POST);
			$qry1= "SELECT * FROM departments where depcode='$depcode' ";
               $result1 = $conn->query($qry1);
               $getnamedep=$result1->fetch_assoc();
		$sql="select * from faculty where fcode='$ccode' && depcode='$depcode' || email='$email' || contactno='$contactno'";
		$result=$conn->query($sql);
		if(mysqli_num_rows($result)>0)
		{
		echo "<script>alert('Record Email Or Code Or contact Already Found!')</script>";
		echo "<script>window.location = 'faculty.php'</script>";
		}
		else
		{
			

		mysqli_query($conn, "INSERT INTO `faculty` VALUES('', '$ccode', '$firstname ', '$lastname', '$gender','$email','$password','$contactno','".$getnamedep['depcode']."','".$getnamedep['depname']."','".$getnamedep['depschool']."', '".$row['ccode']."', NOW())") or die(mysqli_error());
		
		echo "<script>window.location = 'faculty.php'</script>";
	     }
	}
	 
?>