<?php
	include 'connectuser.php';
	include 'nav_bar.php';
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
		<link rel="stylesheet" href="question_display.css">
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		<style>
			
			h1 {
				border-bottom: 5px solid #8c1919;
			}
			
			.sidenav li {
				font-family: tangerine;
				font-size: 20px;
			}

			html {
				margin-left: 0;
				margin-top: 70px;
			}

			.sidenav {
			  margin-right: 2px;
		      padding-top: 20px;
		      background-color: #f1f1f1;		 
		      height: 100%;
		    }
				
			@media screen and (max-width: 641px) {
			.sidenav {
				position: relative;
			}
		}
		</style>
	</head>

	<body>
		<header>
			<div class="container-fluid">
				<!-- user's description -->
				<div class="row content">
					<div class="col-md-3">
						<div class="col-md-3 affix sidenav">
						<h4 class="helpblock" style="font-size: 30px; font-family: tangerine;">Categories:</h4>
						<ul class="nav nav-pills nav-stacked">						
							    <li class="active"><a href="questions.php">All questions</a></li>
								<li><a href="question_option.php?tag_id=1">Mess</a></li>
								<li><a href="question_option.php?tag_id=2">Transport</a></li>
								<li><a href="question_option.php?tag_id=3">Medical</a></li>
								<li><a href="question_option.php?tag_id=4">Academics</a></li>
								<li><a href="question_option.php?tag_id=5">Sports</a></li>
								<li><a href="question_option.php?tag_id=6">Others</a></li>
						</ul>
					</div>
					</div>
					<div class="col-md-7" style="margin-left:10px;">
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
		<div class="container-fluid">
			<div class="row content">
				<div class="col-md-3">
					
				</div>

				<!-- displaying the question asked by the user -->
				<div class="col-md-7" style="margin-left: 10px;">
					<h1 style="color: #8c1919;"><strong>QUESTIONS ASKED</strong></h1>

					<?php
						$question_dis_query = "SELECT * FROM question WHERE user_id='$get_user_id' ORDER BY reg_time DESC";
						$question_dis_result = mysqli_query($conn, $question_dis_query);
						$color_var = 1;
							
							while($question_dis_array = mysqli_fetch_array($question_dis_result)) {
								if($color_var != 4) $color_var++;
								else $color_var = 1;
						?>
						<div class="cards_animation" id="card-<?php echo $color_var ;?>">
							<!-- question heading -->
							<a href="article.php?quest_id=<?php echo $question_dis_array['question_id']; ?>"><h2 style="color: #f4b042;"><strong><?php echo $question_dis_array[7];?></strong></h2></a>
							<!-- question content -->
							<blockquote>
								<p><?php echo $question_dis_array[2]; ?></p>
							</blockquote>

							<span><label class="text-info">Likes:  <?php echo $question_dis_array[3];?></label>
								 </span>     
								 <span><label class="text-danger">      DisLikes:  <?php echo $question_dis_array[4];?></label></span>
						</div>


						<?php
						}
						?>
						
						<h1 style="color: #8c1919;"><strong>ANSWERS GIVEN</strong></h1>
						<?php
						//showing replies
						$reply_query = "SELECT reply,quest_id AS qID,score FROM replies WHERE user_id='$get_user_id' ORDER BY reg_time";
						$reply_result = mysqli_query($conn,$reply_query);
						$color_var = 1;

						while($reply_array = mysqli_fetch_array($reply_result)) {

							if($color_var != 4) $color_var++;
							else $color_var = 1;

							$retrieve_q_heading = "SELECT question_heading AS q_heading FROM question WHERE question_id=".$reply_array['qID'];
							$retrieve_q_heading_result = mysqli_query($conn,$retrieve_q_heading);
							$retrieve_q_heading_array = mysqli_fetch_array($retrieve_q_heading_result);
						?>
							<div class="cards_animation" id="card-<?php echo $color_var ;?>">
								<!-- reply heading -->
								<h2 style="color: #d3970c;"><strong><?php echo $retrieve_q_heading_array['q_heading']; ?></strong></h2>
								<!-- reply content -->
								<blockquote>
									<p><?php echo $reply_array['reply']; ?></p>
								</blockquote>
							</div>
						<?php 
							}
						?>
				</div>
			</div>
		</div>


		<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</body>
</html>