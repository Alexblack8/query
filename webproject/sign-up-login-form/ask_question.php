<?php
session_start();

include 'function.php';
include 'connectuser.php';
?>  
<!DOCTYPE html>
<html>
	<head>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
		<title>Ask a question</title>
		<link rel="stylesheet" href="ask_question.css" type="text/css">
		<!--script type="text/javascript"></script-->
	</head>
	<body>

		<!-- heading of the file -->
		<header>
			<div class="jumbotron">
				<div class="container">
					<h1>Ask A Question</h1>
				</div>
			</div>
		</header>

		<div class="container">
			<form action="ask_question.php" method="post">

			<div class="form-group">
				<label for="ask_question">Username: 
				<?php 
				$username=get_username();
				echo $username;
				?></label>
				<textarea name="question" id="ask_question" cols="50" rows="10" class="form-control"></textarea>
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-warning" name="post_question" value="Post">
			</div>
			</form>
		</div>

		<hr>

		<div class="container">
			<?php
			if(isset($_POST['question']) &&!empty($_POST['question']))
			{
				$question=$_POST['question'];
					$my_id=$_SESSION['user_id'];
					 $query="INSERT INTO question (user_id, question, upvotes, downvotes, score)
					 VALUES ('$my_id','$question','0','0','0')";

						if(mysqli_query($conn,$query))
					{ 
							echo "added successfully";
					}
					else
					{
						echo "error in posting question";
					}
			}
			?>
		</div>
		<script src = "https://code.jquery.com/jquery.js"></script>
			
			<!-- Include all compiled plugins (below), or include individual files as needed -->
				<script src = "js/bootstrap.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
	</body>
</html>

