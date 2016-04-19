<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Login and Registration with CodeIgniter">
	<title>Register User</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<style>
		body{
			padding: 100px;
		}
		form{
			width: 70%;
		}
		#register_btn{
			float: right;
		}
		.form-group p{
			color: red;
		}
	</style>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-default navbar-fixed-top">
  			<div class="container-fluid">
  				<div class="navbar-header">
  					<a class="navbar-brand" href="/">TestApp</a>
  				</div><!-- end of navbar header -->
  				<div class="collapse navbar-collapse" id="navbar_collapse">
  					<ul class="nav navbar-nav">
  						<li><a href="/">Home</a></li>
  					</ul>
  				<ul class="nav navbar-nav navbar-right">
  					<li><a href="/Dashboards/sign_in">Sign In</a></li>
  				</ul>
  				</div>
			</div>
		</nav>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Register User</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="/Dashboards/register_user" method="post">
					<div class="form-group">
						<label for="first_name" class="col-sm-2 control-label">First Name</label>
						<div class="col-sm-10">
							<input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name">
							<?= form_error('first_name') ?>
						</div>
					</div>
					<div class="form-group">
						<label for="last_name" class="col-sm-2 control-label">Last Name</label>
						<div class="col-sm-10">
							<input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name">
							<?= form_error('last_name') ?>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">E-Mail</label>
						<div class="col-sm-10">
							<input type="email" id="email" name="email" class="form-control" placeholder="E-Mail">
							<?= form_error('email') ?>
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<input type="password" id="password" name="password" class="form-control" placeholder="Password">
							<?= form_error('password') ?>
						</div>
					</div>
					<div class="form-group">
						<label for="pass_confirm" class="col-sm-2 control-label">Confirm Password</label>
						<div class="col-sm-10">
							<input type="password" id="pass_confirm" name="pass_confirm" class="form-control" placeholder="Re-Type Your Password">
							<?= form_error('pass_confirm') ?>
						</div>
					</div>
					<button id="register_btn" style="submit" class="btn btn-default">Register</button>
					<div style="clear: both;"></div>
				</form>
				<a href="/Dashboards/sign_in">Already have an account?  Click here to log in!</a>
			</div>
		</div>
	</div><!-- end of container -->
</body>
</html>