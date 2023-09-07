<?php session_start();
?>
<!DOCTYPE html>
<?php 
	require 'validator.php';
	require_once 'conn.php';
   $queryss=mysqli_query($conn, "select * from cods") or die(mysqli_error());
    $counttcods=mysqli_num_rows($queryss);
    $queryss1=mysqli_query($conn, "select * from deans") or die(mysqli_error());
    $counttdeans=mysqli_num_rows($queryss1);
    $queryss2=mysqli_query($conn, "select * from  coordiantor") or die(mysqli_error());
    $counttcor=mysqli_num_rows($queryss2);
    $queryss3=mysqli_query($conn, "select * from departments") or die(mysqli_error());
    $counttdep=mysqli_num_rows($queryss3);
?>
<html lang = "en">
<head>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
	<style type="text/css">
		
.circle-tile {
    margin-bottom: 15px;
    text-align: center;
}
.circle-tile-heading {
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-radius: 100%;
    color: #FFFFFF;
    height: 80px;
    margin: 0 auto -40px;
    position: relative;
    transition: all 0.3s ease-in-out 0s;
    width: 80px;
}
.circle-tile-heading .fa {
    line-height: 80px;
}
.circle-tile-content {
    padding-top: 50px;
}
.circle-tile-number {
    font-size: 26px;
    font-weight: 700;
    line-height: 1;
    padding: 5px 0 15px;
}
.circle-tile-description {
    text-transform: uppercase;
}
.circle-tile-footer {
    background-color: rgba(0, 0, 0, 0.1);
    color: rgba(255, 255, 255, 0.5);
    display: block;
    padding: 5px;
    transition: all 0.3s ease-in-out 0s;
}
.circle-tile-footer:hover {
    background-color: rgba(0, 0, 0, 0.2);
    color: rgba(255, 255, 255, 0.5);
    text-decoration: none;
}
.circle-tile-heading.dark-blue:hover {
    background-color: #2E4154;
}
.circle-tile-heading.green:hover {
    background-color: #138F77;
}
.circle-tile-heading.orange:hover {
    background-color: #DA8C10;
}
.circle-tile-heading.blue:hover {
    background-color: #2473A6;
}
.circle-tile-heading.red:hover {
    background-color: #CF4435;
}
.circle-tile-heading.purple:hover {
    background-color: #7F3D9B;
}
.tile-img {
    text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.9);
}

.dark-blue {
    background-color: #34495E;
}
.green {
    background-color: #16A085;
}
.blue {
    background-color: #2980B9;
}
.orange {
    background-color: #F39C12;
}
.red {
    background-color: #E74C3C;
}
.purple {
    background-color: #8E44AD;
}
.dark-gray {
    background-color: #7F8C8D;
}
.gray {
    background-color: #95A5A6;
}
.light-gray {
    background-color: #BDC3C7;
}
.yellow {
    background-color: #F1C40F;
}
.text-dark-blue {
    color: #34495E;
}
.text-green {
    color: #16A085;
}
.text-blue {
    color: #2980B9;
}
.text-orange {
    color: #F39C12;
}
.text-red {
    color: #E74C3C;
}
.text-purple {
    color: #8E44AD;
}
.text-faded {
    color: rgba(255, 255, 255, 0.7);
}
</style>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
<body>
<?php include 'sidebar.php'?>
	<div>
		<br /><br /><br />
		<div class="row">
		 

 
<div class="col-lg-3 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading btn-warning"><i class=" fas fa-school fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content btn-warning">
          <div class="circle-tile-description text-faded"><b>Departments</b></div>
          <div class="circle-tile-number text-faded "><?php echo $counttdep;?></div>
          <a class="circle-tile-footer" href="department.php">More Info<i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6">
      <div class="circle-tile">
        <a href="#"><div class="circle-tile-heading blue"><i class="fas fa-book-reader fa-fw fa-4x"></i></div></a>
        <div class="circle-tile-content blue">
          <div class="circle-tile-description text-faded"><b>Coordinators</b></div>
          <div class="circle-tile-number text-faded "><?php echo $counttcor;?></div>
          <a class="circle-tile-footer" href="Coordinator.php">More Info<i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading btn-success"><i class="fas fa-street-view fa-fw fa-4x"></i></div></a>
        <div class="circle-tile-content btn-success">
          <div class="circle-tile-description text-faded"><b>Deans</b></div>
          <div class="circle-tile-number text-faded "><?php echo $counttdeans;?></div>
          <a class="circle-tile-footer" href="deans.php">More Info<i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div>
     <div class="col-lg-3 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading btn-danger"><i class="fas fa-child fa-fw fa-4x"></i></div></a>
        <div class="circle-tile-content btn-danger">
          <div class="circle-tile-description text-faded"><b>Chair Persons</b></div>
          <div class="circle-tile-number text-faded "><?php echo $counttcods;?></div>
          <a class="circle-tile-footer" href="cods.php">More Info<i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div>
</div>

	<?php include 'footer.php'?>	 
	
</body>
</html>