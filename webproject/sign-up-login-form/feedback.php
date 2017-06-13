<?php
	include 'connectuser.php';
	$insert_into_table = "INSERT INTO feedback (feedback_id,user_id,feedback,upvote,downvote,score,tags) VALUES(1,1,"$_POST["feedback"]",0,0,"mess")";
	mysqli_query($conn,$insert_into_table);
?>