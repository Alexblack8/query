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
		<style>
			h1 {
				border-bottom: 5px solid #8c1919;
			}
		</style>
	</head>

	<body>
		<header>
			<div class="container">
				<!-- user's description -->
				<div class="row">
					<div class="col-md-2">
						<img src="welcome.jpg" title="welcome" class="img-responsive" style="margin-top: 2em;">
					</div>
					<div class="col-md-7">
						<h2 style="color:#8c1919; font-weight:900; ">
							<?php 
								echo ucfirst($user_array['first_name'])." ".ucfirst($user_array['last_name']);
							?>
						</h2>
						<blockquote><p style="font-size: 17px;"><strong style="font-size: 1.2em;">
						<?php echo ucfirst(($user_array['description']));?> </p></blockquote>
					</div>
				</div> <!--end row-->
				<hr style="height:1px;border:none;color:#333;background-color:#acadaf;">
			</div> <!--end container-->
		</header>
		
		<!-- questions asked by the user -->
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				
				<!-- displaying the question asked by the user -->
				<div class="col-md-7">
					<h1 style="color: #8c1919;"><strong>QUESTIONS ASKED</strong></h1>

					<?php
						$question_dis_query = "SELECT question,question_heading AS q_heading FROM question WHERE user_id=".$get_user_id;
						$question_dis_result = mysqli_query($conn, $question_dis_query);
							
							while($question_dis_array = mysqli_fetch_array($question_dis_result)) {
						?>
						<div id="card">
							<!-- question heading -->
							<h2 style="color: #f4b042;"><strong><?php echo $question_dis_array['q_heading'];?></strong></h2>
							<!-- question content -->
							<blockquote>
								<p><?php echo $question_dis_array['question']; ?></p>
							</blockquote>
						</div>
						<hr style="height:2px;border:none;color:#333;background-color:#eee;">

						<?php
						}
						?>
						
						<h1 style="color: #8c1919;"><strong>ANSWERS GIVEN</strong></h1>
						<?php
						//showing replies
						$reply_query = "SELECT reply,quest_id AS qID FROM replies WHERE user_id=".$get_user_id;
						$reply_result = mysqli_query($conn,$reply_query);

						while($reply_array = mysqli_fetch_array($reply_result)) {

							$retrieve_q_heading = "SELECT question_heading AS q_heading FROM question WHERE question_id=".$reply_array['qID'];
							$retrieve_q_heading_result = mysqli_query($conn,$retrieve_q_heading);
							$retrieve_q_heading_array = mysqli_fetch_array($retrieve_q_heading_result);
						?>
							<div id="card">
								<!-- reply heading -->
								<h2 style="color: #d3970c;"><strong><?php echo $retrieve_q_heading_array['q_heading']; ?></strong></h2>
								<!-- reply content -->
								<blockquote>
									<p><?php echo $reply_array['reply']; ?></p>
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