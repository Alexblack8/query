<?php
session_start();
include 'function.php';
include 'connectuser.php';
include 'notification.php';
$tags=array("Mess","Transport","Academics","Sports","Medical","Others");
$category=array('reply','question','feedback');
?>
<html>
	<head>
		<!-- required bootstrap framework -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
	    <title>Feedbacks!!</title>
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
				    store_score_question();
				    
				    for($i=1;$i<=6;$i++)
				    {
				    	$query="SELECT * FROM feedback 
                         WHERE tags='$i'
						 ORDER BY score DESC
						 ";
				         $result=mysqli_query($conn,$query);
				    	
				    	while($row=mysqli_fetch_array($result))
					{
						 
						?>	
						<div class="container-fluid"><hr id="hr_top">								   <h1><?php echo "<a href='feedback_option.php?tag_id=". 
						    $row[6]."'>".$tags[$i-1]."</a>";?></h1>
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
								$feedback_id = $row[0];
								$my_id=$_SESSION['user_id'];
								$user_id=$row[1];
								$likess = $row[3];
								$likess++;
								$query3 = "UPDATE feedback SET upvotes='$likess' WHERE feedback_id = '$feedback_id' ";
								if(!mysqli_query($conn, $query3))
								{
									echo "failed to post";
								}
								else
								{
									send_notification_like($my_id,$user_id,$category[2],$feedback_id);
								}
							}
							if(isset($_POST[$astring2])) {
								$feedback_id = $row[0];
								$dislikess = $row[4];
								$dislikess++;
								$query3 = "UPDATE feedback SET downvotes='$dislikess' WHERE feedback_id = '$feedback_id' ";
								if(!mysqli_query($conn, $query3))
									echo "failed to post";
							}
							
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