<?php
	include 'connectuser.php';

	$question_id = $_POST['question_id'];
	$like_query = "SELECT upvotes FROM question WHERE question_id='$question_id'";
	$like_result = mysqli_query($conn, $like_query);
	$fetch_like = mysqli_fetch_array($like_result);
	$count_like = $fetch_like['upvotes'];
	$count_like++;
	
	// update like
	$upvote_query = "UPDATE question SET upvotes='$count_like' WHERE question_id='$question_id'";
	mysqli_query($conn,$upvote_query);

	//count likes and dislikes
	$count_query = "SELECT upvotes AS cntlikes,downvotes AS cntdislikes FROM question WHERE question_id='$question_id'";
	$count_result = mysqli_query($conn,$count_query);
	$fetch_count = mysqli_fetch_array($count_result);
	$total_likes = $fetch_count['cntlikes'];
	$total_dislikes = $fetch_count['cntdislikes'];

	//returning the data
	$return_data = array("likes"=>$total_likes,"dislikes"=>$total_dislikes);

	echo json_encode($return_data);

?>