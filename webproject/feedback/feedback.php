<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<meta charset="UTF-8">
	<title>Feedback</title>
</head>
<body>
	<h1 class="jumbotron">Feedback Form</h1>
	<div class="container">
		<form method="post" action="feedback.php">
			<label for="textarea">Enter Your Valuable</label>
			<textarea name="feedback" id="feedback_input" cols="30" rows="10" placeholder="Enter your feedback here...."></textarea>
		</form>
		<div class="container">
			<label for="category">Choose The Category</label>
			

		</div>
	</div>

	  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src = "https://code.jquery.com/jquery.js"></script>
      
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src = "js/bootstrap.min.js"></script>
</body>
</html>