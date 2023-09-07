<?php session_start();
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>E-Folder Application </title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type="text/css" href="css/bootstrap.css" />
		<link rel = "stylesheet" type="text/css" href="css/style.css" />
	</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" style="background-color:black;">
		<div class="container-fluid">
			<label class="navbar-brand" id="title" style="color: white;">E-Folder Application</label>
<p align="right">
  <button class="btn btn-danger" onclick="window.location.href = '../';">Faculty Login</button>
</p>
		</div>
	</nav>
	<?php include 'login.php'?>
	<div id = "footer">
		<?php include 'footer.php'?>
	</div>
</body>
</html>