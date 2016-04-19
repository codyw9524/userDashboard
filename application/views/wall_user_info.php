<?php
$phpdate = strtotime($user['created_at']);
$newdate = date("F jS, Y", $phpdate);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Login and Registration with CodeIgniter">
	<title>User Wall</title>
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
		#msg_btn, #comment_btn{
			float: right;
			margin-top: 10px;
		}
		textarea{
			max-width: 100%;
			max-height: 114px;
		}
		.messages{
			margin-left: 5%;
		}
		.comment{
			margin-left: 5%;
		}
		h5, h6{
			display:inline-block;
		}
		.time{
			float: right;
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
  						<li class="active"><a href="/Dashboards/user">Dashboard</a></li>
  						<li><a href="/Users/edit">Profile</a></li>
  					</ul>
  				<ul class="nav navbar-nav navbar-right">
  					<li><a href="/Dashboards/log_off">Log Off</a></li>
  				</ul>
  				</div>
			</div>
		</nav>
		<div class="row">
			<div class="col-md-3 col-md-offset-1">
				<h1><?= $user['first_name'] . ' ' . $user['last_name'] ?></h1>
				<table class="table"> 
					<tr>
						<td>Registered at:</td>
						<td><?= $newdate?></td>
					</tr>
					<tr>
						<td>User ID:</td>
						<td>#&nbsp;<?= $user{'id'} ?></td>
					</tr>
					<tr>
						<td>Email Address:</td>
						<td><?= $user['email'] ?></td>
					</tr>
					<tr>
						<td>Description:</td>
						<td><?= $user['description'] ?></td>
					</tr>
				</table>
			</div>
		</div><!-- end of row -->
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h2>Leave a message for <?= $user['first_name'] ?></h2>
				<form action="/Messages/create" method="post">
				<input type="hidden" name="wall_id" value="<?= $user['id'] ?>">
					<div class="form-group">
						<textarea class="form-control" name="message" rows="5"></textarea>
						<button id="msg_btn" type="submit" class="btn btn-primary">Post Message</button>
						<div style="clear: both;"></div>
					</div>
				</form>
			</div>
		</div><!-- end of row -->