<?php
?>
<?php 
 
  require_once 'conn.php'
?>
<?php 
				$query = mysqli_query($conn, "SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user]'") or die(mysqli_error());
				$fetch = mysqli_fetch_array($query);
			?>
<head>
    <title>E-FolderApp</title>
    <meta charset = "utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
     
    <link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
    <link rel = "stylesheet" type = "text/css" href = "css/style.css" />

 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
   
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
   
<style>
.btn1{
   margin-right: 10px;
}
/*Give a left margin of 10px*/
.btn2{
   margin-left: 10px;
}
 
</style>
</head>
 
<nav class="navbar navbar-expand-sm  navbar-dark bg-dark">
  <div class="container-fluid">
   <button type="button" class="btn btn1">  <a class="navbar-brand" href="home.php">Home</a></button>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
         <button type="button" class="btn btn-warning btn1"><a   href="faculty.php"><p style="color: white;">Faculty</p></a></button>
        </li>
        <br>
        <li class="nav-item">
          <button type="button" class="btn btn-info btn1"><a    href="session.php"><p style="color: white;">Session</p></a></button>
        </li>
        <br>
        <br>
        <li class="nav-item">
          <button type="button" class="btn btn-info btn1"><a    href="courses.php"><p style="color: white;">Courses</p></a></button>
        </li>
        <br>
         <li class="nav-item">
         <button type="button" class="btn btn-success btn2"><a   href="facultyprogress.php"><p style="color: white;">Faculty Progress</p></a></button>
        </li>
        
      </ul> 
       <div class="row">
    <div class="col-lg" style=" 
  position: absolute;
  top:30%;
  right: 40px;
  width: 50px;
  transform: translateY(-50%);
;">
      
    <li class="nav-item">
         <button type="button" class="btn btn-danger btn2"><a   href="../logout.php"><p style="color: white;">Logout</p></a></button>
        </li>
        </div>
    
      
    </div>
  </div>
</div>
</nav>

 




