<?php session_start();
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>E-Folder Application</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type="text/css" href="admin/css/bootstrap.css" />
		<link rel = "stylesheet" type="text/css" href="admin/css/style.css" />
	</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" style="background-color:black;">
		<div class="container-fluid">
			<label class="navbar-brand" id="title" style="color: white;">E-Folder Application</label>
<p align="right">
  <button class="btn btn-danger" onclick="window.location.href = 'admin/';">CODs/Deans/Coordinators/Admin Login</button>
</p>
		</div>
	</nav>
	<?php include 'login.php'?>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright UMT CS @SST <?php echo date("Y", strtotime("+8 HOURS"))?></label>
	</div>
	<script src="https://cdn.websitepolicies.io/lib/cconsent/cconsent.min.js" defer></script><script>window.addEventListener("load",function(){window.wpcb.init({"border":"thin","corners":"small","colors":{"popup":{"background":"#fff0ca","text":"#000000","border":"#e0bc57"},"button":{"background":"#e0bc57","text":"#ffffff"}},"position":"bottom","content":{"href":"https://support.google.com/adsense/answer/11546682?hl=en","message":"Website will track your cookie information please give consent ","button":"Ok ","link":"Learn more "}})});</script>
</body>
</html>