<?php
	include 'connectuser.php';

	//getting values
	$question_heading = $_POST['question_heading'];
	$ask_question = $_POST['ask_question'];
	$category = $_POST['category'];
	$user_id = $_POST['user_id'];

	//posting question
	$query = "INSERT INTO question(user_id,question,tags,question_heading) VALUES ('$user_id','$ask_question','$category','$question_heading')";
	if(!mysqli_query($conn,$query))
		echo "ERROR IN POSTING QUESTION";

	$return_data = array('question_heading'=>'question_heading');
	echo json_encode($return_data);
?>