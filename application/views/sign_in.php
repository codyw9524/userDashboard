<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Login and Registration with CodeIgniter">
	<title>Home Page</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<style>
		body{
			padding: 100px;
		}
		form{
			width: 50%;
			margin-bottom: 15px;
			margin-top: 15px;
		}
		.jumbotron{
			padding-top: 10px;
		}
	</style>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-default navbar-fixed-top">
  			<div class="container-fluid">
  				<div class="navbar-header">
  					<a class="navbar-brand" href="">TestApp</a>
  				</div><!-- end of navbar header -->
  				<div class="collapse navbar-collapse" id="navbar_collapse">
  					<ul class="nav navbar-nav">
  						<li><a href="/">Home</a></li>
  					</ul>
  				<ul class="nav navbar-nav navbar-right">
  					<li class="active"><a href="/Dashboards/sign_in">Sign In</a></li>
  				</ul>
  				</div>
			</div>
		</nav>
		<div class="jumbotron">
			<h3>Log In</h3>
			<form action="/Dashboards/validate_user" method="post">
				<div class="form-group">
					<?php 
						if($this->session->flashdata('registration_confirmed'))
						{
							echo $this->session->flashdata('registration_confirmed');
						}
					?>
					<label for="email">E-Mail</label>
					<input type="email" id="email" name="email" placeholder="E-Mail" class="form-control">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" id="password" name="password" placeholder="Password" class="form-control">
					<?php 
						if($this->session->flashdata('error'))
						{
							echo $this->session->flashdata('error');
						}
					?>
				</div>
				<button type="submit" class="btn btn-primary">Log In</button>
			</form>
			<a href="/Dashboards/register">Don't have an account?  Click here to register!</a>
		</div>
	</div><!-- end of container -->
</body>
</html>