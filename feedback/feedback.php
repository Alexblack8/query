<?php
session_start();
include '../connectuser.php';
?>
<!-- HTML PART OF THE PAGE -->
<!DOCTYPE html>
<!-- only for Vishal Maurya - always refer to the photo saved in the pictures for form-controls -->
<html lang="en">
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
	   <link rel="stylesheet" href="../question_display.css">
	    <script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	    <script src="like_unlike.js" type="text/javascript"></script>
	    <script src="like_unlike_reply.js" type="text/javascript"></script>
	    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
	    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">

		

	    <meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<title>Feedback</title>
	<style>
		html {
				margin-left: 0;
				margin-top: 70px;
			}
	</style>

	<script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
</head>
<body>

	<!-- nav-bar -->
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
						<li><a href="../questions.php" style="font-size: 20px;" >Questions</a></li>
						<li><a href="../feedbacks.php" style="font-size: 20px;"  >Feedback</a></li>
					</ul>
					
					<a href="../ask_question.php" class="btn btn-warning btn-md navbar-btn">Ask a Question</a>
					<a href="feedback.php" class="btn btn-warning btn-md navbar-btn">Post a Feedback</a>

					<ul class="nav navbar-nav navbar-right">
						<?php
						session_start();
						$my_id=$_SESSION['user_id'];
						?>
                <a href="../user_profile.php?userId=<?php echo $my_id;?>" class="btn navbar-btn"><span class="glyphicon glyphicon-user"></span></a>          
                	</ul>	

					<form action="logout.php" class="navbar-form navbar-right" role="search">
						<div class="form-group">
						<button type="submit" class="btn btn-info btn-md"><strong><span class="glyphicon glyphicon-log-out"></span> Log Out</strong>
						</button>
					</form>
				</div>
			</div>	
		</nav>
	<!-- end-nav-bar -->

	<!-- heading of the file -->
	<header>
		<div class="jumbotron">
			<div class="container">
				<h1>Feedback form</h1>
			</div>
		</div>
	</header>

	<!-- the feedback input -->
	<div class="container">
		<form method="post" action="feedback.php" id="feedback_form">
			<div class="form-group">

				<!-- input area -->
				<label for="feedback_input">Enter Your Valuable Feedback here:</label>
				<textarea name="feedback" id="feedback_input" rows="16" placeholder="Enter your feedback here...." class="form-control"></textarea>
			</div>

			<script>
	            CKEDITOR.replace( 'feedback' );
	        </script>

			<!-- category selector -->
			<div class="form-group">
				<select class="selectpicker" data-style="btn-danger" name="category" multiple data-max-options="1" data-live-search="true">
					<option value="mess">Mess</option>
					<option value="transport">Transport</option>
					<option value="academics">Academics</option>
					<option value="sports">Sports</option>
					<option value="medical">Medical</option>
					<option value="other">Others</option>
				</select>
			</div>

			<!-- post button -->
			<div id="post_button" class="form-group">
				<button type="submit" class="btn btn-info">Post Feedback</button>
			</div>
		</form>
	</div>

	<!-- Modal starting -->
		<div class="demo-area">
			<div class="container">
				<div class="modal fade" id="modal-1" tabindex="-1" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">FEEDBACK MISSING!</h4>
							</div>

							<div class="modal-body">
								Enter the feedback...Please...
							</div>

							<div class="modal-footer">
								<a href="#" class="btn btn-warning" data-dismiss="modal">Close</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- end demo-area -->


		<!-- Modal starting -->
		<div class="demo-area">
			<div class="container">
				<div class="modal fade" id="modal-2" tabindex="-1" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">CATEGORY MISSING!</h4>
							</div>

							<div class="modal-body">
								Enter the category..Please...
							</div>

							<div class="modal-footer">
								<a href="#" class="btn btn-warning" data-dismiss="modal">Close</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- end demo-area -->

		<!-- Form submitted Modal -->
		<div class="demo-area">
			<div class="container">
				<div class="modal fade" id="modal-3" tabindex="-1" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">FEEDBACK RECORDED</h4>
							</div>

							<div class="modal-body">
								Your Feedback Has been recorded.
							</div>

							<div class="modal-footer">
								<a href="#" class="btn btn-warning" data-dismiss="modal">Close</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- end demo-area -->



	  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src = "https://code.jquery.com/jquery.js"></script>
      
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src = "js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
	
	<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    	$get_category = $_POST['category'];
		$get_feedback = $_POST['feedback'];
		$my_id=$_SESSION['user_id'];
		if ($get_feedback == NULL) {
	    	echo "<script>
	         $(window).load(function(){
	             $('#modal-1').modal('show');
	         });
	    	</script>";
    	}
	    else if ($get_category == NULL) {
	    	echo "<script>
	         $(window).load(function(){
	             $('#modal-2').modal('show');
	         });
	    	</script>";
    	
	    }
	    else {
	    
	    	if(!$conn) die("database missing");
            $query3="SELECT FLOOR(10000 + RAND() * 89999) AS random_number
FROM feedback
WHERE 'random_number' NOT IN (SELECT user_id FROM feedback)
LIMIT 1";
  $result=mysqli_query($conn,$query3);
  $row=mysqli_fetch_array($result);
  $feedback_id=$row['random_number'];
			$query = "INSERT INTO feedback (feedback_id,user_id,feedback,tags) VALUES ('$feedback_id','$my_id','$get_feedback','$get_category')";
			header("Location:http://localhost/webproject/sign-up-login-form/homepage.php");
			if(!mysqli_query($conn,$query))
			{
               echo "error<br/>";
			}
              else
              {


			echo "<script>
	         $(window).load(function(){
	             $('#modal-3').modal('show');
	         });
	    	</script>";
    	   	
    	    	
    	    
    	   	}
    	}
	}
?>
  </body>
</html>