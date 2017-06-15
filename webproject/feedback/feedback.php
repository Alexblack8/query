<!-- HTML PART OF THE PAGE -->
<!DOCTYPE html>
<!-- only for Vishal Maurya - always refer to the photo saved in the pictures for form-controls -->
<html lang="en">
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
	<meta charset="UTF-8">
	<title>Feedback</title>
</head>
<body>
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
	    	$connect = mysqli_connect("localhost","root","","soc");
	    	if(!$connect) die("database missing");
			$insert_in_table = "INSERT INTO feedback (feedback,tags) VALUES ('$get_feedback','$get_category')";
			mysqli_query($connect,$insert_in_table);
			echo "<script>
	         $(window).load(function(){
	             $('#modal-3').modal('show');
	         });
	    	</script>";
    		session_destroy();
    	}
	}
?>
  </body>
</html>