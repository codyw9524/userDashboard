<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Login and Registration with CodeIgniter">
	<title>Admin Dashboard</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<style>
		body{
			padding-top: 100px;
		}
		.header h2, form{
			display: inline-block;
		}
		.header form{
			float: right;
			margin-top: 20px;
		}
		.container{
			width: 90%;
		}
		table{
			margin-top: 15px;
		}
		.header h1{
			margin-top: 0;
		}
		.button_link{
			padding-top: 3px;
			padding-left: 2px;
			font-size: 14px;
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
  						<li class="active"><a href="/Dashboards/admin">Dashboard</a></li>
  						<li><a href="">Profile</a>
  					</ul>
  				<ul class="nav navbar-nav navbar-right">
  					<li><a href="/Dashboards/log_off">Log Off</a></li>
  				</ul>
  				</div>
			</div>
		</nav>
		<div class="row">
			<div class="col-md-12 header">
				<h1 class="text-center">Admin Dashboard</h1>
				<h2>Manage Users</h2>
				<form action="/Dashboards/admin" method="post">
				<input type="hidden" name="action" value="add_user">
					<button type="submit" class="btn btn-primary">Add New User</button>
				</form>
			</div>
		</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Created At</th>
					<th>User Level</th>
					<th>Actions</th>
				</tr>
			</thead>
		<?php 

			if(isset($users))
			{
				echo "<tbody>\n";
				foreach ($users as $user) 
				{
					echo "<tr>\n";
					echo "<td>" . $user['id'] . "</td>\n";
					echo "<td>" . $user['first_name'] . ' ' . $user['last_name'] . "</td>\n";
					echo "<td>" . $user['email'] . "</td>\n";
					echo "<td>" . $user['created_at'] . "</td>\n";
					echo "<td>" . $user['user_level'] . "</td>\n";
					echo "<td><a href='/Users/edit/" . $user['id'] . "'>Edit&nbsp;</a>|";
					echo "<button type='button' class='btn btn-link btn-sm button_link' data-toggle='modal' data-target='#myModal" . $user['id'] . "'>Remove</button></td>\n";
					echo "</tr>\n";
				
					echo '<div class="modal fade" id="myModal' . $user['id'] . '" tabindex="-1" role="dialog">';
					echo '<div class="modal-dialog">';
					echo '<div class="modal-content">';
					echo '<div class="modal-header">';
					echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
					echo '<h4 class="modal-title">WARNING!</h4>';				
					echo '</div>';
					echo '<div class="modal-body">';
					echo '<p>Are you sure you want to delete this user?</p>';
					echo '</div>';
					echo '<div class="modal-footer">';
					echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
					echo '<form action="/Users/destroy/' . $user['id'] . '" method="post">';
					echo '<button type="submit" class="btn btn-danger">Yes, I am Sure</button>';
					echo '</form>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
				}
					echo "</tbody>\n";
					echo '</table>';
			}
		?>
	</div><!-- end of container -->
</body>
</html>