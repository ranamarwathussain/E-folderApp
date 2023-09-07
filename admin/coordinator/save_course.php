<?php session_start();
?>
<?php
	require_once 'conn.php';

	
	if(ISSET($_POST['save'])){

		extract($_POST);
			
		$sql="select * from courses where coursecode='$ccode' && courseName='$firstname'";
		$result=$conn->query($sql);
		if(mysqli_num_rows($result)>0)
		{
		echo "<script>alert('Record Already Found!')</script>";
		echo "<script>window.location = 'courses.php'</script>";
		}
		else
		{
			

		mysqli_query($conn, "INSERT INTO `courses` VALUES('', '$ccode', '$firstname ', '-','".$row['ccode']."')")or die(mysqli_error());
		
		
		echo "<script>window.location = 'courses.php'</script>";
		
	     }
	}
	if(ISSET($_POST['getcoor'])){
		$fcode = $_POST['fcode'];
		$coursecode= $_POST['coursecode'];
		$coursename= $_POST['coursename'];
		$coursesection= $_POST['coursesection'];

		$sq1l14="select * from sessions where status='Active'";
		$result114=$conn->query($sq1l14);
		$result1144=$result114->fetch_assoc();

		$sq1l1="select * from faculty where fcode='$fcode'";
		$result11=$conn->query($sq1l1);
		$result116=$result11->fetch_assoc();
		
		$sq1l="select * from courses_assign where corsecode='$coursecode' And courseName='$coursename' and coursesection='$coursesection' ";
		$result1=$conn->query($sq1l);
		if(mysqli_num_rows($result1)>0)
		{
		echo "<script>alert('Record Already Found!')</script>";
		echo "<script>window.location = 'courses.php'</script>";
		}
		else
		{
		
		mysqli_query($conn, "INSERT INTO courses_assign VALUES('', '$fcode','".$result116['FirstName']."','".$result116['LastName']."','$coursecode','$coursename','$coursesection','".$result1144['session']."','".$row['ccode']."','0' )") or die(mysqli_error($conn));
		
		echo "<script>window.location = 'courses.php'</script>";
		}
	}
	if(ISSET($_POST['getsection'])){
		$coursename = $_POST['coursename'];
		$coursecode= $_POST['coursecode'];
		$section= $_POST['section'];
		$sq1l14="select * from sessions where status='Active'";
		$sesssion1=$conn->query($sq1l14);
		$session=$sesssion1->fetch_assoc();
		
		$sq1l="select * from courses_section where coursecode='$coursecode' And coursename='$coursename' and coursesection='$section'";
		$result1=$conn->query($sq1l);
		if(mysqli_num_rows($result1)>0)
		{
		echo "<script>alert('Record Already Found!')</script>";
		echo "<script>window.location = 'courses.php'</script>";
		}
		else
		{
		
		mysqli_query($conn, "INSERT INTO courses_section VALUES('', '$coursecode','$coursename','$section','".$session['session']."','".$row['ccode']."')") or die(mysqli_error($conn));
		
		echo "<script>window.location = 'courses.php'</script>";
		}
	}
	 
?>