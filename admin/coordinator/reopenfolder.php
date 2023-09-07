<?php session_start();
?>
<?php
	require_once 'conn.php';

	
	if(ISSET($_GET['fcode'])){
		$fcode = $_GET['fcode'];
		$coursename = $_GET['coursename'];
        $section = $_GET['coursesection'];
		
		
		mysqli_query($conn, "update `courses_assign` set  folderstatus='0' where fcode='$fcode' And coursesection='$section' And courseName='$coursename' ") or die(mysqli_error($conn));
		
	echo "<script>alert('Successfully re-Opended!')</script>";
		echo "<script>window.location = 'faculty_getfile.php?fcode=" . $fcode . "'</script>";

	}
?>