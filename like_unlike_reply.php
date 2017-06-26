<?php
	include 'connectuser.php';
	//user_id
	$user_id = $_POST['user_id'];
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
	}
	else{
		$updateQuery = "UPDATE like_unlike_reply SET type='$type' WHERE user_id='$user_id' AND reply_id='$reply_id' ";
		mysqli_query($conn,$updateQuery);
	}
	//count likes and dislikes
	$query = "SELECT COUNT(*) AS cntLike FROM like_unlike_reply WHERE type=1 and reply_id=".$reply_id;
	$result = mysqli_query($conn,$query);
	$fetchlikes = mysqli_fetch_array($result);
	$total_likes = $fetchlikes['cntLike'];
<<<<<<< HEAD
    $query2 = "UPDATE replies SET upvotes='$total_likes' WHERE reply_id = '$reply_id' ";
    mysqli_query($conn,$query2);

=======
>>>>>>> fc0e0c2043cce101e5a4d0c1993d61642c6a1015
	$query = "SELECT COUNT(*) AS cntUnlike FROM like_unlike_reply WHERE type=0 and reply_id=".$reply_id;
	$result = mysqli_query($conn,$query);
	$fetchunlikes = mysqli_fetch_array($result);
	$total_dislikes = $fetchunlikes['cntUnlike'];
	$query2 = "UPDATE replies SET downvotes='$total_dislikes' WHERE reply_id = '$reply_id' ";
    mysqli_query($conn,$query2);
	//returning the data
	$return_data = array("likes"=>$total_likes,"dislikes"=>$total_dislikes,"reply_id"=>$reply_id);
<<<<<<< HEAD
	
=======
>>>>>>> fc0e0c2043cce101e5a4d0c1993d61642c6a1015
	echo json_encode($return_data);
?>