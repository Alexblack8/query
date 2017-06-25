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
	    <title>Questions!!</title>
	    <link href="question_display.css" rel="stylesheet">
	    <script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	    <script src="like_unlike.js" type="text/javascript"></script>
	    <script src="like_unlike_reply.js" type="text/javascript"></script>
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
				    	$query="SELECT * FROM question 
                         WHERE tags='$i'
						 ORDER BY score DESC
						 LIMIT 0,4
						 ";
				         $result=mysqli_query($conn,$query);
				    	
				    while($row=mysqli_fetch_array($result))
					{
						?>
                          <h1><?php echo "<a href='feedback_option.php?tag_id=". 
						    $row[8]."'>".$tags[$i-1]."</a>";?></h1>
						         <hr id="hr_top">
					   			<div id="card">
						   			<p class="help-block" id="heading_helpblock">Answer and Undiscovered Questions</p>	
								   	<h3 id="question_heading"><strong><?php
							       	$name=get_user2($row[1]);

							       	$get_user_id = $row['user_id'];
								   	echo '<a href="user_profile.php?userId='.$get_user_id.'">'.ucfirst($name).'</a>';
								   	?></strong></h3>
									<p>
						   			<blockquote><?php echo $row[2];?></blockquote>
									</p>
							       	
									<!-- counting likes and dislikes -->
									
									<?php
										$question_id = $row['question_id'];
										//counting total number of likes
										$like_query = "SELECT COUNT(*) AS cntLikes FROM like_unlike WHERE type=1 and question_id=".$question_id;
					                    $like_result = mysqli_query($conn,$like_query);
					                    $like_row = mysqli_fetch_array($like_result);
					                    $total_likes = $like_row['cntLikes'];
										
										//counting total number of dislikes
					                    $unlike_query = "SELECT COUNT(*) AS cntUnlikes FROM like_unlike WHERE type=0 and question_id=".$question_id;
					                    $unlike_result = mysqli_query($conn,$unlike_query);
					                    $unlike_row = mysqli_fetch_array($unlike_result);
					                    $total_dislikes = $unlike_row['cntUnlikes'];

										$my_id=$_SESSION['user_id'];
										$user_id=$row[1];
									?>
									
									<!-- end counting likes and dislikes -->

									<!-- reply and like unlike button -->
							       	<form method="post" >
										<div class="form-group">						
								       		
								       		<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-<?php echo $question_id; ?>" name="reply"><strong>Reply</strong></button>


								       		<button type="button" class="btn btn-link like" id="like-<?php echo $question_id."-".$my_id;?>"><span class="glyphicon glyphicon-thumbs-up" id="logo1"></span></button>&nbsp;(<span id="showL<?php echo $question_id;?>"><?php echo $total_likes; ?></span>)&nbsp;


								       		<button type="button" class="btn btn-link dislike" id="dislike-<?php echo $question_id."-".$my_id ;?>"><span class="glyphicon glyphicon-thumbs-down" id="logo1"></span></button>&nbsp;(<span id="showD<?php echo $question_id;?>"><?php echo $total_dislikes;?></span>)&nbsp;

							   			</div>
							       	</form>
									<!-- end reply like unlike button -->
									
							       	
									<!-- THE REPLY SECTION -->
							       	<?php
							       	$quest_id=$row[0];
							       	store_score_replies();
							       	$query2="SELECT * FROM replies WHERE quest_id='$quest_id' 
							       	ORDER BY score DESC LIMIT 0,4";
							       	$result2=mysqli_query($conn,$query2);
							       	echo "Replies";

							       	while($row2=mysqli_fetch_array($result2))
							       	{
                                         $user_id=$row2[2];
                                         $username=get_user2($user_id);
                                         $get_user_id2 = $row2['user_id'];


                                         //counting total number of likes
										$like_query = "SELECT COUNT(*) AS cntLikes FROM like_unlike_reply WHERE type=1 and reply_id=".$row2[0];
					                    $like_result = mysqli_query($conn,$like_query);
					                    $like_row = mysqli_fetch_array($like_result);
					                    $total_likes1 = $like_row['cntLikes'];
										
										//counting total number of dislikes
					                    $unlike_query = "SELECT COUNT(*) AS cntUnlikes FROM like_unlike_reply WHERE type=0 and reply_id=".$row2[0];
					                    $unlike_result = mysqli_query($conn,$unlike_query);
					                    $unlike_row = mysqli_fetch_array($unlike_result);
					                    $total_dislikes1 = $unlike_row['cntUnlikes'];





                                         ?>
                                         
                                        	<h3><strong>
								         	<?php
							             		echo '<a href="user_profile.php?userId='.$get_user_id2.'">'.$username.'</a><br />';
							             	$reply_print=get_reply($row2[0]);
							             	echo $reply_print;
								   	        ?></strong>
								   	        <form method="post">
								   	       

								   	        <button type="button" class="btn btn-link reply_like" id="replyLike-<?php echo $row2[0]."-".$my_id;?>"><span class="glyphicon glyphicon-thumbs-up" id="logo1"></span></buttonuser_id=$row2[2];
                                        	$username=get_user2($user_id);
                                         	$get_user_id2 = $row2['user_id']>

								       		<button type="button" class="btn btn-link reply_dislike" id="replyDislike-<?php echo $row2['reply_id']."-".$_SESSION['user_id'];?>"><span class="glyphicon glyphicon-thumbs-down" id="logo1"></span></button><br/>
								       		</h3>
								       		<label id="label-like-<?php echo $row2['reply_id'];?>">Likes:  <?php echo $total_likes1;?></label><br/>
								       		<label id="label-dislike-<?php echo $row2['reply_id'];?>">DisLikes:  <?php echo $total_dislikes1;?></label><br/>
								       		
								       		</form>
								   	        <?php  
								   	        $astring1 =  "reply_like_".$row2[0];	
						                    $astring2 = "reply_dislike_".$row2[0];			
								   	    	if(isset($_POST[$astring1])) {
								              $reply_id = $row2[0];
								              $likess = $row2[4];
								              $likess++;
								              $query3 = "UPDATE replies SET upvotes='$likess' WHERE reply_id = '$reply_id' ";
								            if(!mysqli_query($conn, $query3))
								            {
							 		         echo "failed to post";
							                 }
							                 else
							                 {
							                 	$my_id=$_SESSION['user_id'];
							                 	$user_id=$row2[2];
							                 	send_notification_like($my_id,$user_id,$category[0],$reply_id);
							                 }
							             }
						               	if(isset($_POST[$astring2])) 
						               	{
						            		  $reply_id = $row2[0];
						            		$dislikess = $row2[5];
						               		$dislikess++;
							            	$query3 = "UPDATE replies SET downvotes='$dislikess' WHERE reply_id = '$reply_id' ";
						            		if(!mysqli_query($conn, $query3))
									        echo "failed to post";
							           }                     
							       	}
							       	?>
									<!-- END REPLY SECTION -->





						       								     
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
												<form method="post">
													<div class="form-group">
														<label for="reply">Enter Your Answer:</label>
														<textarea class="form-control" name="text-<?php echo $row[0];?>" placeholder="Enter your answer..." rows="10"></textarea>
													</div>
													<div class="form-group">
														<button type="submit" name="reply-<?php echo $row[0];?>" class="btn btn-success btn-block" style="font-size: 1.25em;">Submit</button>
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
						$astring1 =  "like-".$row[0];	
						$astring2 = "dislike-".$row[0];					
						$astring3 = "reply-".$row[0];
						$astring4 =  "text-".$row[0];
						$reply    =	$_POST[$astring4];			
						if($_SERVER["REQUEST_METHOD"] == "POST") {
							/*if(isset($_POST[$astring1])) {
								$quest_id = $row[0];
								$likess = $row[3];
								$likess++;
								$query3 = "UPDATE question SET upvotes='$likess' WHERE question_id = '$quest_id' ";
								if(!mysqli_query($conn, $query3))
								{
									echo "failed to post";
							}*/
							if(isset($_POST[$astring2])) {
								$quest_id = $row[0];
								$dislikess = $row[4];
								$dislikess++;
								$query3 = "UPDATE question SET downvotes='$dislikess' WHERE question_id = '$quest_id' ";
								if(!mysqli_query($conn, $query3))
									echo "failed to post";
							}
							if(isset($_POST[$astring3]))
							{
								$quest_id=$row[0];
								$my_id=$_SESSION['user_id'];
								$query="INSERT INTO replies (quest_id,user_id,reply)
			     				VALUES ('$quest_id','$my_id','$reply')";
			     				if(mysqli_query($conn,$query))
			     				{
			     					echo "reply registered";	
			     					send_notification_like($my_id,$user_id,$category[0],$quest_id);

			     				}
			     				else
			     				{
			     					echo "error";
			     				}
							}
						}
					
					}
				}
						?>
				</div> <!-- end col-md-7 -->
			</div> <!-- end row -->
		</div> <!-- end container --> 

		<!-- Modal Window -->
			
		

		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>