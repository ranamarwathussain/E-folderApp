<?php 
	  require 'conn.php';
	
	if(ISSET($_POST['login'])){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$designation=$_POST['desig'];
		$coded=0;
		if($designation=='Coordinator')
		{
		////////////////////////////////////coordinator///////////////
		$query = mysqli_query($conn, "SELECT * FROM `coordiantor` WHERE `ccode` = '$username' && `pass` = '$password'") or die(mysqli_error());
		$fetch = mysqli_fetch_array($query);
		$row = $query->num_rows;
		if($row > 0){
			$_SESSION['user'] = $fetch['ccode'];
			$_SESSION['name'] =$fetch['FirstName'].'-'.$fetch['LastName'];
			$coded=1;
			
			  echo "<script>window.location = 'coordinator/home.php'</script>";
		}else{
			echo "<center><label class='text-danger'>Invalid username or password</label></center>";
		}
		}
	////////////////////////////////////coordinator///////////////

if($designation=='Administration')
		{
		    	$password = md5($_POST['password']);

////////////////////////////////////users///////////////
		$query1= mysqli_query($conn, "SELECT * FROM `user` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error());
		$fetch1 = mysqli_fetch_array($query1);
		$row1= $query1->num_rows;
		if($row1 > 0){
			$_SESSION['user'] = $fetch1['user_id'];
			$_SESSION['status'] = $fetch1['status'];
			$coded=1;
			  echo "<script>window.location = 'home.php'</script>";
		
		}else{
			echo "<center><label class='text-danger'>Invalid username or password</label></center>";
		}
	}
		////////////////////////////////////users///////////////

	////////////////////////////////////Cods///////////////
	if($designation=='ChairPerson')
		{

		$query123= mysqli_query($conn, "SELECT * FROM `cods` WHERE `cocode` = '$username' && `pass` = '$password'") or die(mysqli_error());
	    $fetch123 = mysqli_fetch_array($query123);
	     $row123= $query123->num_rows;

		if($row123> 0){
			$_SESSION['user'] = $fetch123['cocode'];
			$_SESSION['name'] =$fetch123['FirstName'].'-'.$fetch123['LastName'];
			$coded=1;
			
			  echo "<script>window.location = 'cods/home.php'</script>";
		
		}else{
			echo "<center><label class='text-danger'>Invalid username or password</label></center>";
		}
	 }
			////////////////////////////////////Cods///////////////
			////////////////////////////////////Deans///////////////
	 if($designation=='Dean')
		{
		$query1234= mysqli_query($conn, "SELECT * FROM `deans` WHERE `dcode` = '$username' && `pass` = '$password'") or die(mysqli_error());
		$fetch1234 = mysqli_fetch_array($query1234);
		$row1234= $query1234->num_rows;
		if($row1234> 0){
			$_SESSION['user'] =$fetch1234['dcode'];
			$_SESSION['name'] =$fetch1234['FirstName'].'-'.$fetch1234['LastName'];
			$coded=1;
			
			 echo "<script>window.location = 'deans/home.php'</script>";

		}else{
			echo "<center><label class='text-danger'>Invalid username or password</label></center>";
		}
		}
		////////////////////////////////////Deans///////////////

	
	}
?>