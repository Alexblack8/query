
<!DOCTYPE html>
<html>
<head>
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
	    <script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	    <script src="like_unlike.js" type="text/javascript"></script>
	    <script src="like_unlike_reply.js" type="text/javascript"></script>
</head>
<body>


<?php
session_start();
include 'connectuser.php';
include 'notification.php';
$question_id=$_GET['quest_id'];
$query="SELECT * FROM question WHERE question_id='$question_id'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$quest_user_id=$row['user_id'];
	?>
								<div class="container">
									<div class="row">
										<div class="col-md-1"></div>
										<div class="col-md-9">
						   			<!--Question-->	
										   	<h3 id="question_heading"><strong><?php	echo $row['question_heading'] ?></strong>
										   	</h3>
										   	<h4><a href="user_profile.php?userId=<?php echo $row['user_id']; ?>"><?php  $name=get_user2($row['user_id']);
		                                          echo $name."</a>";

										   	?></h4>
											<p>
								   			<blockquote><?php echo $row['question'];?></blockquote>
											</p>

											<!-- Question-->
											<form method="post" >
												<div class="form-group">						
										       		
										       		<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-<?php echo $question_id; ?>" name="reply"><strong>Reply</strong></button>


										       		<button type="button" class="btn btn-link like" id="like-<?php echo $question_id."-".$my_id."-".$user_id;?>"><span class="glyphicon glyphicon-thumbs-up" id="logo1"></span></button>&nbsp;(<span id="showL<?php echo $question_id;?>"><?php echo $total_likes; ?></span>)&nbsp;


										       		<button type="button" class="btn btn-link dislike" id="dislike-<?php echo $question_id."-".$my_id ;?>"><span class="glyphicon glyphicon-thumbs-down" id="logo1"></span></button>&nbsp;(<span id="showD<?php echo $question_id;?>"><?php echo $total_dislikes;?></span>)&nbsp;

									   			</div>
									       	</form>
							       	<!-- counting likes and dislikes -->
								
									<?php
										
										//counting total number of likes
										$like_query = "SELECT COUNT(*) AS cntLikes FROM like_unlike WHERE type=1 and question_id='$question_id'";
					                    $like_result = mysqli_query($conn,$like_query);
					                    $like_row = mysqli_fetch_array($like_result);
					                    $total_likes = $like_row['cntLikes'];
										$user_id=$row[1];
										//counting total number of dislikes
					                    $unlike_query = "SELECT COUNT(*) AS cntUnlikes FROM like_unlike WHERE type=0 and 
					                    question_id='$question_id'";
					                    $unlike_result = mysqli_query($conn,$unlike_query);
					                    $unlike_row = mysqli_fetch_array($unlike_result);
					                    $total_dislikes = $unlike_row['cntUnlikes'];
										$my_id=$_SESSION['user_id'];
										
									?>
									<!-- end counting likes and dislikes -->
									<!-- THE REPLY SECTION -->
								       	<?php
								       	$question_id=$row[0];
								       	store_score_replies();
								       	$query2="SELECT * FROM replies WHERE quest_id='$question_id' 
								       	ORDER BY score DESC ";
								       	$result2=mysqli_query($conn,$query2);
								       	echo "<h3>Replies</h3>";
								       	$color_var = 1;
								       	while($row2=mysqli_fetch_array($result2))
								       	{
								       		if($color_var != 4) $color_var++;
												else $color_var = 1;
								       		?>

								       		<div class="cards_animation" id="card-<?php echo $color_var ;?>">

								       			<?php
	                                         $user_id=$row2[2];
	                                         $username=get_user2($user_id);
	                                         $get_user_id2 = $row2['user_id'];
	                                         //counting total number of likes
											$like_query = "SELECT COUNT(*) AS cntLikes FROM like_unlike_reply WHERE type=1 and reply_id=".$row2[0];
						                    $like_result = mysqli_query($conn,$like_query);
						                    $like_row = mysqli_fetch_array($like_result);
						                    $total_likes1 = $like_row['cntLikes'];
											$user_id=$row2['user_id'];
											$my_id=$_SESSION['user_id'];
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
									   	       

									   	        <button type="button" class="btn btn-link reply_like" id="replyLike-<?php echo $row2[0]."-".$my_id."-".$user_id;?>"><span class="glyphicon glyphicon-thumbs-up" id="logo1"></span></buttonuser_id=$row2[2];
	                                        	$username=get_user2($user_id);
	                                         	$get_user_id2 = $row2['user_id']>

									       		<button type="button" class="btn btn-link reply_dislike" id="replyDislike-<?php echo $row2['reply_id']."-".$my_id;?>"><span class="glyphicon glyphicon-thumbs-down" id="logo1"></span></button><br/>
									       		</h3>

									       		<span class="text-info" style="padding-top: 1px !important"><strong>Likes:  <span id="label-like-<?php echo $row2['reply_id'];?>"><?php echo $total_likes1;?></strong></span></span>
									       		<span class="text-danger" ><strong>DisLikes:  <span id="label-dislike-<?php echo $row2['reply_id'];?>"><?php echo $total_dislikes1;?></span></strong></span>

									       		
									       		</form>
									       	</div>
									   	        <?php  
								       	}
								       	?>
										<!-- END REPLY SECTION -->
									</div>


								</div> <!-- end col-md-7-->


						       								     
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
											
						$astring3 = "reply-".$row[0];
						$astring4 =  "text-".$row[0];
						$reply    =	$_POST[$astring4];			
						if($_SERVER["REQUEST_METHOD"] == "POST") {
							
							if(isset($_POST[$astring3]))
							{
								$question_id=$row[0];
								$my_id=$_SESSION['user_id'];
								$query="INSERT INTO replies (quest_id,user_id,reply)
			     				VALUES ('$question_id','$my_id','$reply')";
			     				if(mysqli_query($conn,$query))
			     				{
			     					echo "reply registered";	
			     					send_notification($user_id,$quest_user_id,"reply",$question_id);
			     					
			     				}
			     				else
			     				{
			     					echo "error";
			     				}
							}
						}
					
					
				
						?>
				</div> <!-- end col-md-7 -->
			</div> <!-- end row -->
		</div> <!-- end container --> 

		<!-- Modal Window -->
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>