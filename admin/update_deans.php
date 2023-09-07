<?php session_start();
?>
<?php
	require_once 'conn.php';

	
	if(ISSET($_POST['update'])){
		$cid = $_POST['cid'];
		$firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$email= $_POST['email'];
		$password = md5($_POST['password']);
		$contactno= $_POST['contactno'];
		 
		mysqli_query($conn, "update `deans` set  FirstName='$firstname ', LastName='$lastname', gender='$gender',email='$email',pass='$password',contactno='$contactno' where didid='$cid'") or die(mysqli_error());
		
	echo "<script>alert('Successfully updated!')</script>";
		echo "<script>window.location = 'deans.php'</script>";
	}
?>