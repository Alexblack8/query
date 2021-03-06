<head>
	<link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
</head>
	<style>
		#navigation-bar {
			border-top: 3px solid #a33939;
			box-shadow: 0 1px 1px #eee;
		/*
			height: 60px;
			padding-top: 5px;
		*/}

		.navbar {
		    padding-top: 15px;
		    padding-bottom: 15px;
		    border: 0;
		    border-radius: 0;
		    margin-bottom: 0;
		    font-size: 12px;
		    letter-spacing: 3px;
		}

		@media screen and (max-width: 641px) {
			.sidenav {
				position: relative;
			}
		}

		.navbar-nav li a:hover {
		    color: #1abc9c !important;
		}

		.btn {
			border-radius: 0 !important;
		}
		#query
		{
			font-family: 'Permanent Marker', cursive;
		}
	</style>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<nav class="navbar navbar-default navbar-fixed-top" id="navigation-bar" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-it">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand" id="query" style="color:black">QUERY!!</a>
				</div>

				<div class="collapse navbar-collapse" id="collapse-it">
					<ul class="nav navbar-nav">
						<li class="active"><a href="homepage.php" ><span class="glyphicon glyphicon-home"></span></a></li>
						<li class="navbar-divider"></li>
						<li><a href="notification_homepage.php" style="font-size: 20px;">Notifications</a></li>
						<li><a href="questions.php" style="font-size: 20px;" >Questions</a></li>
						<li><a href="feedbacks.php" style="font-size: 20px;"  >Feedback</a></li>
					</ul>
					
					<a href="ask_question.php" class="btn btn-warning btn-md navbar-btn">Ask a Question</a>
					<a href="feedback/feedback.php" class="btn btn-warning btn-md navbar-btn">Post a Feedback</a>

					<ul class="nav navbar-nav navbar-right">
						<?php
						session_start();
						$my_id=$_SESSION['user_id'];
						?>
                <a href="user_profile.php?userId=<?php echo $my_id;?>" class="btn navbar-btn"><span class="glyphicon glyphicon-user"></span></a>          
                	</ul>	

					<form action="logout.php" class="navbar-form navbar-right" role="search">
						<div class="form-group">
						<button type="submit" class="btn btn-info btn-md"><strong><span class="glyphicon glyphicon-log-out"></span> Log Out</strong>
						</button>
					</form>
				</div>
			</div>	
		</nav>