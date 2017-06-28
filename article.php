
<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
</head>
<body>


<?php
session_start();
include 'connectuser.php';
include 'notification.php';
$quest_id=$_GET['quest_id'];
$query="SELECT * FROM question WHERE question_id='$quest_id'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);

	?>
						   			<!--Question-->	
								   	<h3 id="question_heading"><strong><?php	echo $row['question_heading'] ?></strong>
								   	</h3>
								   	<h4><?php  $name=get_user2($row['user_id']);
                                          echo $name;

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
									<!-- THE REPLY SECTION -->
							       	<?php
							       	
							       	store_score_replies();
							       	$query2="SELECT * FROM replies WHERE quest_id='$quest_id' 
							       	ORDER BY score DESC ";
							       	$result2=mysqli_query($conn,$query2);
							       	echo "Replies";
							       	while($row2=mysqli_fetch_array($result2))
							       	{
                                         $user_id=$row2['user_id'];
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
								   	        ?></strong></h3>
								   	        <form method="post">
								   	       

								   	        <button type="button" class="btn btn-link reply_like" id="replyLike-<?php echo $row2[0]."-".$my_id."-".$user_id;?>"><span class="glyphicon glyphicon-thumbs-up" id="logo1"></span></buttonuser_id=$row2[2];
                                        	$username=get_user2($user_id);
                                         	$get_user_id2 = $row2['user_id']>

								       		<button type="button" class="btn btn-link reply_dislike" id="replyDislike-<?php echo $row2['reply_id']."-".$my_id;?>"><span class="glyphicon glyphicon-thumbs-down" id="logo1"></span></button><br/>
								       		</h3>

								       		<label id="label-like-<?php echo $row2['reply_id'];?>">Likes:  <?php echo $total_likes1;?></label><br/>
								       		<label id="label-dislike-<?php echo $row2['reply_id'];?>">DisLikes:  <?php echo $total_dislikes1;?></label><br/>

								       		
								       		</form>
								   	        <?php  
								   	        //<!-- END REPLY SECTION -->

							       	}
							       
									





?>

</body>
</html>