<?php
	include 'connectuser.php';

	$get_user_id = $_GET['userId'];
	// getting user's data
	$user_query = 'SELECT * FROM user WHERE user_id='.$get_user_id;
	$user_result = mysqli_query($conn, $user_query);
	$user_array = mysqli_fetch_array($user_result);
?>

<html>
	<head>
		<title><?php echo ucfirst($user_array['first_name']);?>'s Profile</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
		<link rel="stylesheet" href="question_display.css">
	</head>

	<body>
		<header>
			<div class="container">
				<!-- heading -->
				<div class="row">
					<div class="col-md-2">
						<img src="welcome.jpg" title="welcome" class="img-responsive" style="margin-top: 2em;">
					</div>
					<div class="col-md-7">
						<h2 style="color:#41f450;">
							<?php 
								echo ucfirst($user_array['first_name'])." ".ucfirst($user_array['last_name']);
							?>
						</h2>
						<blockquote><p style="font-size: 17px;"><strong style="font-size: 1.2em;">This is User's description:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur dolore dolorum, nihil molestias qui, in cum ipsum quis, doloremque delectus id eius dolorem libero magni! Aliquid quis consequuntur provident officia. </p></blockquote>
					</div>
				</div> <!--end row-->
				<hr>
			</div> <!--end container-->
		</header>
		
		<!-- questions asked by the user -->
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				
				<!-- displaying the question asked by the user -->
				<div class="col-md-7">
					<?php
						$question_dis_query = "SELECT question,question_heading AS q_heading FROM question WHERE user_id=".$get_user_id;
						$question_dis_result = mysqli_query($conn, $question_dis_query);
							
							while($question_dis_array = mysqli_fetch_array($question_dis_result)) {
						?>
						<div id="card">
							<!-- question heading -->
							<h2 style="color: #f4b042;"><?php echo $question_dis_array['q_heading'];?></h2>
							<!-- question content -->
							<blockquote>
								<p><?php echo $question_dis_array['question']; ?></p>
							</blockquote>
						</div>
						<hr>

						<?php
						}
						?>
				</div>
			</div>
		</div>

	</body>
</html>