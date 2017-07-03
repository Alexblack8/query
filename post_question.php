<?php
	include 'connectuser.php';

	$question_heading = $_POST['question_heading'];
	$ask_question = $_POST['ask_question'];
	$category = $_POST['category'];
	$user_id = $_POST['user_id'];

	//posting question
	$query3="SELECT FLOOR(10000 + RAND() * 89999) AS random_number
FROM question
WHERE 'random_number' NOT IN (SELECT user_id FROM question)
LIMIT 1";
  $result=mysqli_query($conn,$query3);
  $row=mysqli_fetch_array($result);
  $quest_id=$row['random_number'];
	$query = "INSERT INTO question(question_id,user_id,question,tags,question_heading,upvotes,downvotes,score) VALUES('$quest_id','$user_id','$ask_question','$category','$question_heading','0','0','0')";
	mysqli_query($conn,$query);
	

	$return_data = array('question_heading'=>$question_heading);

	echo json_encode($return_data);
?>