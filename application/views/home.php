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
		.col-md-4 p{
			font-size: 1.4em;
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
  						<li class="active"><a href="/">Home</a></li>
  					</ul>
  				<ul class="nav navbar-nav navbar-right">
  					<li><a href="/Dashboards/sign_in">Sign In</a></li>
  				</ul>
  				</div>
			</div>
		</nav>
		<div class="jumbotron">
			<h1>Welcome to the Test</h1>
			<p>We're going to build a cool application using a MVC framework!  This application was build with the Village88 folks!</p>
			<form action="/Dashboards/sign_in">
				<button type="submit" class="btn btn-primary btn-lg">Start</button>
			</form>
		</div><!-- end of jumbotron -->
		<div class="row">
			<div class="col-md-4">
				<h2>Manage Users</h2>
				<p>Using this application, you'll learn how to add, remove, and edit users for the application.</p>
			</div>
			<div class="col-md-4">
				<h2>Leave Messages</h2>
				<p>Users will be able to leave a message to another user using this application.</p>
			</div>
			<div class="col-md-4">
				<h2>Edit User Information</h2>
				<p>Admins will be able to edit another user's information (email address, first name, last name, etc...).</p>
			</div>
		</div><!-- end of row -->
	</div>
</body>
</html>