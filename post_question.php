<?php
	include 'connectuser.php';
<<<<<<< HEAD

=======
>>>>>>> fc0e0c2043cce101e5a4d0c1993d61642c6a1015
	//getting values
	$question_heading = $_POST['question_heading'];
	$ask_question = $_POST['ask_question'];
	$category = $_POST['category'];
	$user_id = $_POST['user_id'];

	//posting question
<<<<<<< HEAD
	$query = "INSERT INTO question(user_id,question,tags,question_heading) VALUES ('$user_id','$ask_question','$category','$question_heading')";
	if(!mysqli_query($conn,$query))
		echo "ERROR IN POSTING QUESTION";

	$return_data = array('question_heading'=>'question_heading');
=======
	$query = "INSERT INTO question(user_id,question,tags,question_heading,upvotes,downvotes,score) VALUES(".$user_id.",'$ask_question','$category','$question_heading','0','0','0')";
	mysqli_query($conn,$query);
	

	$return_data = array('question_heading'=>$question_heading);
>>>>>>> fc0e0c2043cce101e5a4d0c1993d61642c6a1015
	echo json_encode($return_data);
?>