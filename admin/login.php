<?php session_start();
?>
<div class="col-md-4"></div>
<div class="col-md-3">
	<br>
	<br>
	<div class="panel panel-primary" id="panel-margin">
		<div class="panel-heading">
			<center><h1 class="panel-title">Employee Login</h1></center>
		</div>
		<div class="panel-body">
			<form method="POST">
				<div class="form-group">
					<label for="username">Username</label>
					<input class="form-control" name="username" placeholder="Username" type="text" required="required" >
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input class="form-control" name="password" placeholder="Password" type="password" required="required" >
				</div>
				<div class="form-group">
								<label>Designation</label>
								<select name="desig" class="form-control" required="required">
									<option value="">Please Choose</option>
									<option value="Administration">Administration</option>
									<option value="Dean">Dean</option>
									<option value="ChairPerson">Chair Person </option>
									<option value="Coordinator">Coordinator </option>
								</select>
							</div>
				<?php include 'login_query.php'?>
				<div class="form-group">
					<button class="btn btn-block btn-primary"  name="login"><span class="glyphicon glyphicon-log-in"></span> Login</button>
				</div>
			</form>
		</div>
	</div>
</div>	