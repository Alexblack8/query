<?php
	include 'connectuser.php';
   //include  'notification.php';
	//user_id
	$user_id = $_POST['user_id'];
	$my_id = $_POST['my_id'];

	// select type of the variable i.e. is it like or dislike
	$type = $_POST['type'];
	

	//count likes and dislikes
	$question_id = $_POST['question_id'];
	$like_query = "SELECT COUNT(*) AS cntpost FROM like_unlike WHERE question_id='$question_id' and user_id='$my_id'";
	$like_result = mysqli_query($conn, $like_query);
	$fetch_like = mysqli_fetch_array($like_result);

	$count_like = $fetch_like['cntpost'];
	
	if($count_like == 0) {
		$insertQuery = "INSERT INTO like_unlike(user_id,question_id,type) VALUES('$my_id','$question_id','$type')";
		mysqli_query($conn,$insertQuery);
        $query="INSERT INTO notificationlike (sender_id,receiver_id,category,ref_id)
		VALUES ('$my_id','$user_id','question','$question_id')";
		mysqli_query($conn,$query);
		//send_notification($my_id,$user_id,"question",$question_id);
	}
	else{
		$updateQuery = "UPDATE like_unlike SET type='$type' WHERE user_id='$my_id' AND question_id='$question_id' ";
		mysqli_query($conn,$updateQuery);
     //send_notification($my_id,$user_id,"question",$question_id);
		
	}

	//count likes and dislikes
	$query = "SELECT COUNT(*) AS cntLike FROM like_unlike WHERE type=1 AND question_id=".$question_id;
	$result = mysqli_query($conn,$query);
	$fetchlikes = mysqli_fetch_array($result);
	$total_likes = $fetchlikes['cntLike'];

	$query = "SELECT COUNT(*) AS cntUnlike FROM like_unlike WHERE type=0 and question_id=".$question_id;
	$result = mysqli_query($conn,$query);
	$fetchunlikes = mysqli_fetch_array($result);
	$total_dislikes = $fetchunlikes['cntUnlike'];
	
	//returning the data
	$return_data = array("likes"=>$total_likes,"dislikes"=>$total_dislikes);

	echo json_encode($return_data);

?>