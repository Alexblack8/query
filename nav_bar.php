<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand">QUERY!!</a>
				</div>

				<div class="collapse navbar-collapse" id="nav-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
						<li><a href="#"><span class="glyphicon glyphicon-comment"></span></a></li>
						<li><a href="#">Questions</a></li>
						<li><a href="#">Feedback</a></li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php session_start(); echo "user_profile.php?userId=".$_SESSION['user_id']; ?>">View Profile</a></li>
                  <li><a href="ask_question.php">Ask A Question</a></li>              
                </ul>
              </li>						
					</ul>	

					<form action="" class="navbar-form navbar-right" role="search">
						<div class="form-group">
						<button type="button" class="btn btn-info">Log Out</button>
					</form>
				</div>
			</div>	
		</nav>

		<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>