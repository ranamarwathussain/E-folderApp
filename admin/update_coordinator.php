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
		$depcode= $_POST['depcode'];
		$depname= $_POST['depname'];
		$depschool= $_POST['depschool'];
		mysqli_query($conn, "update `coordiantor` set  FirstName='$firstname ', LastName='$lastname', gender='$gender',email='$email',pass='$password',contactno='$contactno' where cid='$cid'") or die(mysqli_error());
		
	echo "<script>alert('Successfully updated!')</script>";
		echo "<script>window.location = 'coordinator.php'</script>";
	}
?>