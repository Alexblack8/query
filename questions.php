<?php
session_start();

include 'connectuser.php';
<<<<<<< HEAD
=======
	include('nav_bar.php');
>>>>>>> fc0e0c2043cce101e5a4d0c1993d61642c6a1015

include 'notification.php';
$tags=array("Mess","Transport","Academics","Sports","Medical","Others");
$category=array('question','reply','question','feedback');
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
	    <style>
			html {
				margin-top: 50px;
			}
	    </style>
	</head>
	<body>
		<!-- header and heading -->
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<br><br>
						<h3 class="text-info" style="color:#543e21">feeds...<hr></h3> 
						<p class="helpblock">Categories:<hr></p>
						<ul class="panel">
<<<<<<< HEAD
						    <li><a href="questions.php">All questions</a></li>
							<li><a href="question_option.php?tag_id=1">Mess</a></li>
							<li><a href="question_option.php?tag_id=2">Transport</a></li>
							<li><a href="question_option.php?tag_id=3">Medical</a></li>
							<li><a href="question_option.php?tag_id=4">Academics</a></li>
							<li><a href="question_option.php?tag_id=5">Sports</a></li>
							<li><a href="question_option.php?tag_id=6">Others</a></li>
=======
							<li><a href="">Mess</a></li>
							<li><a href="">Transport</a></li>
							<li><a href="">Medical</a></li>
							<li><a>Academics</a></li>
							<li><a>Sports</a></li>
							<li><a>Others</a></li>
>>>>>>> fc0e0c2043cce101e5a4d0c1993d61642c6a1015
						</ul>
						<br>
						 <br>
						<br>
				</div>

				<div class="col-md-8" bgcolor="#eee">
				    <?php
				    store_score_question();
				   for($i=1;$i<=6;$i++)
				    {
				    	$counter=$tags[$i-1];
				    	$query="SELECT * FROM question 
                         WHERE tags='$counter'
						 ORDER BY score DESC
						 LIMIT 0,4
						 ";
				         $result=mysqli_query($conn,$query);
				          ?>
				    	<h1><?php echo "<a href='question_option.php?tag_id=". 
						    $i."'>".$tags[$i-1]."</a>";?></h1>
						   
						    <?php
				    while($row=mysqli_fetch_array($result))
					{
						?>
                          
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
							       	ORDER BY score DESC ";
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
			
		

		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</body>
</html>
