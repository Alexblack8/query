<?php
session_start();
include 'nav_bar.php';
include 'function.php';
include 'connectuser.php';
$tag_id=$_GET['tag_id'];
$tags=array("Mess","Transport","Academics","Sports","Medical","Others");
?>
<html>
	<head>
		<!-- required bootstrap framework -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
	    <title>< Questions!!</title>
	    <link href="question_display.css" rel="stylesheet">
	    <style>
			html {
				margin-top: 50px;
			}
	    </style>
	</head>
	<body>

		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<br><br>
						<h3 class="text-info" style="color:#543e21">feeds...<hr></h3> 
						<p class="helpblock">Categories:<hr></p>
						<ul class="panel">
							<li><a href="">Mess</a></li>
							<li><a href="">Transport</a></li>
							<li><a href="">Medical</a></li>
							<li><a>Academics</a></li>
							<li><a>Sports</a></li>
							<li><a>Others</a></li>
						</ul>
						<br>
						 <br>
						<br>
				</div>

				<div class="col-md-8" bgcolor="#eee">
				    <?php
				    store_score_question();
				    
				    $counter=$tag_id-1;
				       	$query="SELECT * FROM question 
                         WHERE tags='$tags[$counter]'
						 ORDER BY score DESC
						 ";
						$result=mysqli_query($conn,$query); 
						?>

				    	 <h1><?php echo $tags[$tag_id-1];?></h1>
				    	 <?php

				    	while($row=mysqli_fetch_array($result))
					{
				 
						?>	
						<div class="container-fluid"><hr id="hr_top">								  
					   		<div class="container-fluid"><hr id="hr_top">
					   			<div id="card">
						   			
								   	<h3 id="question_heading"><strong><?php
							       	$name=get_user2($row[1]);
								   	echo "<a href='#	'>$name</a>";
								   	?></strong></h3>
									<p>
						   			<blockquote><?php echo $row[2];?></blockquote>
									</p>
							       	<form 	method="post" >
										<div class="form-group">						
								       		<button type="submit" class="btn btn-link" name="like-<?php echo $row[0];?>"><span class="glyphicon glyphicon-thumbs-up" id="logo1"></span></button>	

								       		<button type="submit" class="btn btn-link" name="dislike-<?php echo $row[0];?>"><span class="glyphicon glyphicon-thumbs-down" id="logo1"></span></button>
							   			</div>
							       	</form>
    							</div>					
					   		</div>
                         </div>
                     
				    
					<?php
					
						$astring1 =  "like-".$row[0];	
						$astring2 = "dislike-".$row[0];					
						if($_SERVER["REQUEST_METHOD"] == "POST") {
							if(isset($_POST[$astring1])) {
								$question_id = $row[0];
								$likess = $row[3];
								$likess++;
								$query3 = "UPDATE question SET upvotes='$likess' WHERE 
								question_id = '$question_id' ";
								if(!mysqli_query($conn, $query3))
									echo "failed to post";
							}
							if(isset($_POST[$astring2])) {
								$feedback_id = $row[0];
								$dislikess = $row[4];
								$dislikess++;
								$query3 = "UPDATE question SET downvotes='$dislikess'
								 WHERE question_id = '$question_id' ";
								if(!mysqli_query($conn, $query3))
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
</html>	