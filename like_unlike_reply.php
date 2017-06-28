<?php
	include 'connectuser.php';
	include 'notification.php';
	//user_id
	$user_id = $_POST['user_id'];
	$my_id=$_POST['my_id'];
	// select type of the variable i.e. is it like or dislike
	$type = $_POST['type'];
	
	//count likes and dislikes
	$reply_id = $_POST['reply_id'];
	$like_query = "SELECT COUNT(*) AS cntpost FROM like_unlike_reply WHERE reply_id=".$reply_id." and user_id=".$user_id;
	$like_result = mysqli_query($conn, $like_query);
	$fetch_like = mysqli_fetch_array($like_result);
	$count_like = $fetch_like['cntpost'];
	
	if($count_like == 0) {
		$insertQuery = "INSERT INTO like_unlike_reply(user_id,reply_id,type) VALUES('$user_id','$reply_id','$type')";
		mysqli_query($conn,$insertQuery);
		send_notification($my_id,$user_id,"reply",$reply_id);
	}
	else{
		$updateQuery = "UPDATE like_unlike_reply SET type='$type' WHERE user_id='$user_id' AND reply_id='$reply_id' ";
		mysqli_query($conn,$updateQuery);
		//send_notification($my_id,$user_id,"reply",$reply_id);
	}
	//count likes and dislikes
	$query = "SELECT COUNT(*) AS cntLike FROM like_unlike_reply WHERE type=1 and reply_id=".$reply_id;
	$result = mysqli_query($conn,$query);
	$fetchlikes = mysqli_fetch_array($result);
	$total_likes = $fetchlikes['cntLike'];




    $query2 = "UPDATE replies SET upvotes='$total_likes' WHERE reply_id = '$reply_id' ";
    mysqli_query($conn,$query2);


	$query = "SELECT COUNT(*) AS cntUnlike FROM like_unlike_reply WHERE type=0 and reply_id=".$reply_id;
	$result = mysqli_query($conn,$query);
	$fetchunlikes = mysqli_fetch_array($result);
	$total_dislikes = $fetchunlikes['cntUnlike'];
	$query2 = "UPDATE replies SET downvotes='$total_dislikes' WHERE reply_id = '$reply_id' ";
    mysqli_query($conn,$query2);
	//returning the data
	$return_data = array("likes"=>$total_likes,"dislikes"=>$total_dislikes,"reply_id"=>$reply_id);

	echo json_encode($return_data);
?>