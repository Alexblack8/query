<?php
session_start();

include 'function.php';
include 'connectuser.php';
?>
<html>
<head>
</head>
<body>
    <?php
    $query="SELECT * FROM question";
    $result=mysqli_query($conn,$query);

    while($row=mysqli_fetch_array($result))
	{
		?>
	   <div class"questions">
	   <h2><?php 
        $name=get_user2($row[1]);
	   echo "<a href='?user_id=$row[1]&quest_id=$row[0]'>$name</a>";
	   ?></h2>
	   <h3><?php echo $row[2];?></h1><br/></h3>
      <form action="" method="post" >
      <input type="submit" name="reply" value="Reply">
      <input type="submit" name="like" value="Like">
      <input type="submit" name="dislike" value="Dislike">
      </form>


	   
<?php
}
if(isset($_POST['like']) &&!empty($_POST['like']))
{
	$quest_id=$_GET['quest_id'];
	
	$query1="SELECT upvotes FROM question WHERE question_id='$quest_id'";
	$result=mysqli_query($conn,$query1);
	$row=mysqli_fetch_array($result);
	$likes=$row[0];
	
	$likes=$likes+1;
	

	$query2="UPDATE question SET upvotes='$likes' WHERE question_id='$quest_id'";
	if(!mysqli_query($conn,$query2))
	{
       echo "error";
	}
}
?>
</div>
</body>
</html>