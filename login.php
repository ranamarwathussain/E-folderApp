<?php session_start();
?>
 <div class="col-md-4"></div>
<div class="col-md-3">
	<br>
		<br>
	<div class="panel panel-success" id="panel-margin">

		<div class="panel-heading">
			<center><h1 class="panel-title">Faculty Login</h1></center>
		</div>
		<div class="panel-body">
			<form method="POST">
				<div class="form-group">
					<label for="username">Emp Code</label>
					<input class="form-control" name="emp_code" placeholder="Emp_Code" type="number" required="required" >
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input class="form-control" name="password" placeholder="Password" type="password" required="required" >
				</div>
				<?php include 'login_query.php'?>
				<div class="form-group">
					<button class="btn btn-block btn-primary"  name="login"><span class="glyphicon glyphicon-log-in"></span> Login</button>
				</div>
			</form>
		</div>
	</div>
</div>	