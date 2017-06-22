<?php
	include 'connectuser.php';

	//get element by click_like l or disl
	$which_clicked = $_POST['click_like'];

	//count likes and dislikes
	$question_id = $_POST['question_id'];
	$like_query = "SELECT upvotes,downvotes FROM question WHERE question_id='$question_id'";
	$like_result = mysqli_query($conn, $like_query);
	$fetch_like = mysqli_fetch_array($like_result);
	$count_like = $fetch_like['upvotes'];
	if($which_clicked == 'l')
		$count_like++;
	$count_dislike = $fetch_like['downvotes'];
	if($which_clicked == 'disl')
		$count_dislike++;
	
	// update like
	$upvote_query = "UPDATE question SET upvotes='$count_like' WHERE question_id='$question_id'";
	mysqli_query($conn,$upvote_query);

	// update dislikes
	$downvote_query = "UPDATE question SET downvotes='$count_dislike' WHERE question_id='$question_id'";
	mysqli_query($conn,$downvote_query);

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