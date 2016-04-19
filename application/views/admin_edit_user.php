<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Login and Registration with CodeIgniter">
	<title>Add a New User</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<style>
		body{
			padding-top: 100px;
		}
		.container{
			width: 90%;
		}
		#password_btn , #update_btn{
			float: right;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="container">
		<nav class="navbar navbar-default navbar-fixed-top">
  			<div class="container-fluid">
  				<div class="navbar-header">
  					<a class="navbar-brand" href="/">TestApp</a>
  				</div><!-- end of navbar header -->
  				<div class="collapse navbar-collapse" id="navbar_collapse">
  					<ul class="nav navbar-nav">
  						<li><a href="/Dashboards/admin">Dashboard</a></li>
  					</ul>
  				<ul class="nav navbar-nav navbar-right">
  					<li><a href="/Dashboards/sign_in">Log Off</a></li>
  				</ul>
  				</div>
			</div>
		</nav>
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Edit User # <?= $this->uri->segment(3) ?></h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="/Users/edit" method="post">
						<input type="hidden" name="admin_edit_user_info" value="<?= $user['id'] ?>">
							<div class="form-group">
								<label for="first_name" class="col-sm-2 control-label">First Name</label>
								<div class="col-sm-10">
									<input type="text" id="first_name" name="first_name" class="form-control" value="<?= $user['first_name'] ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="last_name" class="col-sm-2 control-label">Last Name</label>
								<div class="col-sm-10">
									<input type="text" id="last_name" name="last_name" class="form-control" value="<?= $user['last_name'] ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="col-sm-2 control-label">E-Mail</label>
								<div class="col-sm-10">
									<input type="email" id="email" name="email" class="form-control" value="<?= $user['email'] ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="user_level" class="col-sm-2 control-label">User Level</label>
								<div class="col-sm-5">
								<?php
									if($user['user_level'] === 'admin')
									{
										echo "<select name ='user_level' id='user_level' class='form-control'>\n";
										echo "<option selected='selected'>admin</option>\n";
										echo "<option>user</option>\n";
										echo "</select>\n";
									}
									else
									{
										echo "<select name ='user_level' id='user_level' class='form-control'>\n";
										echo "<option>admin</option>\n";
										echo "<option selected='selected'>user</option>\n";
										echo "</select>\n";
									}
								?>
								</div>
							</div>
							<button id="update_btn" type="submit" class="btn btn-primary">Update User</button>
						<div style="clear: both;"></div>
						</form>
					</div>
				</div><!--end of panel -->
			</div><!-- end of col-md-6 -->
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Change Password</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="Users/edit" method="post">
						<input type="hidden" name="admin_edit_user_password" value="<?= $user['id'] ?>">
						<div class="form-group">
							<label for="password" class="col-sm-2 control-label">Password</label>
							<div class="col-sm-10">
								<input type="password" id="password" name="password" class="form-control" placeholder="Password">
							</div>
						</div>
						<div class="form-group">
							<label for="pass_confirm" class="col-sm-2 control-label">Confirm Password</label>
							<div class="col-sm-10">
								<input type="password" id="pass_confirm" name="pass_confirm" class="form-control" placeholder="Re-Type Your Password">
								<?php
									if($this->session->flashdata('error'))
									{
										echo $this->session->flashdata('error');
									}
								?>
							</div>
						</div>
						<button id="password_btn" type="submit" class="btn btn-primary">Update Password</button>
						<div style="clear: both;"></div>
					</form>
					</div><!-- end of panel-body -->
				</div><!-- end of panel -->
			</div><!-- end of col-md-6 -->
		</div><!-- end of row -->
	</div><!-- end of container -->
</body>
</html>