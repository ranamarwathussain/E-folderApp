<?php session_start();
?>
<?php
require_once 'validator.php';
require_once 'conn.php';
$fourRandomDigit = rand(1000,9999);
     
	
	if(ISSET($_POST['save'])){

		$stud_no = $_POST['fcode'];
		$pattern=$_POST['pattern'];
		$coursename=$_POST['coursename'];
		$courssection=$_POST['coursesection'];
		$file_name = $_FILES['file']['name'];
		$file_type = $_FILES['file']['type'];
		$file_temp = $_FILES['file']['tmp_name'];

		if('application/pdf'==$_FILES['file']['type'])
		{
				$file_name=$fourRandomDigit.$file_name;
				$location = "files/".$stud_no."/".$file_name;
				$date = date("Y-m-d, h:i A", strtotime("+8 HOURS"));
				if(!file_exists("files/".$stud_no)){
					mkdir("files/".$stud_no);
				}
				 
				if(move_uploaded_file($file_temp, $location)){
					mysqli_query($conn, "INSERT INTO `storage` VALUES('', '$file_name', '$file_type', '$date', '$stud_no','$pattern','$coursename','$courssection')") or die(mysqli_error());
						echo '<script>alert("File Upoloaded");</script>';
				 
			$coursenam = $coursename;
            $section = $courssection;
            $url = "faculty_profile.php?coursename=" . urlencode($coursenam) . "&section=" . urlencode($section );
                ?>
            <script>
                window.location.href = "<?php echo $url; ?>";
            </script>
        <?php
		 
				
					
				}
		}else
		{
			echo '<script>alert("Only PDF Allowed!!");
			window.location.href="faculty_profile.php";</script>';
		}

	}
?>