<?php
session_start();

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
<?php 
$username=get_username();
echo $username;
?></label><br/>
<textarea name="question" cols="50" rows="10"></textarea><br/>
<input type="submit" name="post_question" value="Post"><br/>

</form>
<br/>
<?php
if(isset($_POST['question']) &&!empty($_POST['question']))
{
	$question=$_POST['question'];
	  $my_id=$_SESSION['user_id'];
     $query="INSERT INTO question (user_id, question, upvotes, downvotes, score)
     VALUES ('$my_id','$question','0','0','0')";

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

