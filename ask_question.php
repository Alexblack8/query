<?php
session_start();//to use the session's variable

include 'function.php';
include 'connectuser.php';
?> 	
<!DOCTYPE html>
<html>
<head>
	<title>Ask a question</title>
	<link rel="stylesheet" href="ask_question.css" type="text/css">
	<script type="text/javascript"></script>
</head>
<body>
<form action="ask_question.php" method="post">


<label>Username: 
<?php              //to display the username from database
$username=get_username();
echo $username;
?></label><br/>
<textarea name="question" cols="50" rows="10"></textarea><br/><!--to post the question-->
<input type="submit" name="post_question" value="Post"><br/><!--to submit the details to the databse-->

</form>
<br/>
<?php
if(isset($_POST['question']) &&!empty($_POST['question']))   //to check whether the Post button is set and has been submitted
{
	$question=$_POST['question'];//to store the data in text area
	  $my_id=$_SESSION['user_id'];//to store the user_id after logging in
     $query="INSERT INTO question (user_id, question, upvotes, downvotes, score)
     VALUES ('$my_id','$question','0','0','0')";//to insert the query

      if(mysqli_query($conn,$query))
    { 
        echo "added successfully";
    }
    else
    {
    	echo "error in posting question";
    }
}
?>
</body>
</html>

