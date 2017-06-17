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
				<div class="col-md-3">
					<h3 class="text-danger"> This is for the side content....Below is a sample content </h3>
				</div>

				<div class="col-md-7" bgcolor="#eee">
				    <?php
				    $query="SELECT * FROM question";
				    $result=mysqli_query($conn,$query);

				    while($row=mysqli_fetch_array($result))
					{
						?>									   
					   		<div class="container-fluid"><hr id="hr_top"><div id="card">
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
							       		<button type="submit" class="btn btn-warning" name="reply"><strong>Reply</strong></button>
							       		<button class="btn btn-link btn-md" id="simple"><strong id="upvote">Upvote</strong></button>
							       		<input type="submit" class="btn btn-link" name="like" value="Like"><span class="glyphicon glyphicon-thumbs-up"></span></button>		       	
							       		<input type="submit" class="btn btn-link" name="dislike" value="Dislike"><span class="glyphicon glyphicon-thumbs-down glyphicon-lg"></span></button>
						   			</div>
						       	</form>	</div>					     
							</div>					
					   
					<?php
						}
							if(isset($_POST['like']) &&!empty($_POST['like'])) {

								$quest_id=$_GET['quest_id'];

								$query1="SELECT upvotes FROM question WHERE question_id='$quest_id'";
								$result=mysqli_query($conn,$query1);
								$row=mysqli_fetch_array($result);
								$likes=$row[0];
								
								$likes=$likes+1;
								
							      
								$query2="UPDATE question SET upvotes='$likes' WHERE question_id='$quest_id'";
								if(!mysqli_query($conn,$query2))
								{
							       echo "error";
								}
							}

								if(isset($_POST['dislike']) &&!empty($_POST['dislike'])) {

								$quest_id=$_GET['quest_id'];

								$query1="SELECT downvotes FROM question WHERE question_id='$quest_id'";
								$result=mysqli_query($conn,$query1);
								$row=mysqli_fetch_array($result);
								$dislikes=$row[0];
								
								$dislikes=$dislikes+1;
								
							      
								$query2="UPDATE question SET downvotes='$dislikes' 
								WHERE question_id='$quest_id'";
								if(!mysqli_query($conn,$query2))
								{
							       echo "error";
								}
							}
						?>
				</div> <!-- end col-md-7 -->
			</div> <!-- end row -->
		</div> <!-- end container --> 
	</body>
</html>