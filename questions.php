<?php
session_start();

include 'function.php';
include 'connectuser.php';
?>
<html>
	<head>
		<!-- required bootstrap framework -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
	    <title>Questions!!</title>
	    <link href="question_display.css" rel="stylesheet">
	</head>
	<body>
		<!-- header and heading -->
		<div id="jumbotron">
			<div class="container">
				</span><h1 id="header_heading"><span class="glyphicon glyphicon-apple" id="logo"></span>Some Of The Valuables...</h1></span>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<h3 class="text-danger"> This is for the side content....Below is a sample content </h3>
				</div>

				<div class="col-md-8" bgcolor="#eee">
				    <?php
				    $query="SELECT * FROM question";
				    $result=mysqli_query($conn,$query);

				    while($row=mysqli_fetch_array($result))
					{
						?>									   
					   		<div class="container-fluid"><hr id="hr_top">
					   			<div id="card">
						   			<p class="help-block" id="heading_helpblock">Answer and Undiscovered Questions</p>
								   	<h3 id="question_heading"><strong><?php
							       	$name=get_user2($row[1]);
								   	echo "<a href='?user_id=$row[1]&quest_id=$row[0]'>$name</a>";
								   	?></strong></h3>
									<p>
						   			<blockquote><?php echo $row[2];?></blockquote>
									</p>
							       	<form action="" method="post" >
										<div class="form-group">						
								       		<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-<?php echo $row[0]; ?>" name="reply"><strong>Reply</strong></button>

								       		<button type="submit" class="btn btn-link" name="like-<?php echo $row[0];?>"><span class="glyphicon glyphicon-thumbs-up" id="logo1"></span></button>	

								       		<button type="submit" class="btn btn-link" name="dislike-<?php echo $row[0];?>"><span class="glyphicon glyphicon-thumbs-down" id="logo1"></span></button>
							   			</div>
							       	</form>
						       	</div>					     
							</div>					
					   	
					   		<div class="container">
								<div class="modal animation fade" id="modal-<?php echo $row[0]; ?>" tabindex="-1" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title"><strong style="font-size: 2em;"><?php echo $row[2];?></strong></h4>
											</div>

											<div class="modal-body">
												<form>
													<div class="form-group">
														<label for="reply">Enter Your Answer:</label>
														<textarea class="form-control" name="reply_answer" placeholder="Enter your answer..." rows="10"></textarea>
													</div>
													<div class="form-group">
														<button type="submit" class="btn btn-success btn-block" style="font-size: 1.25em;">Submit</button>
													</div>
												</form>
											</div>

											<div class="modal-footer">	
												<button type="button" class="btn btn-info" data-dismiss="modal" style="font-size: 1.25em;">Cancel</button> 									
											</div>
										</div>
									</div>
								</div>
							</div>
					<?php
						// upvotes
						$astring =  "like-".$row[0];						
						if($_SERVER["REQUEST_METHOD"] == "POST") {
							if(isset($_POST[$astring])) {
								$quest_id = $row[0];
								$likess = $row[3];
								$likess++;
								$query3 = "UPDATE question SET upvotes='$likess' WHERE question_id = '$quest_id' ";
								if(!mysqli_query($conn, $query3))
									echo "failed to post";
							}
						}
						// downvotes
						$astring2 =  "dislike-".$row[0];						
						if($_SERVER["REQUEST_METHOD"] == "POST") {
							if(isset($_POST[$astring2])) {
								$quest_id = $row[0];
								$dislikess = $row[4];
								$dislikess++;
								$query4 = "UPDATE question SET downvotes='$dislikess' WHERE question_id = '$quest_id' ";
								if(!mysqli_query($conn, $query4))
									echo "failed to post";
							}
						}
					}
						?>
				</div> <!-- end col-md-7 -->
			</div> <!-- end row -->
		</div> <!-- end container --> 

		<!-- Modal Window -->
			
		

		<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
